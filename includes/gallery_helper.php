<?php
/**
 * Sri Satya Sai University of Technology & Medical Sciences
 * Photo & Video Gallery Helper Functions
 */

if (!defined('BASE_URL')) {
    require_once __DIR__ . '/../config.php';
}

/**
 * Get all Gallery data from JSON
 */
function get_gallery_data() {
    return get_json_data('gallery_data.json', [
        'page_info' => [],
        'categories' => [],
        'custom_photos' => [],
        'videos' => []
    ]);
}

/**
 * Save all Gallery data to JSON
 */
function save_gallery_data($data) {
    return save_json_data('gallery_data.json', $data);
}

/**
 * Get Gallery Page Info & Headings
 */
function get_gallery_page_info() {
    $data = get_gallery_data();
    return $data['page_info'] ?? [
        'page_title' => 'Photo & Video Gallery - SSSUTMS',
        'banner_title' => 'Campus Photo & Video Gallery',
        'banner_category' => 'Campus Life',
        'heading' => 'Campus Moments, Infrastructure & Life at SSSUTMS',
        'video_heading' => 'Campus Video Tour & Convocation Highlights'
    ];
}

/**
 * Save Gallery Page Info
 */
function save_gallery_page_info($info) {
    $data = get_gallery_data();
    $data['page_info'] = array_merge($data['page_info'] ?? [], $info);
    return save_gallery_data($data);
}

/**
 * Get Gallery Categories
 */
function get_gallery_categories($onlyActive = false) {
    $data = get_gallery_data();
    $cats = $data['categories'] ?? [];
    if ($onlyActive) {
        return array_filter($cats, function($c) {
            return ($c['status'] ?? 'Active') === 'Active';
        });
    }
    return $cats;
}

/**
 * Save or update a Gallery Category
 */
function save_gallery_category($key, $categoryData) {
    $data = get_gallery_data();
    $cats = $data['categories'] ?? [];
    $cats[$key] = array_merge($cats[$key] ?? [], $categoryData);
    $data['categories'] = $cats;
    return save_gallery_data($data);
}

/**
 * Delete a Gallery Category
 */
function delete_gallery_category($key) {
    $data = get_gallery_data();
    $cats = $data['categories'] ?? [];
    unset($cats[$key]);
    $data['categories'] = $cats;
    return save_gallery_data($data);
}

/**
 * Get All Gallery Photos (Combining directory scans and custom uploads)
 */
function get_gallery_photos($category = 'all', $onlyActive = false) {
    $data = get_gallery_data();
    $categories = $data['categories'] ?? [];
    $customPhotos = $data['custom_photos'] ?? [];
    $allPhotos = [];

    // 1. Custom uploaded photos
    foreach ($customPhotos as $cp) {
        $catKey = $cp['cat'] ?? 'campus';
        $catData = $categories[$catKey] ?? [
            'name' => 'General',
            'badge' => 'Campus',
            'icon' => 'fa-images'
        ];
        
        $itemStatus = $cp['status'] ?? 'Active';
        if ($onlyActive && $itemStatus !== 'Active') {
            continue;
        }

        if ($category !== 'all' && $catKey !== $category) {
            continue;
        }

        $allPhotos[] = [
            'id' => $cp['id'] ?? ('cp_' . md5($cp['url'] ?? '')),
            'cat' => $catKey,
            'catName' => $catData['name'] ?? 'General',
            'badge' => $cp['badge'] ?? ($catData['badge'] ?? 'Campus'),
            'title' => $cp['title'] ?? 'Campus Photograph',
            'url' => base_url($cp['url'] ?? ''),
            'raw_url' => $cp['url'] ?? '',
            'is_custom' => true,
            'status' => $itemStatus
        ];
    }

    // 2. Directory scanned photos
    $rootDir = dirname(__DIR__);
    foreach ($categories as $catKey => $catData) {
        if ($onlyActive && ($catData['status'] ?? 'Active') !== 'Active') {
            continue;
        }

        if ($category !== 'all' && $catKey !== $category) {
            continue;
        }

        $dirRel = $catData['dir'] ?? '';
        if (empty($dirRel)) continue;

        $dirPath = $rootDir . '/' . $dirRel;
        if (is_dir($dirPath)) {
            $files = scandir($dirPath);
            foreach ($files as $f) {
                if ($f !== '.' && $f !== '..' && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $f)) {
                    $cleanName = pathinfo($f, PATHINFO_FILENAME);
                    $cleanName = preg_replace('/[_\-\(\)]+/', ' ', $cleanName);
                    $photoId = 'dir_' . $catKey . '_' . md5($f);

                    $allPhotos[] = [
                        'id' => $photoId,
                        'cat' => $catKey,
                        'catName' => $catData['name'] ?? 'General',
                        'badge' => $catData['badge'] ?? 'Campus',
                        'title' => ucwords(trim($cleanName)),
                        'url' => base_url($dirRel . '/' . $f),
                        'raw_url' => $dirRel . '/' . $f,
                        'is_custom' => false,
                        'status' => 'Active'
                    ];
                }
            }
        }
    }

    return $allPhotos;
}

/**
 * Save or Add Custom Photo
 */
function save_gallery_photo($photo) {
    $data = get_gallery_data();
    $photos = $data['custom_photos'] ?? [];
    $id = $photo['id'] ?? ('cp_' . time() . '_' . rand(100, 999));
    $photo['id'] = $id;
    $found = false;

    foreach ($photos as &$p) {
        if (($p['id'] ?? '') === $id) {
            $p = array_merge($p, $photo);
            $found = true;
            break;
        }
    }

    if (!$found) {
        array_unshift($photos, $photo);
    }

    $data['custom_photos'] = array_values($photos);
    return save_gallery_data($data);
}

/**
 * Delete Custom Photo
 */
function delete_gallery_photo($id) {
    $data = get_gallery_data();
    $photos = $data['custom_photos'] ?? [];
    $filtered = array_filter($photos, function($p) use ($id) {
        return ($p['id'] ?? '') !== $id;
    });
    $data['custom_photos'] = array_values($filtered);
    return save_gallery_data($data);
}

/**
 * Get Gallery Videos
 */
function get_gallery_videos($onlyActive = false) {
    $data = get_gallery_data();
    $videos = $data['videos'] ?? [];
    if ($onlyActive) {
        return array_values(array_filter($videos, function($v) {
            return ($v['status'] ?? 'Active') === 'Active';
        }));
    }
    return $videos;
}

/**
 * Save or update a Gallery Video
 */
function save_gallery_video($video) {
    $data = get_gallery_data();
    $videos = $data['videos'] ?? [];
    $id = $video['id'] ?? ('vid_' . time());
    $video['id'] = $id;
    $found = false;

    foreach ($videos as &$v) {
        if (($v['id'] ?? '') === $id) {
            $v = array_merge($v, $video);
            $found = true;
            break;
        }
    }

    if (!$found) {
        $videos[] = $video;
    }

    $data['videos'] = array_values($videos);
    return save_gallery_data($data);
}

/**
 * Delete a Gallery Video
 */
function delete_gallery_video($id) {
    $data = get_gallery_data();
    $videos = $data['videos'] ?? [];
    $filtered = array_filter($videos, function($v) use ($id) {
        return ($v['id'] ?? '') !== $id;
    });
    $data['videos'] = array_values($filtered);
    return save_gallery_data($data);
}
