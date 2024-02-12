<?php

class adminController extends mainController{

   
        public function __construct(){
                $mainModel = new mainModel();
                $this->db = $mainModel->db;


        }
        public function dashboard(){
             
                 $data = [];
                 $this->callView("admin","dashboard",$data);
         }        


         public function user(){

                $adminModel = new adminModel();
                $data['user'] = $adminModel->user();
                $data['roles'] = $adminModel->roles();
                $data['languages'] = $adminModel->languages();
                $data['permissions'] = $adminModel->permissions();

                $this->callView("admin","usersetting",$data);
         }

         public function userupdate(){
                //update formuna data gönderme alanı
                $userID = explode("proje/userupdate/",$_SERVER['REQUEST_URI']);


                $query = $this->db->query("SELECT * FROM users WHERE id = '$userID[1]'"); 
                $query->execute();
                $user = $query->fetch(PDO::FETCH_ASSOC);

                $query2 = $this->db->query("SELECT * FROM role_users WHERE user_id = '$userID[1]'"); 
                $query2->execute();
                $role_users = $query2->fetch(PDO::FETCH_ASSOC);

                //print_r($user);
                //die();

                $adminModel = new userModel();
                $data['roles'] = $adminModel->roles();
                $data['languages'] = $adminModel->languages();
                $data['permissions'] = $adminModel->permissions();


                $data['first_name'] = $user['first_name'];
                $data['last_name'] = $user['last_name'];
                $data['email'] = $user['email'];
                $data['id'] = $user['id'];


                $data['role_id'] = $role_users['role_id'];
                $data['permission_id'] = json_decode($role_users['permission_id']);
                $data['language_id'] = $role_users['language_id'];


                //die($role_users['permission_id']);


                $this->callView("admin","userupdate",$data);



              
         }

         public function userupdatePost(){

              $userID = explode("proje/userupdatePost/",$_SERVER['REQUEST_URI']);

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $password = md5($_POST['password']); 
                $email = $_POST['email'];


                $language_id = $_POST['languages'];
                $role_id = $_POST['roles'];
                $permission_id = json_encode($_POST['permission']);


                $query = $this->db->query("UPDATE users SET first_name='$fname',last_name='$lname',email='$email',password='$password' WHERE id = '$userID[1]' ");
                $query->execute();

                $query2 = $this->db->prepare("UPDATE role_users SET role_id='$role_id',permission_id='$permission_id',language_id='$language_id' WHERE user_id = '$userID[1]'");
                $query2->execute();

                echo "Kullanıcı bilgileri güncellendi.";
                
         }

         public function delete(){
              $userID = explode("proje/delete/",$_SERVER['REQUEST_URI']);

              $query = $this->db->query("DELETE FROM users WHERE id = '$userID[1]' ");
              $query->execute();

              $query2 = $this->db->query("DELETE FROM role_users WHERE user_id = '$userID[1]' ");
              $query2->execute();

              echo "Kullanıcı silindi";


         }


         public function newrole(){
              $data = [];
              $this->callView("admin","newrole",$data);
         }

         public function newrolePost(){
              $role_name = $_POST['rname'];
              $role_desc = $_POST['rdescription'];

              $query = $this->db->prepare("INSERT INTO roles (role_name,role_description) VALUES ('$role_name','$role_desc')");
              $query->execute();

              echo "Yeni rol eklendi.";
       }

       public function roleupdate(){
              $roleID = explode("proje/roleupdate/",$_SERVER['REQUEST_URI']);

              $query = $this->db->query("SELECT * FROM roles WHERE id = '$roleID[1]'"); 
              $query->execute();
              $roles = $query->fetch(PDO::FETCH_ASSOC);

              $data['role_id']=$roles['id'];
              $data['role_name']=$roles['role_name'];
              $data['role_description']=$roles['role_description'];


              $this->callView("admin","roleupdate",$data);
       }

       public function roleupdatePost(){
              $roleID = explode("proje/roleupdatePost/",$_SERVER['REQUEST_URI']);

              $role_name = $_POST['rname'];
              $role_desc = $_POST['rdescription'];


              $query = $this->db->query("UPDATE roles SET role_name='$role_name',role_description='$role_desc'  WHERE id = '$roleID[1]' ");
              $query->execute();


              echo "Mevcut rol bilgileri güncellendi";
       }

       public function role_delete(){
              $roleID = explode("proje/role_delete/",$_SERVER['REQUEST_URI']);

              $query = $this->db->query("DELETE FROM roles WHERE id = '$roleID[1]' ");
              $query->execute();

              echo "Rol silindi";
       }

       public function newlanguage(){
              $data = [];
              $this->callView("admin","newlanguage",$data);
       }

       public function newlanguagePost(){
              $language_name = $_POST['language'];

              $query = $this->db->prepare("INSERT INTO languages (name) VALUES ('$language_name')");
              $query->execute();

              echo "Yeni dil eklendi.";
       }

       public function languageupdate(){
              $languageID = explode("proje/languageupdate/",$_SERVER['REQUEST_URI']);

              $query = $this->db->query("SELECT * FROM languages WHERE id = '$languageID[1]'"); 
              $query->execute();
              $languages = $query->fetch(PDO::FETCH_ASSOC);

              $data['language_id']=$languages['id'];
              $data['language_name']=$languages['name'];

              $this->callView("admin","languageupdate",$data);
       }

       public function languageupdatePost(){

              $languageID = explode("proje/languageupdatePost/",$_SERVER['REQUEST_URI']);

              $language_name = $_POST['language'];


              $query = $this->db->query("UPDATE languages SET name='$language_name'  WHERE id = '$languageID[1]' ");
              $query->execute();


              echo "Dil bilgisi güncellendi.";
       }

       public function language_delete(){

              $languageID = explode("proje/language_delete/",$_SERVER['REQUEST_URI']);

              $query = $this->db->query("DELETE FROM languages WHERE id = '$languageID[1]' ");
              $query->execute();

              echo "Dil silindi";


       }

       public function newpermission(){
              $data = [];
              $this->callView("admin","newpermission",$data);
       }

       public function newpermissionPost(){

              //print_r($_POST);
              $permission_name = $_POST['pname'];
              $permission_desc = $_POST['pdescription'];

              $query = $this->db->prepare("INSERT INTO permissions (name, description) VALUES ('$permission_name', '$permission_desc')");
              $query->execute();

              echo "Yeni izin eklendi.";              
       }

       public function permissionupdate(){
          

              $permissionID = explode("proje/permissionupdate/",$_SERVER['REQUEST_URI']);

              $query = $this->db->query("SELECT * FROM permissions WHERE id = '$permissionID[1]'"); 
              $query->execute();
              $permission = $query->fetch(PDO::FETCH_ASSOC);

              $data['permission_id']=$permission['id'];
              $data['permission_name']=$permission['name'];
              $data['permission_description']=$permission['description'];

              $this->callView("admin","permissionupdate",$data);
       }


       public function permissionupdatePost(){

              $permissionID = explode("proje/permissionupdatePost/",$_SERVER['REQUEST_URI']);

              $permission_name = $_POST['pname'];
              $permission_desc = $_POST['pdescription'];


              $query = $this->db->query("UPDATE permissions SET name='$permission_name',description='$permission_desc'  WHERE id = '$permissionID[1]' ");
              $query->execute();


              echo "Mevcut izin bilgileri güncellendi";

       }

       public function permission_delete(){
              $permissionID = explode("proje/permission_delete/",$_SERVER['REQUEST_URI']);

              $query = $this->db->query("DELETE FROM permissions WHERE id = '$permissionID[1]' ");
              $query->execute();

              echo "İzin silindi";
       }

    


}

?>