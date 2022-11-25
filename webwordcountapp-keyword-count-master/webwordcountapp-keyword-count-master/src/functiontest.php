<?php
echo "Test Script Starting\n";
require('keywordcountfunction.php');

$paragraph='win lose win lose win win';
$word='win';

$expect=4;

$answer=keywordcount($paragraph, $word);

echo "Test Result: ".$paragraph."+".$word."=".$answer." (expected: ".$expect.")\n";

if ($answer==$expect)
{
    echo "Test Passed\n";
    exit(0); // exit code 0 - successs
}
else
{
    echo "Test Failed\n";
    exit(1); // exit code not zero - error
}
