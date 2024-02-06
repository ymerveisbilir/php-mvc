<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL^E_NOTICE);

require_once "config.php";
require_once "system/App.php";
require_once "system/Database.php";
require_once "route.php";

require_once "layout/mainLayout.php";


?>