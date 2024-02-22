<?php
namespace App\system;

use PDO;
class Database {

         private $conn;
         private string $host = DB_HOST;
         private string $user = DB_USER;
         private string $pass= DB_PASS;
         private string $name= DB_NAME;
     
         public function __construct() {

             try{
                  $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name . ';charset=utf8', $this->user, $this->pass);
                  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  //echo "connection successful";

             }catch(Exception $e){

                  die("connection failed:" . $e->getMessage());
             }

         }

         public function getConnection() {
                  return $this->conn;
              }
     }
?>