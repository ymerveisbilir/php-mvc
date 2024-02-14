
              
                  <h4>Kullanıcı Ayarları</h4><br>
                  <br>
                  <h4>Kullanıcılar</h4>
                  <hr color=" #222222"/>


                  <h2>

                  <div style="text-align: right;padding: 3px 5px;font-size: 9px;">
                  <a href="newuser"><button class="btn btn-success">+ Yeni Kullanıcı Ekle</button></a>
                  </div>

                  <table class="table">
                           <thead class="thead-dark">
                                    <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">First Name</th>
                                             <th scope="col">Last Name</th>
                                             <th scope="col">Email</th>
                                             <th scope="col"></th>
                                             <th scope="col"></th>
                                    </tr>
                           </thead>
                           <tbody>
                                    
                                    <?php 
                                    foreach ($data['user'] as $user) {?>
                                             <tr>
                                             <td></td>
                                             <td><?=$user['first_name']?></td>
                                             <td><?=$user['last_name']?></td>
                                             <td><?=$user['email']?></td>                                             <td>
                                             <a href="userupdate/<?=$user['id']?>">        
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>
                                             </a>
                                             </td>
                                   
                                             <td>
                                             <a href="delete/<?=$user['id']?>">         
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/></svg>
                                             </a>
                                             </td>
                                             </tr>
                                             <?php
                                    }
                                    ?>
                                    
                           </tbody>
                  </table>

                  <hr color=" #222222"/>
                  <br>

                  <h4>Roller</h4>
                  <hr color=" #222222"/>
                  <div style="text-align: right;padding: 3px 5px;font-size: 9px;">
                  <a href="newrole"><button class="btn btn-warning">+ Yeni Rol Ekle</button></a>
                  </div>

                  <table class="table">
                           <thead class="thead-dark">
                                    <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Name</th>
                                             <th scope="col">Description</th>
                                             <th scope="col"></th>
                                             <th scope="col"></th>
                                             <th scope="col"></th>

                                    </tr>
                           </thead>
                           <tbody>
                                    
                                    <?php 
                                    foreach ($data['roles'] as $roles) {?>
                                             <tr>

                                             <td></td>          
                                             <td><?=$roles['role_name']?></td>
                                             <td><?=$roles['role_description']?></td>
                                             <td></td>
                                    
                                             <td>
                                             <a href="roleupdate/<?=$roles['id']?>">        
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>
                                             </a>
                                             </td>
                                   
                                             <td>
                                             <a href="role_delete/<?=$roles['id']?>">         
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/></svg>
                                             </a>
                                             </td>
                                  
                                             </tr>
                                             <?php
                                    }
                                    ?>
                                    
                           </tbody>
                  </table>
                  <hr color=" #222222"/>
                  <br>


                  <h4>Diller</h4>
                  <hr color=" #222222"/>
                  <div style="text-align: right;padding: 3px 5px;font-size: 9px;">
                  <a href="newlanguage"><button class="btn btn-warning">+ Yeni Dil Ekle</button></a>
                  </div>

                  <table class="table">
                           <thead class="thead-dark">
                                    <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Name</th>
                                             <th scope="col"></th>
                                             <th scope="col"></th>
                                             <th scope="col"></th>
                                             <th scope="col"></th>

                                    </tr>
                           </thead>
                           <tbody>
                                    
                                    <?php 
                                    foreach ($data['languages'] as $language) {?>
                                             <tr>

                                             <td></td>          
                                             <td><?=$language['name']?></td>
                                             <td></td>
                                             <td></td>
                                    
                                           
                                             <td>
                                             <a href="languageupdate/<?=$language['id']?>">        
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>
                                             </a>
                                             </td>
                                             <td>
                                             <a href="language_delete/<?=$language['id']?>">         
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/></svg>
                                             </a>
                                             </td>
                                  
                                             </tr>
                                             <?php
                                    }
                                    ?>
                                    
                           </tbody>
                  </table>
                  <hr color=" #222222"/>
                  <br>


                  <h4>İzinler</h4>
                  <hr color=" #222222"/>
                  <div style="text-align: right;padding: 3px 5px;font-size: 9px;">
                  <a href="newpermission"><button class="btn btn-warning">+ Yeni İzin Ekle</button></a>
                  </div>

                  <table class="table">
                           <thead class="thead-dark">
                                    <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Name</th>
                                             <th scope="col">Description</th>
                                             <th scope="col"></th>
                                             <th scope="col"></th>
                                             <th scope="col"></th>

                                    </tr>
                           </thead>
                           <tbody>
                                    
                                    <?php 
                                    foreach ($data['permissions'] as $permission) {?>
                                             <tr>

                                             <td></td>          
                                             <td><?=$permission['name']?></td>
                                             <td><?=$permission['description']?></td>
                                             <td></td>
                                    
                                             <td>
                                             <a href="permissionupdate/<?=$permission['id']?>">        
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>
                                             </a>
                                             </td>
                                   
                                             <td>
                                             <a href="permission_delete/<?=$permission['id']?>">         
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/></svg>
                                             </a>
                                             </td>
                                  
                                             </tr>
                                             <?php
                                    }
                                    ?>
                                    
                           </tbody>
                  </table>
                  <hr color=" #222222"/>
                  <br>

                  <?php include("footerView.php"); ?>