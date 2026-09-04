$content = Get-Content -Path "C:\Users\Admin\.gemini\antigravity-ide\brain\49dfe431-3345-447b-8514-ece12de998fd\.system_generated\steps\41\content.md" -Raw
$regex = '(?s)<article.*?</article>'
if ($content -match $regex) {
    $article = $Matches[0]
    $clean = $article -replace 'src="data:image/[^"]+"', 'src="BASE64_IMAGE"'
    $clean | Set-Content -Path "d:\xampp\htdocs\sssu\satya-sai\scratch\article_clean.html"
    Write-Host "Success! Saved article_clean.html"
} else {
    Write-Host "No article match found."
}
