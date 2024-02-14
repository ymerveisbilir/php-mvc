<?php

class pageController extends mainController
{

         public function __construct()
         {
                  $mainModel = new mainModel();
                  $this->db = $mainModel->db;

                  //header'a gönderilmesi gereken datalar.
                  session_start();

                  $query = $this->db->query("SELECT * FROM role_users WHERE user_id='$_SESSION[user_id]'");
                  $query->execute();
                  $user = $query->fetch(PDO::FETCH_ASSOC);

                  $query2 = $this->db->query("SELECT * FROM roles WHERE id='$user[role_id]'");
                  $query2->execute();
                  $roles = $query2->fetch(PDO::FETCH_ASSOC);



                  $data['role_name'] = $roles['role_name'];


                  $this->callView("admin", "header", $data);

         }

         public function page(){
                  $data = [];
                  $this->callView("page","page",$data);
                  $this->callView("admin","footer",$data);
         }


         public function newpage(){

                  $pageModel = new pageModel();
                  $data['languages'] =$pageModel->languages();
                  $this->callView("page","newpage",$data);
                  $this->callView("admin","footer",$data);
         }

         public function newpagePost(){
                  
                  //Posttan gelen verileri pages tablosuna kaydedilmelidir.

                  $name = $_POST['name'];
                  $slug = $_POST['slug'];
                  $title = $_POST['title'];
                  $description = $_POST['description'];
                  $content = $_POST['content'];
                  $image = $_POST['image'];
                  $image2 = $_POST['image2'];
                  $language_id = $_POST['language_id'];
                  $status = $_POST['status'];


    
                  $query = $this->db->prepare("INSERT INTO pages (name,slug,meta_title,meta_description,content,image,image2,language_id,status) VALUES ()");
                  $query->execute();
         }







}

?>