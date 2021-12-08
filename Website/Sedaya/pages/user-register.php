    <!-- book section -->
    <section class="book_section">
      <div class="container">
        <div class="row">
        <div class="col-md-5"></div>
        <div class="heading_container">
          <h2 style="color:white;">User Register</h2>
        </div>
        </div><br><br>
        <div class="row">
          <div class="col-md-12">
            <div class="form_container">
              <form  action="<?=base_url('admin/proses/user.php?proses=register');?>" method="POST">
              <div class="row"> 
                <div class="col-md-6">
                  <div>
                    <input
                      type="text"
                      class="form-control"
                      name="nama"
                      placeholder="Your Name*"
                      required
                    />
                  </div>
                  <div>
                    <select class="form-control" name="jk" id="" required>
                      <option class="form-control" >--Gender*--</option>
                      <option class="form-control" value="L">Male</option>
                      <option class="form-control" value="P">Female</option>
                    </select>
                  </div>
                  <div>
                    <input
                      type="text"
                      class="form-control"
                      name="tmp_lahir"
                      placeholder="Place of Birt*" required
                    />
                  </div>
                  <div>
                    <input
                      type="date"
                      class="form-control"
                      name="tgl_lagir"
                      placeholder="Date of Birt*"required
                    />
                  </div>
                  <div>
                    <input
                      type="text"
                      class="form-control"
                      name="telp"
                      placeholder="Telp*"required
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div>
                    <textarea 
                      class="form-control"
                      name="alamat"
                      cols="30" rows="3" placeholder="road:xxxx, distric:xxxx, regency:xxxx, province:xxxx"  required></textarea>
                  </div>
                  <div>
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      placeholder="Your Email*"required
                    />
                  </div>
                  <div>
                    <input
                      type="text"
                      class="form-control"
                      name="username"
                      placeholder="Username*"required
                    />
                  </div>
                  <div>
                    <input
                      type="password"
                      class="form-control"
                      name="password"
                      placeholder="Password*"required
                    />
                  </div>
                </div>
              </div><br>
                <div class="row">
                  <div class="col-md-9">
                    <h5 style="color:white;">have an account?<a href="<?=base_url('index.php?page=user-login')?>" style="color:white;"><i> Login</i> </h5></a></div>
                  <div class="col-md-3 btn_box">
                    <button type="submit" name="register">Register</button>
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