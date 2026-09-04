$baseUrl = "https://sssutms.co.in"
$main = Invoke-WebRequest -Uri "$baseUrl" -UserAgent "Mozilla/5.0"
$links = $main.Links | Where-Object { $_.innerText -match "IQAC" -or $_.href -match "iqac" } | Select-Object -Property innerText, href
$links | Format-Table -AutoSize
