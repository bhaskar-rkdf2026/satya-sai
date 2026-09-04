$content = Get-Content -Path "C:\Users\Admin\.gemini\antigravity-ide\brain\49dfe431-3345-447b-8514-ece12de998fd\.system_generated\steps\41\content.md" -Raw

$destDir = "d:\xampp\htdocs\sssu\satya-sai\assets\images\partners"
if (!(Test-Path $destDir)) { New-Item -ItemType Directory -Path $destDir }

# Match <img ... src="data:image/(png|jpeg|jpg|gif);base64,([^"]+)" ... />
$matches = [regex]::Matches($content, '(?i)<img[^>]+src="data:image/([^;]+);base64,([^"]+)"[^>]*>')
$i = 1
foreach ($m in $matches) {
    $ext = $m.Groups[1].Value
    $b64 = $m.Groups[2].Value
    
    # Check if data-filename is present
    $filename = "image_$i.$ext"
    if ($m.Value -match 'data-filename="([^"]+)"') {
        $filename = $Matches[1]
    }
    
    $bytes = [Convert]::FromBase64String($b64)
    $filePath = Join-Path $destDir $filename
    [System.IO.File]::WriteAllBytes($filePath, $bytes)
    Write-Host "Saved: $filePath ($($bytes.Length) bytes)"
    $i++
}
