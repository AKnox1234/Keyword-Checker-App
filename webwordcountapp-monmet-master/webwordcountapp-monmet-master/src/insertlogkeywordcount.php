<?php

require('testing/montestkeywordcount.php');

$output = array(
        "serviceurl"=>" ",
        "dateoftest"=>" ",
        "teststarttime"=>" ",
        "statuscode"=>" ",
        "status"=>" ",
        "testfinishtime"=>" ",
        "testduration"=>" ",
        );

$servicestatus = liveservicetest($result);

        $output['serviceurl']=$servicestatus['serviceurl'];
        $output['dateoftest']=$servicestatus['dateoftest'];
        $output['teststarttime']=$servicestatus['teststarttime'];
        $output['statuscode']=$servicestatus['statuscode'];
        $output['status']=$servicestatus['status'];
        $output['testfinishtime']=$servicestatus['testfinishtime'];
        $output['testduration']=$servicestatus['testduration'];

$servicecsv = "/var/www/html/logkeywordcountservice.csv";


$servicecsv = fopen($servicecsv, 'r+');
fputcsv($servicecsv, $output);
fclose($servicecsv);

exit();


?>
