<?php
error_reporting(E_ALL);
require_once(__DIR__.'/vendor/autoload.php');

$path = $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].dirname($_SERVER['PHP_SELF']);
$dataExporter = new SolStar\DataExporter();
$dataExporter->url = $path.'/dummy.php';

$result = null;
if ($dataExporter->tryProcess()) {
  $result = $dataExporter->getData();
  print_r($result);
}
else {
  echo $dataExporter->getError();
}
