    <?php
    $usr_id = $_GET['usr_id'];
    $show=$syntax->view_kon("mstr_user","usr_id='$usr_id'");
    foreach ($show as $r) {
    ?>
    
    <div id="menu-item">
    <!-- book section -->
    <section class="book_section">
      <div class="container">
        <div class="row">
        <div class="col-md-5"></div>
        <div class="heading_container">
          <h2 >Update Profile</h2>
        </div>
        </div><br><br>
        <div class="row">
          <div class="col-md-12">
            <div class="form_container">
              <form  action="<?=base_url('admin/proses/user.php?proses=update-profile');?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="usr_id" value="<?=$r['usr_id']?>">
              <div class="row"> 
                <div class="col-md-6">
                  <div>
                    <input
                      type="text"
                      class="form-control"
                      name="nama"
                      value="<?=$r['nama']?>"
                      placeholder="Your Name*"
                      required
                    />
                  </div>
                  <div>
                    <select class="form-control" name="jk" id="" required>
                      <option class="form-control" value="L" <?php if ($r['jk']=='L') {
                        echo "selected";
                      }?>>Male</option>
                      <option class="form-control" value="P" <?php if ($r['jk']=='P') {
                        echo "selected";
                      }?>>Female</option>
                    </select>
                  </div>
                  <div>
                    <input
                      type="text"
                      class="form-control"
                      name="tmp_lahir"
                      value="<?=$r['tmp_lahir']?>"
                      placeholder="Place of Birt*" required
                    />
                  </div>
                  <div>
                    <input
                      type="date"
                      class="form-control"
                      name="tgl_lahir"
                      value="<?=$r['tgl_lahir']?>"
                      placeholder="Date of Birt*"required
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div>
                    <input
                      type="text"
                      class="form-control"
                      name="telp"
                      value="<?=$r['telp']?>"
                      placeholder="Telp*"required
                    />
                  </div>
                  <div>
                    <textarea 
                      class="form-control"
                      name="alamat"
                      cols="30" rows="3" placeholder="road:xxxx, distric:xxxx, regency:xxxx, province:xxxx"  required><?=$r['alamat']?></textarea>
                  </div>
                  <div class="">
                    <input
                      type="file"
                      class="form-control col-md-6"
                      name="foto"
                    />
                  </div>
                    <label class="col-md-5 " for=""><i> *kosongi jika tetap</i></label>
                </div>
              </div><br>
                <div class="row">
                  <div class="col-md-8"></div>
                  <div class="col-md-4 btn_box">
                    <a href="<?=base_url('index.php?page=profile')?>" name="update-profile" class="btn-cencel" >Cencel</a>
                    <button type="submit" name="update-profile">Save</button>
                  </div>
                </div><br>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br /><br /><br />
    <?php }?>
    <!-- end book section -->