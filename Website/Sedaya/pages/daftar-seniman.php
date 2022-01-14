    <div id="menu-item">
    <!-- book section -->
    <section class="book_section">
      <div class="container">
        <div class="row">
        <div class="col-md-5"></div>
        <div class="heading_container">
          <h2 style="color:white;">Daftar Seniman</h2>
        </div>
        </div><br><br>
        <div class="row">
          <div class="col-md-12">
            <div class="form_container">
              <form  action="<?=base_url('admin/proses/user.php?proses=daftar-seniman');?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="usr_id" value="<?=$_SESSION['login-user']['usr_id']?>">
              <div class="row"> 
                <div class="col-md-6">
                  <div>
                    <input
                      type="text"
                      class="form-control"
                      name="nama_snm"
                      placeholder="Nama Kelompok Seni"
                      required
                    />
                  </div>
                  <div>
                    <textarea 
                      class="form-control"
                      name="alamat"
                      cols="30" rows="3" placeholder="Alamat: road:xxxx, distric:xxxx, regency:xxxx, province:xxxx"  required></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div>
                    <input
                      type="text"
                      class="form-control"
                      name="telp"
                      placeholder="Telp*"required
                    />
                  </div>
                  <div>
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      placeholder="Email*"required
                    />
                  </div>
                  <div class="">
                    <input
                      type="file"
                      id="foto"
                      class="form-control col-md-6"
                      name="foto"
                    />
                  </div>
                </div>
              </div><br>
                <div class="row">
                  <div class="col-md-5"></div>
                  <div class="col-md-2 btn_box">
                    <button type="submit" name="daftar-seniman">Daftar</button>
                  </div>
                </div><br>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br /><br /><br /><br /><br /><br><br>
    <!-- end book section -->