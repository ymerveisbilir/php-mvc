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

         public static function getAction($link, $path, $auth = false, $area = null)
         {
                  self::$routes[] = ['GET', $link, $path, $auth, $area];
         }

         public static function postAction($link, $path, $auth = false, $area = null)
         {
                  self::$routes[] = ['POST', $link, $path, $auth, $area];
         }

         public function startRoute()
         {

                  //echo "func. tetiklendi<br>";
                  foreach (self::$routes as $routes) {

                           //print_r($routes);
                           //echo "<br>";

                           // $routes dizisinden gelen değerleri değişkenlere bölüyoruz.
                           list($method, $link, $path, $auth, $area) = $routes;

                           //  echo $method."<br>".$link."<br>".$path."<br>";

                           $methodCheck = $this->nowMethod == $method;

                           $pathCheck = preg_match(pattern: "@^$link$@", subject: $this->nowPath, flags: PREG_UNMATCHED_AS_NULL, matches: $matches);

                           //print_r($matches); gelen link ile route'daki link eşleşiyorsa 0 değerini yazdırır.

                           if($methodCheck && $pathCheck){
                                    $url = explode("/",$path);
                                    array_shift($url);
                                    list($activeModul,$activeMethod) = $url;
                                   // echo $modul."<br>".$method."<br><br>";

                                   if($this->nowPath == "/proje/"){//anasayfa ise 
                                    $modul = $this->home['modul'];
                                    $controller = $this->home['modul']."Controller.php";
                                    $method = $this->home['method'];

                                    //print_r($this->$home);
                                   }else{
                                    $modul = $activeModul;
                                    $controller = $activeModul."Controller.php";
                                    $method = $activeMethod;

                                    //print_r($method);
                                   }
                           }

                     

                           if(file_exists($file="../app/moduls/".$modul."/controller/".$controller)){
                                 require_once $file;
                           }else{
                                    echo "Method not found"."<br>";
                           }
                           

                      //Sorun : Örneğin http://localhost/proje/deneme url'indeyken route.php de bulunan diğer route'lar için method bulanmadı yazıyor.



                  }
         }
}

?>