[System.Net.ServicePointManager]::SecurityProtocol = [System.Net.SecurityProtocolType]::Tls12 -bor [System.Net.SecurityProtocolType]::Tls13
$destDir = "d:\xampp\htdocs\sssu\satya-sai\assets\images\Files\Link\IQAC"
if (!(Test-Path $destDir)) {
    New-Item -ItemType Directory -Path $destDir -Force | Out-Null
}

$filesToDownload = @(
    @{ Name = "SSSUTMS_IQAC_Meeting_28_Feb_2024.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/SSSUTMS%20IQAC%20Meeting%2028%20Feb%202024.pdf" },
    @{ Name = "IQAC_MEETING_2023_09_Dec.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/IQAC%20MEETING%202023%2009%20Dec.pdf" },
    @{ Name = "IQAC_Minutes_of_Meeting_20_September_2023.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/IQAC%20Minutes%20of%20Meeting%2020%20September%202023%20%281%29.pdf" },
    @{ Name = "IQAC_Minutes_of_Meeting_12_May_23.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/IQAC%20Minutes%20of%20Meeting%2012%20May%2023.pdf" },
    @{ Name = "M19_28_Feb_2023.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M19.pdf" },
    @{ Name = "M18_30_Nov_2022.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M18.pdf" },
    @{ Name = "M17_20_Aug_2022.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M17.pdf" },
    @{ Name = "M16_07_May_2022.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M16.pdf" },
    @{ Name = "M15_19_Feb_2022.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M15.pdf" },
    @{ Name = "M14_04_Oct_2021.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M14.pdf" },
    @{ Name = "M13_09_Jun_2021.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M13.pdf" },
    @{ Name = "M12_05_Apr_2021.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M12.pdf" },
    @{ Name = "M11_08_Feb_2021.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M11.pdf" },
    @{ Name = "M10_21_Dec_2020.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M10.pdf" },
    @{ Name = "M9_22_Jul_2020.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M9.pdf" },
    @{ Name = "M8_16_Apr_2020.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M8.pdf" },
    @{ Name = "M7_15_Jan_2020.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M7.pdf" },
    @{ Name = "M6_17_Dec_2019.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M6.pdf" },
    @{ Name = "M5_12_Sep_2019.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M5.pdf" },
    @{ Name = "M4_28_May_2019.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M4.pdf" },
    @{ Name = "M3_17_Feb_2019.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M3.pdf" },
    @{ Name = "M2_24_Nov_2018.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M2.pdf" },
    @{ Name = "M1_18_Aug_2018.pdf"; Url = "https://www.sssutms.co.in/cms/Areas/Website/Files/Link/IQAC/M1.pdf" }
)

foreach ($item in $filesToDownload) {
    $outPath = Join-Path $destDir $item.Name
    Write-Host "Downloading $($item.Name)..."
    try {
        Invoke-WebRequest -Uri $item.Url -OutFile $outPath -UserAgent "Mozilla/5.0" -TimeoutSec 15
        $size = (Get-Item $outPath).Length
        Write-Host "SUCCESS: $($item.Name) ($size bytes)"
    } catch {
        Write-Host "FAILED: $($item.Name) - $($_.Exception.Message)"
    }
}
