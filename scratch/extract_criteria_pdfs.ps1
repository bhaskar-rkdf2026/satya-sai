$content = Get-Content "d:\xampp\htdocs\sssu\satya-sai\scratch\iqac_stripped.html" -Raw

$matches = [regex]::Matches($content, 'href="([^"]+\.pdf)"')
Write-Host "Total PDF links found in iqac_stripped.html: $($matches.Count)"

$uniqueLinks = @()
foreach ($m in $matches) {
    $url = $m.Groups[1].Value
    if ($uniqueLinks -notcontains $url) {
        $uniqueLinks += $url
    }
}

Write-Host "Unique PDF links: $($uniqueLinks.Count)"
$uniqueLinks | ForEach-Object { Write-Host $_ }
