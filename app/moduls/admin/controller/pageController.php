<?php

class pageController extends mainController{

         public $db;
         public function __construct(){

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
                       exit();
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
                } else {
                       $image2 = $page['image2'];
                }
  
                $query = $this->db->query("UPDATE pages SET name='$name',slug='$slug',meta_title='$title',meta_description='$description',content='$content',image='$image',image2='$image2',language_id='$language_id',status='$status' WHERE id = '$pageID[1]'");
                $query->execute();
  
                echo "sayfa güncellendi.";
         }
  
         public function page_delete()
         {
  
                $pageID = explode("proje/page_delete/", $_SERVER['REQUEST_URI']);
  
                $query = $this->db->query("DELETE FROM pages WHERE id = '$pageID[1]' ");
                $query->execute();
         }
         
}

?>