$urls = @(
    'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSix.html',
    'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSeven.html',
    'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFive.html',
    'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFour.html',
    'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaThree.html',
    'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaTwo.html',
    'https://sssutms.co.in/cms/Website/Academic/NAAC/CriteriaOne.html',
    'https://sssutms.co.in/cms/Website/Academic/NAAC/SSR.html',
    'https://sssutms.co.in/Academic/NAAC/CriteriaSix.php',
    'https://sssutms.co.in/Academic/NAAC/CriteriaSeven.php'
)

foreach ($u in $urls) {
    try {
        $r = Invoke-WebRequest -Uri $u -UserAgent 'Mozilla/5.0' -TimeoutSec 5
        Write-Host "$u -> $($r.StatusCode)"
        # Check if there are any PDF links
        $pdfLinks = $r.Links | Where-Object { $_.href -match '\.pdf' } | Select-Object -ExpandProperty href
        Write-Host "PDFs found: $($pdfLinks.Count)"
        $pdfLinks | ForEach-Object { Write-Host "   $_" }
    } catch {
        Write-Host "$u -> $($_.Exception.Message)"
    }
}
