<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$wordcountURL1 = "http://word.count.40206885.qpc.hal.davecutting.uk/?paragraph=";
$wordcountURL2 = "http://word.count2.40206885.qpc.hal.davecutting.uk/?paragraph=";
$checkURL1 = "http://check.40206885.qpc.hal.davecutting.uk/?paragraph=";
$checkURL2 = "http://check2.40206885.qpc.hal.davecutting.uk/?paragraph=";
$kwcURL1 = "http://keyword.count.40206885.qpc.hal.davecutting.uk/?paragraph=";
$kwcURL2 = "http://keyword.count2.40206885.qpc.hal.davecutting.uk/?paragraph=";

function get_http_response_code($url)
{
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}

if (isset($_GET["paragraph"])) {
    $paragraph = $_GET["paragraph"];
    $paragraph = str_replace(" ", ".", "$paragraph");
}

if (isset($_GET["word"])) {
    $word = $_GET["word"];
}

if (isset($_GET["service"])) {
    $service = $_GET["service"];
}

if ($service == "wordcount") {
    if (get_http_response_code($wordcountURL1) == 200) {
        $response = $wordcountURL1 . $paragraph;
    } else {
        $response = $wordcountURL2 . $paragraph;
    }
}

if ($service == "check") {
    if (get_http_response_code($checkURL1) == 200) {
        $response = $checkURL1 . $paragraph . "&word=" . $word;
    } else {
        $response = $checkURL2 . $paragraph . "&word=" . $word;
    }
}

if ($service == "keywordcount") {
    if (get_http_response_code($kwcURL1) == 200) {
        $response = $kwcURL1 . $paragraph . "&word=" . $word;
    } else {
        $response = $kwcURL2 . $paragraph . "&word=" . $word;
    }
}

echo file_get_contents($response);

exit();

?>
