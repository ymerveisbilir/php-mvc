<?php


class userController extends mainController
{        
         public $db;


         public function __construct(){
                  $mainModel = new mainModel();
                  $this->db = $mainModel->db;
         }

         public function newuser()
         {


                  $userModel = new userModel();
                  $data['roles'] = $userModel->roles();
                  $data['languages'] = $userModel->languages();
                  $data['permissions'] = $userModel->permissions();
                  $this->callView("user","newuser",$data);

                  
         }

         public function newuserPost()
         {
                  //$data = $_POST;
                  //print_r($data);

                  // Formdan verileri alıyoruz.
                  $fname = $_POST['fname'];
                  $lname = $_POST['lname'];
                  $password = $_POST['password']; 
                  $email = $_POST['email'];
                  $password_repeat = $_POST['rpassword'];


                  $language_id = $_POST['languages'];
                  $role_id = $_POST['roles'];
                  $permission_id = json_encode($_POST['permission']);

                  
                  

                  $query = $this->db->prepare("SELECT COUNT(id) as quantity FROM users WHERE email = '$email'"); 
                  $query->execute();
                  $user = $query->fetch(PDO::FETCH_ASSOC);
                  
                  if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fname) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lname)) {
                           echo "Ad veya soyad özel karakter içeremez.";
                  }elseif(strlen($fname) > 50 || strlen($lname) > 50){
                           echo "Ad veya soyad 50 karakterden uzun olamaz.";
                  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                           echo "Geçersiz e-posta adresi.";
                  }elseif($user["quantity"] > 0){
                           echo "Bu email adresi ile kayıtlı hesap bulunmaktadır.";
                  }elseif($password != $password_repeat){
                           echo "Parolalar uyuşmuyor. Lütfen aynı şifreyi girin.";
                  }else{
                           //Şifre en az 6 en fazla 10 karakterden oluşmalıdır.
                           //Şifre büyük harf , küçük harf ve rakam içermelidir.

                           if(strlen($password) >= 6 and strlen($password) <= 10) {
                                    if(preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password)) {
                                        if(preg_match('/[0-9]/', $password)) {
                                            //echo "Şifre geçerlidir.";
                                            $query = $this->db->prepare("INSERT INTO users (first_name, last_name, password, email) VALUES ('$fname', '$lname','" . md5($password) . "', '$email')");
                                            $query->execute();

                                            //kaydolunan kullanıcı id ile role_users tablosuna kayıt oluşturulmalı. (role_id , language_id ve permission_id)
                                            $userResult = $this->db->query("SELECT * FROM users WHERE email = '$email'");
                                            $user = $userResult->fetch(); 

                                            $query2 = $this->db->prepare("INSERT INTO role_users (user_id, role_id, permission_id,language_id) VALUES ('$user[id]', '$role_id','$permission_id' ,'$language_id')");
                                            $query2->execute();
                 
                                            echo "Üyelik Oluşturuldu.";
                                        } else {
                                            echo "Şifre bir rakam içermelidir.";
                                        }
                                    } else {
                                        echo "Şifre en az bir küçük ve bir büyük harf içermelidir.";
                                    }
                                } else {
                                    echo "Şifre en az 6 en fazla 10 karakter olmalıdır.";
                                }
                  }    
         }

         public function login(){
                  $data=[];
                  $this->callView("user","login",$data);
         }

         public function loginPost(){
                  //$data = $_POST;
                  //print_r($data);

                  $email = $_POST['email'];
                  $password = $_POST['password'];

                  $query = $this->db->prepare("SELECT COUNT(id) as quantity,first_name,id,last_name,email FROM users WHERE email = '$email' and password = '" . md5($password) . "'"); 
                  $query->execute();
                  $user = $query->fetch(PDO::FETCH_ASSOC);


                  if($user['quantity'] > 0){
                           session_start();
                          
                            $_SESSION['user_id'] = $user['id'];
                            $_SESSION['fname'] = $user['first_name'];
                            $_SESSION['lname'] = $user['last_name'];
                            $_SESSION['email'] = $user['email'];
                         

/*
                           echo $_SESSION['user_id']."<br>";
                           echo $_SESSION['fname']."<br>";
                           echo $_SESSION['lname']."<br>";
                           echo $_SESSION['email']."<br>";
                           die();
*/

                           header("Location: http://localhost/proje/dashboard");
                  }


         }

}

?>