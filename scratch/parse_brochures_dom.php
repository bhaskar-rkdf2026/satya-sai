<?php
$html = file_get_contents('d:/xampp/htdocs/sssu/satya-sai/assets/images/sssutms.co.in/cms/Website/Admission/Brochures.html');

$dom = new DOMDocument();
@$dom->loadHTML($html);

$xpath = new DOMXPath($dom);
$cards = $xpath->query('//div[contains(@class, "card-body")]');

if ($cards->length > 0) {
    $card = $cards->item(0);
    file_put_contents('d:/xampp/htdocs/sssu/satya-sai/scratch/card_body_output.txt', $dom->saveHTML($card));
    echo "Saved to scratch/card_body_output.txt\n";
} else {
    echo "Card body not found!\n";
}
