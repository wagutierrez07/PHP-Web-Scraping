<?php 
include "simple_html_dom.php";

//cURL not available in other computers, fixing actively
$ch = curl_init();
curl_setopt($ch, option: CURLOPT_URL, value:"https://github.com/ReinKaos95?tab=repositories");
curl_setopt($ch, option: CURLOPT_FOLLOWLOCATION, value: 1);
curl_setopt($ch, option: CURLOPT_RETURNTRANSFER, value: 1);
$response= curl_exec($ch);
//echo $response;

$html = new simple_html_dom();
$html->load($response);
foreach ($html->find(selector: 'div[class="position-relative"]') as $link) {
    echo $link->innertext . "<br>";
}

?>