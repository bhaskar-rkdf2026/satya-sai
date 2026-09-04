<?php
/**
 * Fast & Robust Multi-cURL Downloader with streaming event loop
 */

function sanitizeFilename($filename) {
    return preg_replace('/[<>:"\/\\\\|?*]/', '_', $filename);
}

function getLocalPathForUrl($url) {
    $baseTarget = __DIR__ . '/assets/images/Files/Link/';
    $cleanUrl = explode('?', $url)[0];
    
    if (preg_match('#/cms/Areas/Website/Files/Link/(.*)$#i', $cleanUrl, $m)) {
        $sub = urldecode($m[1]);
        $parts = explode('/', str_replace('\\', '/', $sub));
        $cleanParts = array_map('sanitizeFilename', $parts);
        return $baseTarget . implode(DIRECTORY_SEPARATOR, $cleanParts);
    } elseif (preg_match('#/cms/Areas/Website/Files/(.*)$#i', $cleanUrl, $m)) {
        $sub = urldecode($m[1]);
        $parts = explode('/', str_replace('\\', '/', $sub));
        $cleanParts = array_map('sanitizeFilename', $parts);
        return __DIR__ . '/assets/images/Files/' . implode(DIRECTORY_SEPARATOR, $cleanParts);
    } else {
        $parsed = parse_url($cleanUrl);
        $path = isset($parsed['path']) ? ltrim($parsed['path'], '/') : basename($cleanUrl);
        $sub = urldecode($path);
        $parts = explode('/', str_replace('\\', '/', $sub));
        $cleanParts = array_map('sanitizeFilename', $parts);
        return $baseTarget . 'other' . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $cleanParts);
    }
}

function getLocalUrlForUrl($url) {
    $cleanUrl = explode('?', $url)[0];
    
    if (preg_match('#/cms/Areas/Website/Files/Link/(.*)$#i', $cleanUrl, $m)) {
        $parts = explode('/', str_replace('\\', '/', urldecode($m[1])));
        $cleanParts = array_map('sanitizeFilename', $parts);
        return 'assets/images/Files/Link/' . implode('/', $cleanParts);
    } elseif (preg_match('#/cms/Areas/Website/Files/(.*)$#i', $cleanUrl, $m)) {
        $parts = explode('/', str_replace('\\', '/', urldecode($m[1])));
        $cleanParts = array_map('sanitizeFilename', $parts);
        return 'assets/images/Files/' . implode('/', $cleanParts);
    } else {
        $parsed = parse_url($cleanUrl);
        $path = isset($parsed['path']) ? ltrim($parsed['path'], '/') : basename($cleanUrl);
        $parts = explode('/', str_replace('\\', '/', urldecode($path)));
        $cleanParts = array_map('sanitizeFilename', $parts);
        return 'assets/images/Files/Link/other/' . implode('/', $cleanParts);
    }
}

function encodeUrlProperly($url) {
    $parsed = parse_url($url);
    if (!$parsed || !isset($parsed['scheme']) || !isset($parsed['host'])) {
        return str_replace(' ', '%20', $url);
    }
    $res = $parsed['scheme'] . '://' . $parsed['host'];
    if (isset($parsed['port'])) $res .= ':' . $parsed['port'];
    if (isset($parsed['path'])) {
        $segments = explode('/', $parsed['path']);
        $encodedSegments = array_map('rawurlencode', $segments);
        $res .= implode('/', $encodedSegments);
    }
    if (isset($parsed['query'])) $res .= '?' . $parsed['query'];
    return $res;
}

function downloadBatch($urls, $concurrency = 10, $timeout = 25) {
    $expandedUrls = [];
    foreach ($urls as $u) {
        $u = trim($u);
        if (empty($u)) continue;
        if (strpos($u, ',') !== false) {
            foreach (explode(',', $u) as $sp) {
                $sp = trim($sp);
                if (!empty($sp) && (stripos($sp, 'http') === 0 || stripos($sp, 'ftp') === 0)) {
                    $expandedUrls[] = $sp;
                }
            }
        } else {
            if (stripos($u, 'http') === 0 || stripos($u, 'ftp') === 0) {
                $expandedUrls[] = $u;
            }
        }
    }
    $expandedUrls = array_values(array_unique($expandedUrls));
    $total = count($expandedUrls);
    echo "Total files to process: $total\n";
    
    $mh = curl_multi_init();
    $running = 0;
    $urlIndex = 0;
    $activeHandles = [];
    $completed = 0;
    
    // Add initial batch up to concurrency limit
    while ($urlIndex < $total && count($activeHandles) < $concurrency) {
        $url = $expandedUrls[$urlIndex++];
        $dest = getLocalPathForUrl($url);
        
        if (file_exists($dest) && filesize($dest) > 1000) {
            $completed++;
            echo "[$completed/$total] Already exists: " . basename($dest) . " (" . round(filesize($dest)/1024, 1) . " KB)\n";
            continue;
        }
        
        $dir = dirname($dest);
        if (!is_dir($dir)) @mkdir($dir, 0777, true);
        
        $fp = @fopen($dest, 'w+');
        if (!$fp) {
            $completed++;
            echo "[$completed/$total] Write failed: $dest\n";
            continue;
        }
        
        $encoded = encodeUrlProperly($url);
        $ch = curl_init($encoded);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
        
        curl_multi_add_handle($mh, $ch);
        $chId = (int)$ch;
        $activeHandles[$chId] = ['ch' => $ch, 'fp' => $fp, 'dest' => $dest, 'url' => $url];
    }
    
    // Event loop
    do {
        $status = curl_multi_exec($mh, $running);
        
        while ($info = curl_multi_info_read($mh)) {
            $ch = $info['handle'];
            $chId = (int)$ch;
            
            if (isset($activeHandles[$chId])) {
                $item = $activeHandles[$chId];
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
                
                curl_multi_remove_handle($mh, $ch);
                curl_close($ch);
                fclose($item['fp']);
                unset($activeHandles[$chId]);
                
                $completed++;
                $fsize = file_exists($item['dest']) ? filesize($item['dest']) : 0;
                
                if ($httpCode == 200 && $fsize > 500 && stripos($contentType, 'text/html') === false) {
                    echo "[$completed/$total] OK: " . basename($item['dest']) . " (" . round($fsize/1024, 1) . " KB)\n";
                } elseif ($httpCode == 200 && $fsize > 0 && preg_match('/\.(rar|zip|mp4|pdf)$/i', $item['dest'])) {
                    echo "[$completed/$total] OK: " . basename($item['dest']) . " (" . round($fsize/1024, 1) . " KB)\n";
                } else {
                    echo "[$completed/$total] FAILED (HTTP $httpCode, $fsize bytes): " . basename($item['dest']) . "\n";
                    if (file_exists($item['dest']) && ($fsize < 1000 || stripos($contentType, 'text/html') !== false)) {
                        @unlink($item['dest']);
                    }
                }
                
                // Spawn next URL
                while ($urlIndex < $total && count($activeHandles) < $concurrency) {
                    $nextUrl = $expandedUrls[$urlIndex++];
                    $nextDest = getLocalPathForUrl($nextUrl);
                    
                    if (file_exists($nextDest) && filesize($nextDest) > 1000) {
                        $completed++;
                        echo "[$completed/$total] Already exists: " . basename($nextDest) . " (" . round(filesize($nextDest)/1024, 1) . " KB)\n";
                        continue;
                    }
                    
                    $nextDir = dirname($nextDest);
                    if (!is_dir($nextDir)) @mkdir($nextDir, 0777, true);
                    
                    $nextFp = @fopen($nextDest, 'w+');
                    if (!$nextFp) {
                        $completed++;
                        echo "[$completed/$total] Write error: $nextDest\n";
                        continue;
                    }
                    
                    $nextEncoded = encodeUrlProperly($nextUrl);
                    $nextCh = curl_init($nextEncoded);
                    curl_setopt($nextCh, CURLOPT_FILE, $nextFp);
                    curl_setopt($nextCh, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($nextCh, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($nextCh, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($nextCh, CURLOPT_TIMEOUT, $timeout);
                    curl_setopt($nextCh, CURLOPT_CONNECTTIMEOUT, 10);
                    curl_setopt($nextCh, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
                    
                    curl_multi_add_handle($mh, $nextCh);
                    $nextChId = (int)$nextCh;
                    $activeHandles[$nextChId] = ['ch' => $nextCh, 'fp' => $nextFp, 'dest' => $nextDest, 'url' => $nextUrl];
                }
            }
        }
        
        if ($running > 0) {
            curl_multi_select($mh, 0.1);
        }
    } while ($running > 0 || !empty($activeHandles));
    
    curl_multi_close($mh);
    echo "Batch completed: $completed/$total files processed.\n";
}
