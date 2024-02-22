<?php

class adminModel extends mainModel
{

     public function user()
     {
          $stmt = $this->db->query("SELECT * FROM users");
          return $stmt;

     }
     public function roles()
     {
          $stmt = $this->db->query("SELECT * FROM roles");
          return $stmt;
     }

     public function languages()
     {
          $stmt = $this->db->query("SELECT * FROM languages");
          return $stmt;
     }

     public function permissions()
     {
          $stmt = $this->db->query("SELECT * FROM permissions");
          return $stmt;
     }
     public function pages()
     {
          //Eğer ki rolü editör ise bildiği dile göre içerikler gelsin.
          //Diğer rollerde tüm içerikler gözüksün.

          $query = $this->db->query("SELECT role_id FROM role_users WHERE user_id = '$_SESSION[user_id]'");
          $query->execute();
          $role_users = $query->fetch(PDO::FETCH_ASSOC);

          if ($role_users['role_id'] == 3) {
               $stmt = $this->db->query("SELECT * FROM `pages` INNER JOIN role_users ON pages.language_id=role_users.language_id WHERE role_users.user_id = '$_SESSION[user_id]';");
               return $stmt;
          } else {
               $stmt = $this->db->query("SELECT * FROM `pages`");
               return $stmt;
          }

     }

     public function user_delete($user_id)
     {
          $query = $this->db->prepare("DELETE users, role_users FROM users LEFT JOIN role_users ON users.id = role_users.user_id  WHERE users.id = :user_id");
          $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
          $query->execute();
     }

     public function roleupdate($role_id)
     {

          $query = $this->db->prepare("SELECT * FROM roles WHERE id = :role_id");
          $query->bindParam(':role_id', $role_id, PDO::PARAM_INT);
          $query->execute();
          $roles = $query->fetch(PDO::FETCH_ASSOC);

          return $roles;
     }

     public function roleupdatePost($role_id){
          $sql = "UPDATE roles SET role_name = :role_name, role_description = :role_description WHERE id = :role_id";
          $stmt = $this->db->prepare($sql);
          $stmt->bindParam(':role_name', $_POST['rname']);
          $stmt->bindParam(':role_description', $_POST['rdescription']);
          $stmt->bindParam(':role_id', $role_id);
          $stmt->execute();
     }
     public function role_delete($role_id)
     {
          $query = $this->db->prepare("DELETE FROM roles WHERE id = :role_id");
          $query->bindParam(':role_id', $role_id, PDO::PARAM_INT);
          $query->execute();
     }

     public function languageupdate($language_id)
     {
          $query = $this->db->prepare("SELECT * FROM languages WHERE id = :language_id");
          $query->bindParam(':language_id', $language_id, PDO::PARAM_INT);
          $query->execute();
          $languages = $query->fetch(PDO::FETCH_ASSOC);

          return $languages;
     }

     public function language_delete($language_id)
     {
          $query = $this->db->prepare("DELETE FROM languages WHERE id = :language_id");
          $query->bindParam(':language_id', $language_id, PDO::PARAM_INT);
          $query->execute();
     }

     public function permissionupdate($permission_id)
     {
          $query = $this->db->prepare("SELECT * FROM permissions WHERE id = :permission_id");
          $query->bindParam(':permission_id', $permission_id, PDO::PARAM_INT);
          $query->execute();
          $permission = $query->fetch(PDO::FETCH_ASSOC);

          return $permission;
     }

     public function permission_delete($permission_id)
     {
          $query = $this->db->prepare("DELETE FROM permissions WHERE id = :permission_id");
          $query->bindParam(':permission_id', $permission_id, PDO::PARAM_INT);
          $query->execute();
     }

}

?>