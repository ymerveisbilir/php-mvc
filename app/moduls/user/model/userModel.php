<?php
namespace app\moduls\user\model;

use App\system\mainModel;
class userModel extends mainModel {

         public function users(){
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
}


?>