
                 
         <div class="container">
                           <div class="row justify-content-center">
                                    <div class="col-md-8">
                                             <div class="card">
                                                      <div class="card-header">
                                                              
                                                      </div>

                                                      <div class="card-body">

                                                               <form action="/proje/newrolePost" method="POST">
                                                                        <div class="form-group">
                                                                        <label style="font-weight:bold">Role Adı</label>
                                                                                 <input type="text" name="rname"
                                                                                          class="form-control">
                                                                        </div><br>

                                                                        <div class="form-group">
                                                                        <label style="font-weight:bold">Role Açıklaması</label>
                                                                                 <input type="text" name="rdescription"
                                                                                          class="form-control">
                                                                        </div><br>
                                                                        <button type="submit" class="btn btn-success">Ekle</button>
                                                               </form>


                                                      </div>
                                             </div>
                                    </div>
                           </div>
                  </div>            
                  <?php include("footerView.php"); ?>

