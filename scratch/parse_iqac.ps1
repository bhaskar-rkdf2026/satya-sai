$html = Get-Content -Path "d:\xampp\htdocs\sssu\satya-sai\scratch\iqac_clean.html" -Raw

# Remove MS Word XML comments
$clean = $html -replace '(?s)<!--.*?-->', ''

# Save stripped HTML
$clean | Set-Content -Path "d:\xampp\htdocs\sssu\satya-sai\scratch\iqac_stripped.html"

# Extract all <table> tags
$tableMatches = [regex]::Matches($clean, '(?s)<table.*?</table>')
Write-Host "Found $($tableMatches.Count) tables in IQAC page."

$i = 1
foreach ($tm in $tableMatches) {
    Write-Host "--- TABLE $i ---"
    # Print table HTML without base64
    $tClean = $tm.Value -replace 'src="data:image/[^"]+"', 'src="BASE64"'
    Write-Host $tClean
    $i++
}

# Extract all PDF links
$pdfMatches = [regex]::Matches($clean, 'href="([^"]+\.pdf)"')
Write-Host "--- PDF LINKS ---"
foreach ($pm in $pdfMatches) {
    Write-Host $pm.Groups[1].Value
}
