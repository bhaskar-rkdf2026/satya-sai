import urllib.request
import re
import os

url = "https://sssutms.co.in/"
headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'}
req = urllib.request.Request(url, headers=headers)

try:
    with urllib.request.urlopen(req, timeout=15) as resp:
        html = resp.read().decode('utf-8', errors='ignore')
        print("Homepage fetched, length:", len(html))
        matches = re.findall(r'href=["\']([^"\']*)["\']', html, re.IGNORECASE)
        adm_links = [m for m in matches if 'admission' in m.lower() or 'procedure' in m.lower()]
        print("Admission related links:")
        for link in set(adm_links):
            print("  -", link)
except Exception as e:
    print("Error:", e)
