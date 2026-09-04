$content = Get-Content "d:\xampp\htdocs\sssu\satya-sai\scratch\iqac_stripped.html" -Raw

# Find all links
$matches = [regex]::Matches($content, 'href="([^"]+)"')
$pdfList = @()

foreach ($m in $matches) {
    $url = $m.Groups[1].Value
    if ($url -match '\.pdf' -and $url -notmatch 'Meeting|IQAC_Minutes|M\d+\.pdf') {
        if ($pdfList -notcontains $url) {
            $pdfList += $url
        }
    }
}

Write-Host "Found $($pdfList.Count) Criteria PDF URLs"
foreach ($u in $pdfList) {
    Write-Host $u
}
