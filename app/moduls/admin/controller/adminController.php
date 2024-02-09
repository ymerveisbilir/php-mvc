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

                $user = new adminModel();
                $data['user'] = $user->user();

                $this->callView("admin","usersetting",$data);
         }

         public function userupdate(){

                $userID = explode("proje/userupdate/",$_SERVER['REQUEST_URI']);


                $query = $this->db->query("SELECT * FROM users WHERE id = '$userID[1]'"); 
                $query->execute();
                $user = $query->fetch(PDO::FETCH_ASSOC);

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
                $this->callView("admin","userupdate",$data);



              
         }

         public function userupdatePost(){

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $password = $_POST['password']; 
                $email = $_POST['email'];
                $language_id = $_POST['languages'];
                $role_id = $_POST['roles'];
                // $permission_id = json_encode($_POST['permission']);


                $query = $this->db->query("UPDATE users SET first_name='$fname' , last_name='$lname',email='$email'");
                $query->execute();
                
         }
}

?>