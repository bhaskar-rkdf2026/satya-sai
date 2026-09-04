$html = Get-Content "d:\xampp\htdocs\sssu\satya-sai\scratch\iqac_stripped.html" -Raw

# Match all links in table or text
$regex = [regex]'<tr[^>]*>[\s\S]*?</tr>'
$rows = $regex.Matches($html)

Write-Host "Total rows found in iqac_stripped.html: $($rows.Count)"

$results = @()

foreach ($r in $rows) {
    $txt = $r.Value
    if ($txt -match 'href="([^"]+)"') {
        $href = $matches[1]
        # strip tags for summary
        $cleanText = [regex]::Replace($txt, '<[^>]+>', ' ')
        $cleanText = [regex]::Replace($cleanText, '\s+', ' ').Trim()
        $results += [PSCustomObject]@{
            Text = if ($cleanText.Length -gt 100) { $cleanText.Substring(0, 100) } else { $cleanText }
            Href = $href
        }
    }
}

Write-Host "Total rows with links: $($results.Count)"
$results | Format-Table -AutoSize | Out-String -Width 200 | Write-Host
