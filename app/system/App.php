<?php

use Symfony\Component\HttpFoundation\Request;

class App
{
         protected $nowPath;
         protected $nowMethod;
         protected static $routes = [];


         public function __construct()
         {
                  $this->nowPath = $_SERVER['REQUEST_URI'];
                  $this->nowMethod = $_SERVER['REQUEST_METHOD'];
  

                  $this->startRoute();

                  
         }

         public static function getAction($link, $path, $auth = false)
         {
                  self::$routes[] = ['GET', $link, $path, $auth];
         }

         public static function postAction($link, $path, $auth = false)
         {
                  self::$routes[] = ['POST', $link, $path, $auth];
         }




         public function startRoute()
         {
            $request = Request::createFromGlobals();


                  //echo "func. tetiklendi<br>";
                  foreach (self::$routes as $routes) {

                           //print_r($routes);
                           //echo "<br>";

                           // $routes dizisinden gelen değerleri değişkenlere bölüyoruz.
                           list($method, $link, $path, $auth) = $routes;

                           //  echo $method."<br>".$link."<br>".$path."<br>";

                           $methodCheck = $this->nowMethod == $method;


                         

                           $pathCheck = preg_match(pattern: "@^$link$@", subject: $this->nowPath, flags: PREG_UNMATCHED_AS_NULL, matches: $params);

                           //print_r($params); gelen link ile route'daki link eşleşiyorsa true(0) değerini yazdırır.
                     

                           $modul="";
                           $controller="";
                           $method="";
                           if($methodCheck && $pathCheck){

                                    $url = explode("/",$path);
                                    array_shift($url);
                                    //print_r($url);  //[1] => modül adı , [2] => controller adı , [3] => fonk. adı
                                    //die();
                                    list($activeModul,$activeController,$activeMethod) = $url;
                                   // echo $modul."<br>".$method."<br><br>";

                                    if($auth==false || ($auth==true && $_SESSION['user_id'] != '')){
                                          $modul = $activeModul;
                                          $controller = $activeController."Controller";
                                          $method = $activeMethod;
                                    }else{
                                          //login sayfasına yönlendirilecek.
                                          //echo "yetki yok";
                                          header("Location: http://localhost/proje/login");
                                    }
                         

                                    //print_r($method);
                                   
                           }

                           if($modul != "" and $controller!=''){
                              if(file_exists($file="../app/moduls/".$modul."/controller/".$controller.".php")){
                                    require_once $file;

                            
                                    if(class_exists($controller)){
                                          $class=new $controller();
                                          if(method_exists($class,$method)){ //Class içerisinde tanımlı method var mı ?
                                                //print_r($params); //url'den gelen parametreleri burada görebilirsin.

                                                if (isset($params[1])) {//fonksiyona gönderilecek bir parametre var mı ? $user_id gibi 
                                                      return call_user_func([$class, $method], $params[1]);
                                                  } else {
                                                      return call_user_func([$class, $method],$request);      
                                                }
                                                
                                          }else{
                                                echo "Method Not Found.";
                                          }
                                    }else{
                                          echo "Class Not Found.";
                                    }
                              }else{
                                       echo "Method Not Found"."<br>";
                              }
                           }
                         


                  }

        

         }
}

?>