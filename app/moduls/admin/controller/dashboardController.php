<?php

class dashboardController extends mainController{

         public $db;

         public function __construct(){
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


         public function dashboard(){

                  $query3 = $this->db->query("SELECT COUNT(id) as userCount FROM users ");
                  $query3->execute();
                  $userCount = $query3->fetch(PDO::FETCH_ASSOC);
    
                  $data['userCount'] = $userCount['userCount'];
                  $this->callView("admin", "dashboard", $data);
    
                  //burada çağrılması gereken view dashboard
         }
}

?>