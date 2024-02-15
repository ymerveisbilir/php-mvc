<!DOCTYPE html>
<html lang="en">

<head>
         <meta charset="UTF-8">
         <title>Admin Panel</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
         <style>
                  /* Genel stiller */
                  * {
                           box-sizing: border-box;
                  }

                  .form-container {
                           background-color: #FFD;
                           display: flex;
                           flex-direction: column;
                           align-items: center;
                           justify-content: center;
                           width: 80%;
                           /* veya istediğiniz genişlik */
                           margin: 0 auto;
                  }

                  label {
                           display: block;
                           margin-bottom: 8px;
                  }

                  input {
                           width: 100%;
                           padding: 10px;
                           margin-bottom: 16px;
                           box-sizing: border-box;
                           border: 1px solid #ccc;
                           border-radius: 4px;
                  }



                  button:hover {
                           background-color: #45a049;
                  }

                  body {
                           margin: 0;
                           font-family: Arial, sans-serif;
                           background-color: #f2f2f2;
                  }

                  /* Başlık stil */

                  .header {
                           background-color: #0073aa;
                           color: white;
                           padding: 20px;
                           text-align: center;
                  }

                  /* Mobil için menü butonu stil */

                  .navbar-toggler-icon {
                           background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
                  }

                  /* Kenar çubuğu stilleri */

                  .sidebar {
                           width: 100%;
                           max-width: 250px;
                           background-color: #222222;
                           color: white;
                           padding: 20px;
                           position: fixed;
                           z-index: 1;
                           height: 100%;
                           overflow: auto;
                  }

                  .sidebar a {
                           display: block;
                           color: white;
                           padding: 16px;
                           text-decoration: none;
                  }

                  .sidebar a.active {
                           background-color: #4CAF50;
                           color: white;
                  }

                  .sidebar a:hover:not(.active) {
                           background-color: #555;
                           color: white;
                  }

                  /* Ana içerik stilleri */

                  .main-content {
                           margin-left: 250px;
                           padding: 20px;
                  }

                  /* Ekran boyutu 768 piksel veya daha düşük olduğunda stil değişiklikleri */

                  @media screen and (max-width: 767px) {
                           .sidebar {
                                    width: 100%;
                                    height: auto;
                                    position: relative;
                           }

                           .sidebar a {
                                    float: left;
                           }

                           .main-content {
                                    margin-left: 0;
                           }
                  }
                  

         </style>
</head>

<body>

         <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                  <!-- Hamburger menü butonu -->
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                           <span class="navbar-toggler-icon"></span>
                  </button>

                  <!-- Menü elementleri -->
                  <div class="collapse navbar-collapse" id="collapsibleNavbar">
                           <ul class="navbar-nav">
                                    <li class="nav-item active">
                                             <a class="nav-link" href="#">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                             <a class="nav-link" href="#">Posts</a>
                                    </li>
                                    <li class="nav-item">
                                             <a class="nav-link" href="#">Media</a>
                                    </li>
                                    <li class="nav-item">
                                             <a class="nav-link" href="#">Pages</a>
                                    </li>
                                    <li class="nav-item">
                                             <a class="nav-link" href="#">Comments</a>
                                    </li>
                           </ul>
                  </div>
         </nav>

         <!-- Kenar çubuğu -->
         <div class="sidebar d-none d-md-block">
                  <a href="dashboard">Dashboard</a>
                  <a class="active" href="usersetting">Kullanıcı Ayarları</a>
                  <a  href="/proje/pageList">Sayfalar</a>
         </div>

         <!-- Ana içerik -->
         <div class="main-content">
                  <div class="container">
                           <div class="row justify-content-center">
                                    <div class="col-md-8">
                                             <div class="card">
                                                      <div class="card-header">
                                                               <div class="row">
                                                                        <div class="col-6"></div>
                                                                        <div class="col-6 d-flex justify-content-end"><a
                                                                                          href="usersetting"
                                                                                          class="btn btn-warning">Listele</a>
                                                                        </div>
                                                               </div>
                                                      </div>

                                                      <div class="card-body">

                                                               <form action="/proje/newuserPost" method="POST" onsubmit="return validateForm()">
                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı Adı</label>
                                                                                 <input type="text" name="fname"
                                                                                          class="form-control" required>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı Soyadı</label>
                                                                                 <input type="text" name="lname"
                                                                                          class="form-control" required>
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı E-mail</label>
                                                                                 <input type="email" name="email"
                                                                                          class="form-control" required>
                                                                        </div><br>

                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı Şifre</label>
                                                                                 <input type="password" name="password"
                                                                                          class="form-control" required>
                                                                        </div><br>

                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı Şifre Tekrar</label>
                                                                                 <input type="password" name="rpassword"
                                                                                          class="form-control" required>
                                                                        </div><br>
                                                                        <div class="alert alert-warning" role="alert">
                                                                        <p>Şifre en az 6 en fazla 10 karakterden oluşmalıdır.</p><br>
                                                                        <p>Şifre büyük harf , küçük harf ve rakam içermelidir.</p>
                                                                        </div>  
                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı Rol Seçimi</label>
                                                                                 <select class="form-select"
                                                                                          name="roles"
                                                                                          aria-label="Disabled select example" required>
                                                                                          <?php
                                                                                          foreach ($data['roles'] as $role): ?>
                                                                                                   <option
                                                                                                            value="<?= $role['id'] ?>">
                                                                                                            <?= $role['role_name'] ?>
                                                                                                   </option>
                                                                                          <?php endforeach; ?>
                                                                                 </select>
                                                                        </div><br>
                                                                                                   
                                                                        <label style="font-weight:bold">Kullanıcı Yetkileri</label>
                                                                        <div class="form-group" style="display:flex; ">
                                                                        <?php
                                                                        foreach($data['permissions'] as $permission): ?>
                                                                         <div class="checkbox">
                                                                             <label>
                                                                                 <input type="checkbox" name="permission[]" value="<?=$permission['id']?>" >
                                                                                 <?=$permission['name']?>
                                                                             </label>
                                                                         </div>
                                                                       <?php endforeach;
                                                                        ?>
                                                                     
                                                                    

                    
                                                                        </div>
                                                                 

                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold"        >Kullanıcı Dil Seçimi</label>
                                                                                 <select class="form-select"
                                                                                          name="languages"
                                                                                          aria-label="Disabled select example" required>
                                                                                          <?php
                                                                                          foreach ($data['languages'] as $lang): ?>
                                                                                                   <option
                                                                                                            value="<?= $lang['id'] ?>">
                                                                                                            <?= $lang['name'] ?>
                                                                                                   </option>
                                                                                          <?php endforeach; ?>
                                                                                 </select>
                                                                        </div><br>


                                                                        <button type="submit"
                                                                                 class="btn btn-success mt-1">Ekle</button>
                                                               </form>


                                                      </div>
                                             </div>
                                    </div>
                           </div>
                  </div>

         </div>

</body>
<script>
    function validateForm() {
        var checkboxes = document.getElementsByName('permission[]');
        var isChecked = false;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("En az bir izin seçmelisiniz.");
            return false;
        }
        return true;
    }
</script>
</html>

