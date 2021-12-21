
    <div id="menu-item">
    <!-- end offer section -->

    <!-- food section -->
    <br>
    <section class="food_section about pt-0 padding">
        <div class="container">
            <?php
            $usr_id = $_SESSION['login-user']['usr_id'];
            $show=$syntax->view_kon("mstr_user","usr_id='$usr_id'");
            $r = $show->fetch_array();
            ?>
          <div class="heading_container heading_center">
            <h2>Profile</h2>
          </div><br><br>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-lg-6">
              <div class="text-center">
              <img class="img-fluid img-thumbnails rounded mx-auto align-center" style="height: 100px;" src="admin/public/img/user/<?=$r['foto']?>" alt="image">
              </div>
              <br>
              <div class="content ">
                <!-- Headline -->
                <!-- <h3><?=$r['judul']?></h3><br> -->
                <!-- Story -->
                  <table class="table">
                    <tr>
                      <td><b>Nama </b></td>
                      <td> : <?=$r['nama']?></td>
                    </tr>
                    <tr>
                      <td><b>Jenis Kelamin</b></td>
                      <td> : <?=$r['jk']?></td>
                    </tr>
                    <tr>
                      <td><b>TTL</b></td>
                      <td> : <?=$r['tmp_lahir']?>, <?=$r['tgl_lahir']?></td>
                    </tr>
                    <tr>
                      <td><b>Email </b></td>
                      <td> : <?=$r['email']?></td>
                    </tr>
                    <tr>
                      <td><b>Alamat </b></td>
                      <td> : <?=$r['alamat']?></td>
                    </tr>
                    <tr>
                      <td><b>Status </b></td>
                      <td> : <?php
                      if ($r['status']<='1') {
                        echo'Penikmat seni || <a class="order_online" href="'.base_url('index.php?page=daftar-seniman').'">Daftar Seniman <i class="fa fa-arrow-circle-right"></i> </a>';
                      }else{
                        echo '<a class="order_online" href="'.base_url('seniman').'">Seniman <i class="fa fa-arrow-circle-right"></i> </a>';
                      }
                      ?></td>
                    </tr>
                  </table>
                    <br>
              </div>
              <div class="user_option">
                <a class="order_online" href="<?=base_url('index.php?page=update-profile&&usr_id='.$r['usr_id'])?>"><i class="fa fa-pencil"></i> Edit </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
              
    <!-- end food section -->
