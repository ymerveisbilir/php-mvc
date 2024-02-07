<?php
class userModel extends mainModel {

         public function users(){
                  $stmt = $this->db->query("SELECT * FROM users");
                  return $stmt;
         }
}


?>