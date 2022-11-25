<?php
echo "Test Script Starting\n";
require('wordcountfunction.php');

$paragraph='Mark went for a walk in the park';
$expect=8;

$answer=wordcount($paragraph);

echo "Test Result: ".$paragraph."=".$answer." (expected: ".$expect.")\n";

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
