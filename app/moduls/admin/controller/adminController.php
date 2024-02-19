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

              $user['permission_id'] = str_replace("\"","",$user['permission_id']);
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

       public function delete($user_id)
       {

              //$userID = explode("proje/delete/", $_SERVER['REQUEST_URI']);

              //buradaki işlemleri model'de yaptır.

            // echo "geldi mi";

              $usersettingModel = new usersettingModel();
              
              $usersettingModel->user_delete($user_id);

              echo "Kullanıcı silindi";


              /*
              $query = $this->db->query("DELETE FROM users WHERE id = '$user_id' ");
              $query->execute();

              $query2 = $this->db->query("DELETE FROM role_users WHERE user_id = '$user_id' ");
              $query2->execute();

              */


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

       public function roleupdate()
       {
              $roleID = explode("proje/roleupdate/", $_SERVER['REQUEST_URI']);

              $query = $this->db->query("SELECT * FROM roles WHERE id = '$roleID[1]'");
              $query->execute();
              $roles = $query->fetch(PDO::FETCH_ASSOC);

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

       public function role_delete()
       {
              $roleID = explode("proje/role_delete/", $_SERVER['REQUEST_URI']);

              $query = $this->db->query("DELETE FROM roles WHERE id = '$roleID[1]' ");
              $query->execute();

              echo "Rol silindi";
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

       public function languageupdate()
       {
              $languageID = explode("proje/languageupdate/", $_SERVER['REQUEST_URI']);

              $query = $this->db->query("SELECT * FROM languages WHERE id = '$languageID[1]'");
              $query->execute();
              $languages = $query->fetch(PDO::FETCH_ASSOC);

              $data['language_id'] = $languages['id'];
              $data['language_name'] = $languages['name'];

              $this->callView("admin", "languageupdate", $data);
       }

       public function languageupdatePost()
       {

              $languageID = explode("proje/languageupdatePost/", $_SERVER['REQUEST_URI']);

              $language_name = $_POST['language'];


              $query = $this->db->query("UPDATE languages SET name='$language_name'  WHERE id = '$languageID[1]' ");
              $query->execute();


              echo "Dil bilgisi güncellendi.";
       }

       public function language_delete()
       {

              $languageID = explode("proje/language_delete/", $_SERVER['REQUEST_URI']);

              $query = $this->db->query("DELETE FROM languages WHERE id = '$languageID[1]' ");
              $query->execute();

              echo "Dil silindi";


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

       public function permissionupdate()
       {


              $permissionID = explode("proje/permissionupdate/", $_SERVER['REQUEST_URI']);

              $query = $this->db->query("SELECT * FROM permissions WHERE id = '$permissionID[1]'");
              $query->execute();
              $permission = $query->fetch(PDO::FETCH_ASSOC);

              $data['permission_id'] = $permission['id'];
              $data['permission_name'] = $permission['name'];
              $data['permission_description'] = $permission['description'];

              $this->callView("admin", "permissionupdate", $data);
       }


       public function permissionupdatePost()
       {

              $permissionID = explode("proje/permissionupdatePost/", $_SERVER['REQUEST_URI']);

              $permission_name = $_POST['pname'];
              $permission_desc = $_POST['pdescription'];


              $query = $this->db->query("UPDATE permissions SET name='$permission_name',description='$permission_desc'  WHERE id = '$permissionID[1]' ");
              $query->execute();


              echo "Mevcut izin bilgileri güncellendi";

       }

       public function permission_delete()
       {
              $permissionID = explode("proje/permission_delete/", $_SERVER['REQUEST_URI']);

              $query = $this->db->query("DELETE FROM permissions WHERE id = '$permissionID[1]' ");
              $query->execute();

              echo "İzin silindi";
       }





       public function pageList()
       {
              $adminModel = new adminModel();
              $data['pages'] = $adminModel->pages();
              $this->callView("admin", "page", $data);
              $this->callView("admin", "footer", $data);
       }
       public function newpage()
       {

              $adminModel = new adminModel();
              $data['languages'] = $adminModel->languages();
              $this->callView("admin", "newpage", $data);
              $this->callView("admin", "footer", $data);
       }



       public function slugControl($slug)
       {
              // Boşlukları tire ile değiştir
              $slug = str_replace(' ', '-', $slug);

              // Özel karakterleri temizle
              $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);

              // Küçük harfe dönüştür
              $slug = strtolower($slug);

              // Veritabanında aynı slug ile kaydedilmiş sayfa olmamalıdır.
              $query = $this->db->prepare("SELECT COUNT(id) as page FROM pages WHERE slug = '$slug'");
              $query->execute();
              $page = $query->fetch(PDO::FETCH_ASSOC);

              // Eğer aynı slug varsa uyarı ver.
              if ($page['page'] > 0) {
                     echo "Girmiş olduğunuz url ile mevcut sayfa bulunmaktadır.";
              }

              return $slug;
       }


       public function newpagePost()
       {

              $name = $_POST['name'];
              $slug = $this->slugControl($_POST['slug']);
              $title = $_POST['title'];
              $description = $_POST['description'];
              $content = $_POST['content'];
              $image = $_POST['image'];
              $image2 = $_POST['image2'];
              $language_id = $_POST['language_id'];
              $status = $_POST['status'];


              //image
              $image = "";
              $image = $_FILES["image"]["name"];
              $image_tmp = $_FILES["image"]["tmp_name"];

              $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/proje/public/images/' . basename($image);
              move_uploaded_file($image_tmp, $uploadPath);


              //image2
              $image2 = "";
              $image2 = $_FILES["image2"]["name"];
              $image2_tmp = $_FILES["image2"]["tmp_name"];

              $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/proje/public/images/' . basename($image2);
              move_uploaded_file($image2_tmp, $uploadPath);



              $query = $this->db->prepare("INSERT INTO pages (name,slug,meta_title,meta_description,content,image,image2,language_id,status) VALUES ('$name','$slug','$title','$description','$content','$image','$image2','$language_id','$status')");
              $query->execute();


              echo "Sayfa oluşturuldu.";
       }

       public function pageupdate()
       {
              $pageID = explode("proje/pageupdate/", $_SERVER['REQUEST_URI']);

              $query = $this->db->prepare("SELECT * FROM pages WHERE id = '$pageID[1]'");
              $query->execute();
              $page = $query->fetch(PDO::FETCH_ASSOC);

              $data['page_id'] = $page['id'];
              $data['name'] = $page['name'];
              $data['slug'] = $page['slug'];
              $data['title'] = $page['meta_title'];
              $data['description'] = $page['meta_description'];
              $data['content'] = $page['content'];
              $data['image'] = $page['image'];
              $data['image2'] = $page['image2'];
              $data['language_id'] = $page['language_id'];
              $data['status'] = $page['status'];

              $adminModel = new adminModel();
              $data['languages'] = $adminModel->languages();

              $this->callView("admin", "pageupdate", $data);

       }

       

       public function pageupdatePost()
       {

              $pageID = explode("proje/pageupdatePost/", $_SERVER['REQUEST_URI']);

              //formdan gelen dataları UPDATE ediyoruz.
              $name = $_POST['name'];
              $slug = $_POST['slug'];
              $title = $_POST['title'];
              $description = $_POST['description'];
              $content = $_POST['content'];
              $language_id = $_POST['language_id'];
              $status = $_POST['status'];


              $query = $this->db->prepare("SELECT image,image2 FROM pages WHERE id = '$pageID[1]'");
              $query->execute();
              $page = $query->fetch(PDO::FETCH_ASSOC);

             
              if (!empty($_FILES['image']['name'])) {
                     //image
                     $image = $_FILES["image"]["name"];
                     $image_tmp = $_FILES["image"]["tmp_name"];
                     $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/proje/public/images/' . basename($image);
                     move_uploaded_file($image_tmp, $uploadPath);
              } else {
                     $image = $page['image'];
              }


              if (!empty($_FILES['image2']['name'])) {
                     //image2
                     $image2 = "";
                     $image2 = $_FILES["image2"]["name"];
                     $image2_tmp = $_FILES["image2"]["tmp_name"];

                     $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/proje/public/images/' . basename($image2);
                     move_uploaded_file($image2_tmp, $uploadPath);
              }else{
                     $image2 = $page['image2'];
              }

              $query = $this->db->query("UPDATE pages SET name='$name',slug='$slug',meta_title='$title',meta_description='$description',content='$content',image='$image',image2='$image2',language_id='$language_id',status='$status' WHERE id = '$pageID[1]'");
              $query->execute();

              echo "sayfa güncellendi.";
       }

       public function page_delete(){

              $pageID = explode("proje/page_delete/", $_SERVER['REQUEST_URI']);

              $query = $this->db->query("DELETE FROM pages WHERE id = '$pageID[1]' ");
              $query->execute();
       }


}

?>