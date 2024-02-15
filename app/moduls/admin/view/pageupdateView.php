<div class="container">
         <div class="row justify-content-center">
                  <div class="col-md-8">
                           <div class="card">
                                    <div class="card-header">

                                    </div>

                                    <div class="card-body">

                                             <form action="/proje/pageupdatePost/<?=$data['page_id']?>" method="POST"
                                                      enctype="multipart/form-data">
                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Sayfa Adı </label>
                                                               <input type="text" name="name" class="form-control"
                                                                        value="<?= $data['name'] ?>" required>
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Sayfa URL</label>
                                                               <input type="text" name="slug" class="form-control"
                                                                        value="<?= $data['slug'] ?>" required>
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Meta Title</label>
                                                               <input type="text" name="title" class="form-control"
                                                                        value="<?= $data['title'] ?>" required>
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Meta Description</label>
                                                               <input type="text" name="description"
                                                                        class="form-control"
                                                                        value="<?= $data['description'] ?>" required>
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Sayfa İçerik</label>
                                                               <textarea id="content"
                                                                        name="content"><?= $data['content'] ?></textarea>
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Görsel 1</label>
                                                               <input type="file" name="image" class="form-control" >
                                                               <?php
                                                               if($data['image'] != ""){
                                                                        ?><p style="color:red">Mevcut görsel : <a href="/proje/public/images/<?=$data['image']?>" target="_blank"><?=$data['image']?></a></p><?php
                                                               }
                                                               ?>
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Görsel 2</label>
                                                               <input type="file" name="image2" class="form-control">
                                                               <?php
                                                               if($data['image2'] != ""){
                                                                        ?><p style="color:red">Mevcut görsel-2 : <a href="/proje/public/images/<?=$data['image2']?>" target="_blank"><?=$data['image2']?></a></p><?php
                                                               }
                                                               ?>
                                                      </div><br>

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">İçerik Dil</label>
                                                               <select class="form-select" name="language_id"
                                                                        aria-label="Disabled select example" required>
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

                                                      <div class="form-group">
                                                               <label style="font-weight:bold">Yayında Mı ?</label>
                                                               <select class="form-select" name="status"
                                                                        aria-label="Disabled select example" required>
                                                                        <option value="0" <?php if($data['status'] == 0){?> selected <?php }?>>Evet</option>
                                                                        <option value="1" <?php if($data['status'] == 1){?> selected <?php }?>>Hayır</option>
                                                               </select>
                                                      </div><br>

                                                      <button type="submit" class="btn btn-primary">Güncelle</button>
                                             </form>


                                    </div>
                           </div>
                  </div>
         </div>
</div>

<?php include("footerView.php"); ?>