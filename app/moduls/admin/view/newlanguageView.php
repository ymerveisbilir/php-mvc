                  <div class="container">
                           <div class="row justify-content-center">
                                    <div class="col-md-8">
                                             <div class="card">
                                                      <div class="card-header">
                                                              
                                                      </div>

                                                      <div class="card-body">

                                                               <form action="/proje/newlanguagePost" method="POST">
                                                                        <div class="form-group">
                                                                        <label style="font-weight:bold">Dil :</label>
                                                                                 <input type="text" name="language"
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