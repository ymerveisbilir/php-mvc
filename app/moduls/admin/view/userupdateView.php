
                  <div class="container">
                           <div class="row justify-content-center">
                                    <div class="col-md-8">
                                             <div class="card">
                                                      <div class="card-header">
                                                               <div class="row">
                                                                        <div class="col-6"></div>
                                                                        <div class="col-6 d-flex justify-content-end"><a
                                                                                          href="/proje/usersetting"
                                                                                          class="btn btn-warning">Listele</a>
                                                                        </div>
                                                               </div>
                                                      </div>

                                                      <div class="card-body">

                                                               <form action="/proje/userupdatePost/<?=$data['id']?>" method="POST">
                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı Adı</label>
                                                                                 <input type="text" name="fname"
                                                                                          class="form-control" value="<?=$data['first_name']?>">
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı Soyadı</label>
                                                                                 <input type="text" name="lname"
                                                                                          class="form-control" value="<?=$data['last_name']?>">
                                                                        </div><br>
                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı E-mail</label>
                                                                                 <input type="email" name="email"
                                                                                          class="form-control" value="<?=$data['email']?>">
                                                                        </div><br>

                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı Şifre</label>
                                                                                 <input type="password" name="password"
                                                                                          class="form-control">
                                                                        </div><br>

                                                                        <div class="alert alert-success" role="alert">
                                                                        <p>Şifre en az 6 en fazla 10 karakterden oluşmalıdır.</p><br>
                                                                        <p>Şifre büyük harf , küçük harf ve rakam içermelidir.</p>
                                                                        </div>  

                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı Rol Seçimi</label>
                                                                                 <select class="form-select" name="roles" aria-label="Disabled select example">
                                                                                    <?php foreach ($data['roles'] as $role): ?>
                                                                                        <?php if ($role['id'] == $data['role_id']): ?>
                                                                                            <option value="<?= $role['id'] ?>" selected>
                                                                                                <?= $role['role_name'] ?>
                                                                                            </option>
                                                                                        <?php else: ?>
                                                                                            <option value="<?= $role['id'] ?>">
                                                                                                <?= $role['role_name'] ?>
                                                                                            </option>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; ?>
                                                                                 </select>
                                                                        </div><br>


                                                                                                   
                                                                        <label style="font-weight:bold">Kullanıcı Yetkileri</label>
                                                                        <div class="form-group" style="display:flex; ">
                                                                        <?php
                                                                      foreach ($data['permissions'] as $permission): ?>
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <?php 
                                                                                    $checked = in_array($permission['id'], $data['permission_id']) ? 'checked' : ''; 

                                                                                ?>
                                                                                <input type="checkbox" name="permission[]" value="<?= $permission['id'] ?>" <?= $checked ?>>
                                                                                <?= $permission['name'] ?>
                                                                            </label>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                        
                                                                    </div>
                                                                 

                                                                        <div class="form-group">
                                                                                 <label style="font-weight:bold">Kullanıcı Dil Seçimi</label>
                                                                                 <select class="form-select" name="languages" aria-label="Disabled select example">
                                                                                 <?php foreach ($data['languages'] as $language): ?>
                                                                                     <?php if ($language['id'] == $data['language_id']): ?>
                                                                                         <option value="<?= $language['id'] ?>" selected>
                                                                                             <?= $language['name'] ?>
                                                                                         </option>
                                                                                     <?php else: ?>
                                                                                         <option value="<?= $language['id'] ?>">
                                                                                             <?= $language['name'] ?>
                                                                                         </option>
                                                                                     <?php endif; ?>
                                                                                 <?php endforeach; ?>
                                                                                 </select>
                                                                        </div><br>


                                                                        <button type="submit"
                                                                                 class="btn btn-primary mt-1">Güncelle</button>
                                                               </form>


                                                      </div>
                                             </div>
                                    </div>
                           </div>
                  </div>

                  <?php include("footerView.php"); ?>