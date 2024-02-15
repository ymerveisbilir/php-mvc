<?php

class pageController extends mainController
{
         public $db;
         public function __construct()
         {
                  $mainModel = new mainModel();
                  $this->db = $mainModel->db;

         }



         public function detail(){
                  $slug = explode("proje/page/",$_SERVER['REQUEST_URI']);

                  //print_r($slug);
                  //echo $slug[1];

                  //Kontrol böyle bir slug veritabanında var mı ?? 
                  $query = $this->db->query("SELECT COUNT(id) as page FROM pages WHERE slug = '$slug[1]' and status = '0'");
                  $query->execute();
                  $isPage = $query->fetch(PDO::FETCH_ASSOC);


               
                  if($isPage['page'] > 0 ){

                           $query2 = $this->db->query("SELECT * FROM pages WHERE slug = '$slug[1]'");
                           $query2->execute();
                           $page = $query2->fetch(PDO::FETCH_ASSOC);
                           //print_r($page);   => sayfa verileri.


                           $data['name'] = $page['name'];
                           $data['content'] = $page['content'];
                           $data['date'] = date("d.m.Y", strtotime($page['created_at']));
                           $data['image'] = $page['image'];
         
         
                           //Tüm Sayfaların listesi 
                           $pageModel = new pageModel();
                           $data['pages'] = $pageModel->pages();
         
                           $this->callView("page","detail",$data);
                  }
                  else{
                           $slug = explode("proje/page/",$_SERVER['REQUEST_URI']);

                           $data['slug'] = $slug;

                           $this->callView("page","404",$data);
                  }


         }




}

?>