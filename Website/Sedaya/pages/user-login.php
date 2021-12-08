    <!-- book section -->
    <section class="book_section">
      <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="heading_container">
          <h2 style="color:white;">User Login </h2>
        </div></div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="form_container">
              <form action="<?=base_url('admin/proses/user.php?proses=login');?>" method="POST">
                <div>
                  <input
                    type="text"
                    class="form-control"
                    name="username"
                    placeholder="Username"
                  />
                </div>
                <div>
                  <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder="Password"
                  />
                </div>
                <div class="btn_box">
                  <button type="submit" name="login">Login</button>
                </div>
              </form><br>
              <h5 style="color:white;">new member?<a href="<?=base_url('index.php?page=user-register')?>" style="color:white;"><i> Register</i> </h5></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br /><br /><br /><br /><br /><br><br>
    <!-- end book section -->