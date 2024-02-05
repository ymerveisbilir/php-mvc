<?php

class userController
{

         private $conn;

         public function __construct(){
        
         $database = new Database();
         $this->conn = $database->getConnection();

         }
         public function register()
         {        
                   include __DIR__ . "../../view/register.php";
         }

         public function registerPost()
         {        
                  $data = $_POST;

                  // Formdan verileri alabiliyoruz.
                  $fname = $_POST['fname'];
                  $lname = $_POST['lname'];
                  $password = $_POST['password']; //password_hash(); md5();   -> şifreleme fonksiyonu 
                  $email = $_POST['email'];
              

                  //last_login kaydı tutulacak.
                  $query = $this->conn->prepare("INSERT INTO users (first_name, last_name, password, email) VALUES ('$fname', '$lname', '$password', '$email')");
              
                  $query->execute();
         }


}

?>