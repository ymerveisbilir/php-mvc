<?php
namespace App\system;

use App\system\Database;

class mainModel extends Database{
         public $db;

         public function __construct(){
                  $database = new Database();
                  $this->db = $database->getConnection();
         }
}

?>