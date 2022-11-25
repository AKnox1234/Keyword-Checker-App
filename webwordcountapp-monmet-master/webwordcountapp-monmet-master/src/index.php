?><?php


$frontendlog = fopen("logfrontendservice.csv", "r");
$wordcountlog = fopen("logwordcountservice.csv", "r");
$checklog = fopen("logcheckservice.csv", "r");
$keywordcountlog = fopen("logkeywordcountservice.csv", "r");
$proxylog = fopen("logproxyservice.csv", "r");

$service = $frontendlog;
$servicename = "Frontend Service";

if (isset($_GET["service"])) {
    $chosenservice = $_GET["service"];
}

if ($chosenservice == "frontend") {
    $service = $frontendlog;
    $servicename = "Frontend Service";
}

if ($chosenservice == "wordcount") {
    $service = $wordcountlog;
    $servicename = "Word Count Service";
}

if ($chosenservice == "check") {
    $service = $checklog;
    $servicename = "Keyword Check Service";
}

if ($chosenservice == "keywordcount") {
    $service = $keywordcountlog;
    $servicename = "Keyword Count Service";
}

if ($chosenservice == "proxy") {
    $service = $proxylog;
    $servicename = "Proxy Service";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>40206885 Monmet</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>



    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Live Service Monitoring</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="http://monmet.40206885.qpc.hal.davecutting.uk/?service=frontend">Frontend</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="http://monmet.40206885.qpc.hal.davecutting.uk/?service=wordcount">Word Count</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="http://monmet.40206885.qpc.hal.davecutting.uk/?service=check">Keyword Check</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="http://monmet.40206885.qpc.hal.davecutting.uk/?service=keywordcount">Keyword Count</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="http://monmet.40206885.qpc.hal.davecutting.uk/?service=proxy">Proxy</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                    <div class="sidebar-heading border-bottom bg-light"><?php echo $servicename; ?> </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                <?php
                $x = 0;
                while (($row = fgetcsv($service)) !== false) {
                    $x++;
                    $serviceURL = $row[0];
                    $dateoftest = $row[1];
                    $teststarttime = $row[2];
                    $statuscode = $row[3];
                    $status = $row[4];
                    $testfinishtime = $row[5];
                    $testduration = $row[6];

                    echo " 

                    <div class='card-body'>
                        <h5 class='card-title'>Test #$x &nbsp&nbsp&nbsp&nbsp&nbsp $dateoftest &nbsp&nbsp&nbsp&nbsp&nbsp Status : $status</h5>
                        <p class='card-text'>Test started at : $teststarttime &nbsp&nbsp&nbsp&nbsp&nbsp Test finished at : $testfinishtime </p>
                        <p class='card-text'>Test completed in : $testduration seconds </p>
                    </div>

                    ";
                }
                ?>
                  
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
