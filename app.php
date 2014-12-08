<?php

$config = array ("main" => array("Controller" => "Main",
                                 "Action" => "Index")); 
session_start();
$application = new Route;
$application->start();