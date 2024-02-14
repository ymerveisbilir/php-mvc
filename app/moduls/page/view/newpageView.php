<div class="container">
         <div class="row justify-content-center">
                  <div class="col-md-8">
                           <div class="card">
                                    <div class="card-header">

                                    </div>

                                    <div class="card-body">

                                             <form action="/proje/newpagePost" method="POST">
                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Sayfa Adı </label>
                                                               <input type="text" name="name" class="form-control">
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Sayfa URL</label>
                                                               <input type="text" name="slug" class="form-control">
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Meta Title</label>
                                                               <input type="text" name="title" class="form-control">
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Meta Description</label>
                                                               <input type="text" name="description"
                                                                        class="form-control">
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Sayfa İçerik</label>
                                                               <textarea id="content" name="content"></textarea>
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Görsel 1</label>
                                                               <input type="file" name="image"
                                                                        class="form-control">
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Görsel 2</label>
                                                               <input type="file" name="image2"
                                                                        class="form-control">
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">İçerik Dil</label>
                                                               <select class="form-select" name="language_id" aria-label="Disabled select example" required>
                                                                        <?php 
                                                                        foreach($data['languages'] as $language):
                                                                                 ?><option value="<?=$language['id']?>"><?=$language['name']?></option><?php
                                                                        endforeach;         
                                                                        ?>
                                                               </select>
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Yayında Mı ?</label>
                                                               <select class="form-select" name="status"
                                                                        aria-label="Disabled select example" required>
                                                                        <option value="0">Evet</option>
                                                                        <option value="1">Hayır</option>
                                                               </select>
                                                      </div><br>

                                                      <button type="submit" class="btn btn-success">Ekle</button>
                                             </form>


                                    </div>
                           </div>
                  </div>
         </div>
</div>