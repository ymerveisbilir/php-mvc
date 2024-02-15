<?php

class adminModel extends mainModel{

         public function user(){
                $stmt = $this->db->query("SELECT * FROM users");
                return $stmt;

         }
         public function roles(){
                  $stmt = $this->db->query("SELECT * FROM roles");
                  return $stmt;
         }

         public function languages(){
                  $stmt = $this->db->query("SELECT * FROM languages");
                  return $stmt;
         }

         public function permissions(){
                  $stmt = $this->db->query("SELECT * FROM permissions");
                  return $stmt;
         }
         public function pages(){
              $stmt = $this->db->query("SELECT * FROM pages");
              return $stmt;
     }
}

?>