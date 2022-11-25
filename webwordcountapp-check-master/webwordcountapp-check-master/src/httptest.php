<?php
echo "Test Script Starting\n";


$serviceURL = 'http://check.40206885.qpc.hal.davecutting.uk/';

function get_http_response_code($serviceURL) {
    $headers = get_headers($serviceURL);
    return substr($headers[0], 9, 3);
}

$statuscode = get_http_response_code($serviceURL);
$expect=200;

echo "Status Code : ".$statuscode."\n";

if ($statuscode==$expect)
{
    echo "Test Passed\n";
    exit(0); // exit code 0 - success
}
else
{
    echo "Test Failed\n";
    exit(1); // exit code not zero - error
}

?>
