<?php

error_reporting(- 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
date_default_timezone_set('UTC');
//echo dirname(__DIR__).'../../'; exit();
$loader = require '../../'. 'autoload.php';
$loader->add('Pdf4me\\API\\LiveTests\\', __DIR__);
