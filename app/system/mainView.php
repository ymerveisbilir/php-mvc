<?php

class View{
    //dashboard 
    

         public static function frontView($modul, $method, $data = null)
         {
             if (file_exists($file = "../app/moduls/".$modul."/view/".$method."View.php")) {
                 require_once $file;
             } else {
                 echo "Page Not Found";
             }
     
         }

         
     
     
         public static function frontLayout($layout,$modul,$method,$data=null)
         {
             $data['VIEW']=View::frontView($modul,$method,$data);
     
             require_once "../app/layout/".$layout."Layout.php";
         }
}

?>