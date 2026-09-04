$html = Get-Content -Path "d:\xampp\htdocs\sssu\satya-sai\scratch\iqac_stripped.html" -Raw

# Match all headings and section titles
$headings = [regex]::Matches($html, '(?i)<h[1-6][^>]*>(.*?)</h[1-6]>')
Write-Host "--- HEADINGS FOUND ---"
foreach ($h in $headings) {
    $txt = ($h.Groups[1].Value -replace '<[^>]+>', '').Trim()
    if ($txt.Length -gt 0) {
        Write-Host "HEADING: $txt"
    }
}

# Match strong paragraph headers
$strongs = [regex]::Matches($html, '(?i)<strong>\s*<span[^>]*>(.*?)</span>\s*</strong>')
Write-Host "--- STRONG SPANS ---"
foreach ($s in $strongs) {
    $txt = ($s.Groups[1].Value -replace '<[^>]+>', '').Trim()
    if ($txt.Length -gt 0 -and $txt.Length -lt 100) {
        Write-Host "STRONG: $txt"
    }
}
