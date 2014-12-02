<?php
ini_set('display_errors', 1);
require_once "autoloader.php";
require_once "route.php";

$application = new Route;
$application->start();
