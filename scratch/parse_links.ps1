$html = Get-Content -Path "d:\xampp\htdocs\sssu\satya-sai\scratch\iqac_stripped.html" -Raw

# Extract all <a> tags with href and text
$aMatches = [regex]::Matches($html, '(?i)<a[^>]+href="([^"]+)"[^>]*>(.*?)</a>')
Write-Host "Found $($aMatches.Count) links in IQAC page."

$links = @()
foreach ($m in $aMatches) {
    $url = $m.Groups[1].Value
    $txt = ($m.Groups[2].Value -replace '<[^>]+>', '').Trim()
    if ($url -match '\.pdf$' -or $txt -match 'Meeting|Minutes|Criteria|Syllabus|Report|NAAC') {
        $links += [PSCustomObject]@{
            Text = $txt
            Url = $url
        }
    }
}

Write-Host "Filtered Links Count: $($links.Count)"
$links | Out-String | Write-Host
