import requests
from bs4 import BeautifulSoup
import re
import os
import json

headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
}

criteria_pages = {
    "Criteria 1": [
        "https://www.sssutms.co.in/Academic/NAAC/CriteriaOne",
        "https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaOne.html"
    ],
    "Criteria 2": [
        "https://www.sssutms.co.in/Academic/NAAC/CriteriaTwo",
        "https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaTwo.html"
    ],
    "Criteria 3": [
        "https://www.sssutms.co.in/Academic/NAAC/CriteriaThree",
        "https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaThree.html"
    ],
    "Criteria 4": [
        "https://www.sssutms.co.in/Academic/NAAC/CriteriaFour",
        "https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFour.html"
    ],
    "Criteria 5": [
        "https://www.sssutms.co.in/Academic/NAAC/CriteriaFive",
        "https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaFive.html"
    ],
    "Criteria 6": [
        "https://www.sssutms.co.in/Academic/NAAC/CriteriaSix",
        "https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSix.html"
    ],
    "Criteria 7": [
        "https://www.sssutms.co.in/Academic/NAAC/CriteriaSeven",
        "https://www.sssutms.co.in/cms/Website/Academic/NAAC/CriteriaSeven.html"
    ]
}

results = {}

for c_name, urls in criteria_pages.items():
    results[c_name] = []
    html_content = ""
    working_url = ""
    for url in urls:
        try:
            r = requests.get(url, headers=headers, timeout=10, verify=False)
            if r.status_code == 200 and len(r.text) > 500:
                html_content = r.text
                working_url = url
                break
        except Exception as e:
            continue
    
    print(f"=== {c_name} (URL: {working_url}) ===")
    if not html_content:
        print("Failed to fetch page")
        continue

    soup = BeautifulSoup(html_content, 'html.parser')
    # Find all <a> tags or elements with href containing .pdf
    links = soup.find_all('a', href=True)
    pdf_links = []
    for a in links:
        href = a['href']
        text = a.get_text(strip=True)
        # Find context (row text or preceding text)
        parent_tr = a.find_parent('tr')
        tr_text = " | ".join([td.get_text(strip=True) for td in parent_tr.find_all(['td', 'th'])]) if parent_tr else ""
        if '.pdf' in href.lower() or 'pdf' in href.lower() or 'Download' in href:
            pdf_links.append({
                'text': text,
                'href': href,
                'tr_text': tr_text
            })
    results[c_name] = {
        'working_url': working_url,
        'pdf_count': len(pdf_links),
        'pdfs': pdf_links
    }
    print(f"Found {len(pdf_links)} PDF links")

with open('scratch/live_criteria_pdfs.json', 'w') as f:
    json.dump(results, f, indent=2)

print("\nSaved scratch/live_criteria_pdfs.json")
