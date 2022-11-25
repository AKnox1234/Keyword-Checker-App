<?php
echo "Test Script Starting\n";
require('functions.inc.php');

$paragraph='This is test paragraph';
$word='test';
$expect=1;

$answer=check($paragraph,$word);

echo "Test Result: ".$paragraph."+".$word."=".$answer." (expected: ".$expect.")\n";

if ($answer==$expect)
{
    echo "Test Passed\n";
    exit(0); // exit code 0 - success
}
else
{
    echo "Test Failed\n";
    exit(1); // exit code not zero - error
}
