import re
from bs4 import BeautifulSoup

html_path = r'd:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Admission/Brochures.html'
with open(html_path, 'r', encoding='utf-8', errors='ignore') as f:
    html = f.read()

soup = BeautifulSoup(html, 'html.parser')

print("=== PAGE TITLE ===")
title = soup.find('title')
if title:
    print(title.get_text(strip=True))

print("\n=== MAIN CARD HEADINGS AND PARAGRAPHS ===")
card_body = soup.find('div', class_='card-body')
if card_body:
    for elem in card_body.find_all(['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'a', 'table']):
        if elem.name == 'a':
            href = elem.get('href', '')
            text = elem.get_text(strip=True)
            print(f"LINK: Text='{text}' | Href='{href}'")
        elif elem.name == 'table':
            print("TABLE FOUND:")
            for row in elem.find_all('tr'):
                cols = [td.get_text(strip=True) for td in row.find_all(['td', 'th'])]
                print("  ROW:", cols)
        else:
            text = elem.get_text(strip=True)
            if text:
                print(f"{elem.name.upper()}: {text}")
else:
    print("card-body div not found!")
