
    <div id="menu-item">
    <!-- end offer section -->

    <!-- food section -->
    <br>
    <section class="food_section about pt-0 padding">
        <div class="container">
            <?php
            $sn_id = $_GET['sn_id'];
            $show=$syntax->view_field("*","seni join mstr_seniman on seni.snm_id = mstr_seniman.snm_id join jenis on seni.jns_id = jenis.jns_id where seni.sn_id='$sn_id'");
            foreach ($show as $r) {
            ?>
          <div class="heading_container heading_center">
            <h2><?=$r['judul']?></h2>
          </div><br><br>
          <div class="row">
            <div class="col-lg-6">
              <div class="text-center">
              <img class="img-fluid img-thumbnails rounded mx-auto align-center" style="height: 350px;" src="admin/public/img/seni/<?=$r['gambar']?>" alt="image">
              </div>
              <br><br>
                    <tr>
                      <td><div class="col-md-1"></div></td>
                      <td><b>Deskripsi: </b></td>
                    </tr><tr>
                      <td><div class="col-md-1"></div></td>
                      <td><?=$r['keterangan']?></td>
                    </tr>
            </div>
            <div class="col-lg-6 ">
              <div class="content ">
                <!-- Headline -->
                <!-- <h3><?=$r['judul']?></h3><br> -->
                <!-- Story -->
                  <table class="table">
                    <tr>
                      <td><b>Oleh </b></td>
                      <td> : <?=$r['nama_snm']?></td>
                    </tr>
                    <tr>
                      <td><b>Kategori</b></td>
                      <td> : <?=$r['kategori']?></td>
                    </tr>
                    <tr>
                      <td><b>Jenis</b></td>
                      <td> : <?=$r['jenis']?></td>
                    </tr>
                    <tr>
                      <td><b>harga</b></td>
                      <td> : Rp. <?=number_format($r['harga'],2,".",",")?><p class="text-danger text-xs">*harga yang tertera belum termasuk transport</p></td>
                    </tr>
                    <!-- <tr>
                      <td><b>jangkauan </b></td>
                      <td> : <?=$r['jangkauan']?></td>
                    </tr> -->
                  </table>
                  <div class="form-container">
                    <form action="<?=base_url('admin/proses/transaksi.php?proses=booking');?>" method="POST">
                    <input type="hidden" name="sn_id" value="<?=$r['sn_id']?>">
                    <input type="hidden" name="harga" value="<?=$r['harga']?>">
                    <input type="hidden" name="usr_id" value="<?=$_SESSION['login-user']['usr_id']?>">
                    <div class="row">
                      <label class="col-md-3" for=""><b>Jumlah tampil</b> </label>:
                        <div class="col-md-3">
                          <input type="number" class="form-control" name="jml" min="1" value="1"  required/>
                        </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-3" for=""><b>Tanggal</b> </label>:
                        <div class="col-md-5">
                          <input type="date" class="form-control" name="tgl" required />
                        </div>
                    </div><br><br>
                    <div class="row">
                      <div class="col-md-5"></div>
                      <div class=" user_option">
                        <button type="submit" name="booking" class="order_online">Booking</button>
                      </div>
                    </div>
                    </form>
                  </div>
                    <br>
              </div>
            </div>
            
              <!-- <p>
                <pre>
                  <div id="result-json"></div>
                </pre>
              </p> -->
          </div>
            <?php }
            ?>
        </div>
      </section>
    </div>
              
    <!-- end food section -->
