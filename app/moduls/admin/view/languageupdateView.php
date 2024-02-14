

                  <div class="container">
                           <div class="row justify-content-center">
                                    <div class="col-md-8">
                                             <div class="card">
                                                      <div class="card-header">
                                                              
                                                      </div>

                                                      <div class="card-body">

                                                               <form action="/proje/languageupdatePost/<?=$data['language_id']?>" method="POST">
                                                                        <div class="form-group">
                                                                        <label style="font-weight:bold">Dil :</label>
                                                                                 <input type="text" name="language"
                                                                                          class="form-control" value="<?=$data['language_name']?>">
                                                                        </div><br>
                                                                        <button type="submit" class="btn btn-primary">Kaydet</button>
                                                               </form>


                                                      </div>
                                             </div>
                                    </div>
                           </div>
                  </div>

                  <?php include("footerView.php"); ?>