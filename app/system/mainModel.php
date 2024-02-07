<?php

class mainModel extends Database{
         public $db;

         public function __construct(){
                  $database = new Database();
                  $this->db = $database->getConnection();
         }
}

?>