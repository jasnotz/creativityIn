<?php
include_once 'simple_html_dom.php';
function file_get_contents_curl($url) {
    $ch = curl_init();
    $config['useragent'] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0';
    curl_setopt($ch, CURLOPT_USERAGENT, $config['useragent']);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // https 일때 이 한줄 추가 필요
    //Set curl to return the data instead of printing it to the browser.
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$dateString = date("Ymd", time());
$url = "https://creativity.hs.kr/lunch.view?date=$dateString";


$str = file_get_contents_curl($url);
$enc = mb_detect_encoding($str, array('EUC-KR', 'UTF-8', 'shift_jis', 'CN-GB'));
if ($enc != 'UTF-8') {
    $str = iconv($enc, 'UTF-8', $str);
}

//print_r($str);

$html = new simple_html_dom(); // Create a DOM object
$html->load($str); // Load HTML from a string

$R = array();
foreach($html->find('div[class=menuName]') as $element){
    array_push($R,$element->innertext);
}
echo $R[0];
?>