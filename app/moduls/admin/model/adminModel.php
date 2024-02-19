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
          //Eğer ki rolü editör ise bildiği dile göre içerikler gelsin.
          //Diğer rollerde tüm içerikler gözüksün.

          $query = $this->db->query("SELECT role_id FROM role_users WHERE user_id = '$_SESSION[user_id]'");
          $query->execute();
          $role_users = $query->fetch(PDO::FETCH_ASSOC);

          if($role_users['role_id'] == 3){
               $stmt = $this->db->query("SELECT * FROM `pages` INNER JOIN role_users ON pages.language_id=role_users.language_id WHERE role_users.user_id = '$_SESSION[user_id]';");
               return $stmt;
          }else{
               $stmt = $this->db->query("SELECT * FROM `pages`");
               return $stmt;
          }

     }
}

?>