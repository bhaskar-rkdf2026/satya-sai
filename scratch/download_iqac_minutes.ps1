$baseDir = "d:\xampp\htdocs\sssu\satya-sai\assets\images\Files\Link\IQAC"
if (!(Test-Path $baseDir)) { New-Item -ItemType Directory -Path $baseDir }

$files = @(
    @{ Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/IQAC%20Minutes%20of%20Meeting%2020%20September%202023%20(1).pdf"; Name = "IQAC_Minutes_20_Sep_2023.pdf" },
    @{ Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/IQAC%20Minutes%20of%20Meeting%2009%20December%202023.pdf"; Name = "IQAC_Minutes_09_Dec_2023.pdf" },
    @{ Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/IQAC%20Minutes%20of%20Meeting%2028%20February%202024.pdf"; Name = "IQAC_Minutes_28_Feb_2024.pdf" }
)

$wc = New-Object System.Net.WebClient
foreach ($item in $files) {
    $dest = Join-Path $baseDir $item.Name
    try {
        $wc.DownloadFile($item.Url, $dest)
        Write-Host "Downloaded: $($item.Name) - Status: $(Test-Path $dest)"
    } catch {
        Write-Host "Error downloading $($item.Name): $_"
    }
}
