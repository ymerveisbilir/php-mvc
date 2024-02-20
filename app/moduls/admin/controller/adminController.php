<?php


class adminController extends mainController
{

       public $db;
       public function __construct()
       {
              $mainModel = new mainModel();
              $this->db = $mainModel->db;

              //header'a gönderilmesi gereken datalar.
              session_start();

              $query = $this->db->query("SELECT * FROM role_users WHERE user_id='$_SESSION[user_id]'");
              $query->execute();
              $user = $query->fetch(PDO::FETCH_ASSOC);

              $user['permission_id'] = str_replace("\"", "", $user['permission_id']);
              $user['permission_id'] = explode(",", $user['permission_id']);
              $data['permission_id'] = array_map('intval', $user['permission_id']);


              $query2 = $this->db->query("SELECT * FROM roles WHERE id='$user[role_id]'");
              $query2->execute();
              $roles = $query2->fetch(PDO::FETCH_ASSOC);


              $data['role_name'] = $roles['role_name'];
              $data['role_id'] = $roles['id'];

              $this->callView("admin", "header", $data);



       }


       public function user()
       {
              $adminModel = new adminModel();
              $data['user'] = $adminModel->user();
              $data['roles'] = $adminModel->roles();
              $data['languages'] = $adminModel->languages();
              $data['permissions'] = $adminModel->permissions();

              $this->callView("admin", "usersetting", $data);
       }

       public function userupdate()
       {
              //update formuna data gönderme alanı
              $userID = explode("proje/userupdate/", $_SERVER['REQUEST_URI']);


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


              $this->callView("admin", "userupdate", $data);




       }

       public function userupdatePost()
       {

              $userID = explode("proje/userupdatePost/", $_SERVER['REQUEST_URI']);

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

       public function user_delete($user_id)
       {

              $adminModel = new adminModel();

              $adminModel->user_delete($user_id);

              session_start();

              $_SESSION['message'] = 'Kullanıcı başarıyla silindi';

              echo '<script>alert("'.$_SESSION['message'].'"); window.location = "/proje/usersetting";</script>';

              exit();
              
       }


       public function newrole()
       {
              $data = [];
              $this->callView("admin", "newrole", $data);
       }

       public function newrolePost()
       {
              $role_name = $_POST['rname'];
              $role_desc = $_POST['rdescription'];

              $query = $this->db->prepare("INSERT INTO roles (role_name,role_description) VALUES ('$role_name','$role_desc')");
              $query->execute();

              echo "Yeni rol eklendi.";
       }

       public function roleupdate($role_id)
       {
              $adminModel = new adminModel();

              $roles = $adminModel->roleupdate($role_id);

              $data['role_id'] = $roles['id'];
              $data['role_name'] = $roles['role_name'];
              $data['role_description'] = $roles['role_description'];

              $this->callView("admin", "roleupdate", $data);
       }

       public function roleupdatePost()
       {
              $roleID = explode("proje/roleupdatePost/", $_SERVER['REQUEST_URI']);

              $role_name = $_POST['rname'];
              $role_desc = $_POST['rdescription'];


              $query = $this->db->query("UPDATE roles SET role_name='$role_name',role_description='$role_desc'  WHERE id = '$roleID[1]' ");
              $query->execute();


              echo "Mevcut rol bilgileri güncellendi";
       }

       public function role_delete($role_id)
       {

              $adminModel = new adminModel();

              $adminModel->role_delete($role_id);

              session_start();

              $_SESSION['message'] = 'Silme işlemi tamamlanmıştır.';

              echo '<script>alert("'.$_SESSION['message'].'"); window.location = "/proje/usersetting";</script>';

              exit();
              
       }

       public function newlanguage()
       {
              $data = [];
              $this->callView("admin", "newlanguage", $data);
       }

       public function newlanguagePost()
       {
              $language_name = $_POST['language'];

              $query = $this->db->prepare("INSERT INTO languages (name) VALUES ('$language_name')");
              $query->execute();

              echo "Yeni dil eklendi.";
       }

       public function languageupdate($language_id)
       {

              $adminModel = new adminModel();

              $languages = $adminModel->languageupdate($language_id);

              $data['language_id'] = $languages['id'];
              $data['language_name'] = $languages['name'];

              $this->callView("admin", "languageupdate", $data);
       }

       public function languageupdatePost($language_id)
       {

              $language_name = $_POST['language'];

              $query = $this->db->query("UPDATE languages SET name='$language_name'  WHERE id = '$language_id' ");
              $query->execute();

              session_start();

              $_SESSION['message'] = 'Güncelleme işlemi tamamlanmıştır.';

              echo '<script>alert("'.$_SESSION['message'].'"); window.location = "/proje/usersetting";</script>';

              exit();
       }

       public function language_delete($language_id)
       {

              $adminModel = new adminModel();

              $adminModel->language_delete($language_id);

              session_start();

              $_SESSION['message'] = 'Silme işlemi tamamlanmıştır.';

              echo '<script>alert("'.$_SESSION['message'].'"); window.location = "/proje/usersetting";</script>';

              exit();


       }

       public function newpermission()
       {
              $data = [];
              $this->callView("admin", "newpermission", $data);
       }

       public function newpermissionPost()
       {

              //print_r($_POST);
              $permission_name = $_POST['pname'];
              $permission_desc = $_POST['pdescription'];

              $query = $this->db->prepare("INSERT INTO permissions (name, description) VALUES ('$permission_name', '$permission_desc')");
              $query->execute();

              echo "Yeni izin eklendi.";
       }

       public function permissionupdate($permission_id)
       {
              $adminModel = new adminModel();

              $permission = $adminModel->permissionupdate($permission_id);

              $data['permission_id'] = $permission['id'];
              $data['permission_name'] = $permission['name'];
              $data['permission_description'] = $permission['description'];

              $this->callView("admin", "permissionupdate", $data);
       }


       public function permissionupdatePost($permission_id)
       {

              $permission_name = $_POST['pname'];
              $permission_desc = $_POST['pdescription'];


              $query = $this->db->query("UPDATE permissions SET name='$permission_name',description='$permission_desc'  WHERE id = '$permission_id' ");
              $query->execute();


              session_start();

              $_SESSION['message'] = 'Güncelleme işlemi tamamlanmıştır.';

              echo '<script>alert("'.$_SESSION['message'].'"); window.location = "/proje/usersetting";</script>';

              exit();

       }

       public function permission_delete($permission_id)
       {

              $adminModel = new adminModel();

              $adminModel->permission_delete($permission_id);

              session_start();

              $_SESSION['message'] = 'Silme işlemi tamamlanmıştır.';

              echo '<script>alert("'.$_SESSION['message'].'"); window.location = "/proje/usersetting";</script>';

              exit();
       }








}

?>