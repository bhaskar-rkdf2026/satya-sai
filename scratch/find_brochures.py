import urllib.request
import re
from bs4 import BeautifulSoup

url = "https://sssutms.co.in/"
headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'}

try:
    req = urllib.request.Request(url, headers=headers)
    html = urllib.request.urlopen(req, timeout=15).read().decode('utf-8', errors='ignore')
    soup = BeautifulSoup(html, 'html.parser')
    
    print("=== SEARCHING FOR BROCHURE / PROSPECTUS / ADMISSION LINKS ===")
    for a in soup.find_all('a', href=True):
        href = a['href']
        text = a.get_text(strip=True)
        if any(keyword in href.lower() or keyword in text.lower() for keyword in ['brochure', 'prospectus', 'admission']):
            print(f"Text: '{text}' | Href: {href}")
            
except Exception as e:
    print(f"Error fetching home page: {e}")
