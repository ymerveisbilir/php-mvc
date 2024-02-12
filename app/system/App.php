<?php

class App
{
         protected $nowPath;
         protected $nowMethod;
         protected static $routes = [];
         protected $home;


         public function __construct()
         {
                  $this->nowPath = $_SERVER['REQUEST_URI'];
                  $this->nowMethod = $_SERVER['REQUEST_METHOD'];

                  global $config;        // print_r($config);
                  $this->home = $config['home'];
  
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

                  //echo "func. tetiklendi<br>";
                  foreach (self::$routes as $routes) {

                           //print_r($routes);
                           //echo "<br>";

                           // $routes dizisinden gelen değerleri değişkenlere bölüyoruz.
                           list($method, $link, $path, $auth) = $routes;

                           //  echo $method."<br>".$link."<br>".$path."<br>";

                           $methodCheck = $this->nowMethod == $method;

                           $pathCheck = preg_match(pattern: "@^$link$@", subject: $this->nowPath, flags: PREG_UNMATCHED_AS_NULL, matches: $params);

                           //print_r($params); gelen link ile route'daki link eşleşiyorsa 0 değerini yazdırır.
                     

                           $modul="";
                           $controller="";
                           $method="";
                           if($methodCheck && $pathCheck){
                                    $url = explode("/",$path);
                                    array_shift($url);
                                    list($activeModul,$activeMethod) = $url;
                                   // echo $modul."<br>".$method."<br><br>";

                                   if($this->nowPath == "/proje/"){//anasayfa ise 
                                    $modul = $this->home['modul'];
                                    $controller = $this->home['modul']."Controller";
                                    $method = $this->home['method'];

                                    //print_r($this->$home);
                                   }else{
                                    $modul = $activeModul;
                                    $controller = $activeModul."Controller";
                                    $method = $activeMethod;

                                    //print_r($method);
                                   }
                           }

                           if($modul != "" and $controller!=''){
                              if(file_exists($file="../app/moduls/".$modul."/controller/".$controller.".php")){
                                    require_once $file;

                               
                                    if(class_exists($controller)){
                                          $class=new $controller();
                                          if(method_exists($class,$method)){ //Class içerisinde tanımlı method var mı ?
                                                //print_r($params); url'den gelen parametreleri burada görebilirsin.
                                              return call_user_func([$class,$method]);
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