<?php

function liveservicetest($result) {

function microtime_float() {

    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$starttimer = microtime_float();
$teststarttime = date("h:i:sa");
$dateoftest = date('d-M-y'); 
$serviceURL = 'http://check.40206885.qpc.hal.davecutting.uk/';

function get_http_response_code($serviceURL) {
    $headers = get_headers($serviceURL);
    return substr($headers[0], 9, 3);
}

$statuscode = get_http_response_code($serviceURL);
$expected = 200;

if ($statuscode == $expected) {

    $status = '200 OK';

} else if ($statuscode = 404) {
    
    $status = '404 Not Found';
} 

else if ($statuscode = 503) {
    
    $status = '503 Service Unavailable';
}

$stoptimer = microtime_float();
$testfinishtime = date("h:i:sa");
$testduration = $stoptimer - $starttimer;

$result = array(
    'serviceurl'=>$serviceURL,
    'dateoftest'=>$dateoftest,
    'teststarttime'=>$teststarttime,
    'statuscode'=>$statuscode,
    'status'=>$status,
    'testfinishtime'=>$testfinishtime,
    'testduration'=>$testduration,  
);

return $result;
}

?>