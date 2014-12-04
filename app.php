<?php

$config = array ("main" => array("Controller" => "Main",
                                 "Action" => "Index")); 

$application = new Route;
$application->start();