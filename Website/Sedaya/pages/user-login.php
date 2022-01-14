  <div id="menu-item">
    <!-- book section -->
    <section class="book_section">
      <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="heading_container">
          <h2>User Login </h2>
        </div></div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="form_container">
              <form action="<?=base_url('admin/proses/user.php?proses=login');?>" method="POST">
                <div>
                  <input
                    type="email"
                    class="form-control"
                    name="username"
                    placeholder="Email"
                    required
                  />
                </div>
                <div>
                  <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder="Password"
                    required
                  />
                </div>
                <div class="row"><div class="col-md-8"></div>
                <div class="col-md-3 btn_box">
                  <button type="submit" name="login">Login</button>
                </div>
              </div>
              </form>
              <h5>new member?<a href="<?=base_url('index.php?page=user-register')?>"><i> <u>Register</u></i> </h5></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br /><br />
    <br /><br />
    <!-- end book section -->