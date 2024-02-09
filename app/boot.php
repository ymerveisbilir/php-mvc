<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL^E_NOTICE);

require_once "config.php";
require_once "system/App.php";
require_once "system/Database.php";
require_once 'system/mainModel.php';//Veritabanı bağlantısı
require_once 'system/mainController.php';
require_once 'system/mainView.php'; 
require_once "route.php";

require_once "layout/mainLayout.php"; //bootstrap
require_once "layout/menuLayout.php";




//Model dosyalarının controller'a dahil edilmesi.
spl_autoload_register(function($class_name){

         $modul=explode("Model",$class_name);

         if (file_exists($include="../app/moduls/".$modul[0]."/model/".$class_name.".php"))
         {
             //echo "Model dosyası bulundu";
             require_once $include;
         }
     });

?>