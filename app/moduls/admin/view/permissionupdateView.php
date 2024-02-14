

                  <div class="container">
                           <div class="row justify-content-center">
                                    <div class="col-md-8">
                                             <div class="card">
                                                      <div class="card-header">
                                                              
                                                      </div>

                                                      <div class="card-body">

                                                               <form action="/proje/permissionupdatePost/<?=$data['permission_id']?>" method="POST">
                                                                        <div class="form-group">
                                                                        <label style="font-weight:bold">İzin Adı</label>
                                                                                 <input type="text" name="pname"
                                                                                          class="form-control" value="<?=$data['permission_name']?>">
                                                                        </div><br>

                                                                        <div class="form-group">
                                                                        <label style="font-weight:bold">İzin Açıklaması</label>
                                                                                 <input type="text" name="pdescription"
                                                                                          class="form-control"value="<?=$data['permission_description']?>">
                                                                        </div><br>
                                                                        <button type="submit" class="btn btn-primary">Güncelle</button>
                                                               </form>


                                                      </div>
                                             </div>
                                    </div>
                           </div>
                  </div>
                  <?php include("footerView.php"); ?>