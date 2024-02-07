<?php


class userController extends mainController
{        
         public $db;


         public function __construct(){
                  $mainModel = new mainModel();
                  $this->db = $mainModel->db;

      
                  //deneme
                  $users = new userModel();
                  $data['users']=$users->users();

                  $this->callLayout("menu","user","register",$data);
         }

         public function register()
         {
                 $data = ["Ad" => "Merve"]; //bu data model'den gelicek.
                 return $this->callView("user","register",$data);

                  
         }

         public function registerPost()
         {
                  //$data = $_POST;
                  //print_r($data);

                  // Formdan verileri alıyoruz.
                  $fname = $_POST['fname'];
                  $lname = $_POST['lname'];
                  $password = $_POST['password']; 
                  $email = $_POST['email'];
                  $password_repeat = $_POST['rpassword'];

         


                  $count = $this->db->prepare("SELECT COUNT(id) as quantity FROM users WHERE email = '$email'"); 
                  $count->execute();
                  $user = $count->fetch(PDO::FETCH_ASSOC);
                  
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
                  include __DIR__ . "../../view/login.php";
         }

         public function loginPost(){
                  //$data = $_POST;
                  //print_r($data);

                  $email = $_POST['email'];
                  $password = $_POST['password'];

                  $count = $this->db->prepare("SELECT COUNT(id) as quantity FROM users WHERE email = '$email' and password = '" . md5($password) . "'"); 
                  $count->execute();
                  $user = $count->fetch(PDO::FETCH_ASSOC);

                  if($user['quantity'] > 0){
                           header('Location: http://localhost/proje/dashboard');

                  }


         }

}

?>