<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
require('wordcountfunction.php');

$output = array(
	"error" => false,
    "string" => "",
	"answer" => 0
);

$paragraph = $_REQUEST['paragraph'];

$answer=wordcount($paragraph);

$output['string']=$paragraph."=".$answer;
$output['answer']=$answer;

echo json_encode($output);
exit();
