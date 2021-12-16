
    <div id="menu-item">
    <!-- end offer section -->

    <!-- food section -->
    <br>
    <section class="food_section about pt-0 padding">
        <div class="container">
          <div class="heading_container heading_center">
            <h2>Transaksi Berlangsung</h2>
          </div><br><br>
          <div class="row">
            <div class="col-lg-12">
              <table id="example1" class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                <th>NO FAKTUR</th>
                <th>JUDUL</th>
                <th>HARGA</th>
                <th>TRANSPORT</th>
                <th>TANGGAL</th>
                <th>JUMLAH</th>
                <th>STATUS</th>
                <th class="text-center">ACTION</th>
              </tr>
              </thead>
              <tbody>
            <?php
            $usr_id = $_SESSION['login-user']['usr_id'];
            $n=1;
            $show=$syntax->view("transaksi,seni,mstr_user where transaksi.sn_id=seni.sn_id and transaksi.usr_id=mstr_user.usr_id and transaksi.usr_id=$usr_id and transaksi.t_status<=2 ");
            foreach ($show as $r) {
            ?>
                <tr>
                <td>T<?=$r['no_transaksi']?></td>
                <td><?=$r['judul']?></td>
                <td>Rp. <?=number_format($r['harga'],2,".",",")?></td>
                <td>Rp. <?=number_format($r['transport'],2,".",",")?></td>
                <td><?=$r['tgl_kegiatan']?></td>
                <td><?=$r['jml']?> x</td>
                <td><?php
                if ($r['t_status']=='0') {
                  echo '<p class="text-info">Menunggu Konfirmasi</p>';
                }elseif ($r['t_status']=='1') {
                  echo '<p class="text-warning">Menunggu pembayaran</p>';
                }elseif ($r['t_status']=='2') {
                  echo '<p class="text-primary">Proses</p>';
                }elseif ($r['t_status']=='3') {
                  echo '<p class="text-primary">Selesai</p>';
                }elseif ($r['t_status']=='4') {
                  echo '<p class="text-danger">Batal</p>';
                }
                ?></td>
                <td class="text-center">
                  <a href="<?=base_url('index.php?page=detail-seni&&sn_id='.$r['sn_id']);?>"><button class="btn btn-info ">Lihat</button></a>
                  <?php
                  if ($r['t_status']=='1') {
                  echo'<a id="pay-button" href="#"><button class="btn btn-success ">Bayar</button></a>';
                  }
                  if ($r['t_status']!='3' && $r['t_status']!='2') {
                    echo '<a href="'.base_url('seniman/proses/transaksi.php?proses=batal&&no_transaksi='.$r['no_transaksi']).'"><button class="btn btn-danger ">Batal</button></a>';
                  }
                  if ($r['tgl_kegiatan']==date('Y-m-d')) {
                    echo '<a href="'.base_url('seniman/proses/transaksi.php?proses=selesai&&no_transaksi='.$r['no_transaksi']).'"><button class="btn btn-warning ">Selesai</button></a>';
                  }
                  ?>
                </td>
              </tr>
              
            <?php 
                          
            $transaction_details = array(
                'order_id' => $r['no_transaksi'],
                'gross_amount' => 40000, 
              );

              $item_details = array(
                'id' => $r['sn_id'],
                'price' => $r['harga']+$r['transport'],
                'quantity' => 1,
                'name' => $r['judul']
              );


              $item_details = array ($item_details);

              $billing_address = array(
                'first_name'    => $_SESSION['login-user']['nama'],
                'last_name'     => "",
                'address'       => $_SESSION['login-user']['alamat'],
                'city'          => "Jember",
                'postal_code'   => "68112",
                'phone'         => "082214100363",
                'country_code'  => 'IDN'
              );

              $shipping_address = array(
                'first_name'    => $_SESSION['login-user']['nama'],
                'last_name'     => "",
                'address'       => $_SESSION['login-user']['alamat'],
                'city'          => "Jember",
                'postal_code'   => "68112",
                'phone'         => "082214100363",
                'country_code'  => 'IDN'
              );
              $customer_details = array(
                'first_name'    => $_SESSION['login-user']['nama'],
                'last_name'     => "",
                'email'         => $_SESSION['login-user']['email'],
                'phone'         => $_SESSION['login-user']['telp'],
                'billing_address'  => $billing_address,
                'shipping_address' => $shipping_address
              );

              $enable_payments = array("gopay", "indomaret", "alfamart",
                                      // "bca_klikbca", "bca_klikpay",
                                      // "credit_card", "mandiri_clickpay", "cimb_clicks",
                                      //   "bri_epay", "echannel", "permata_va",
                                      //   "bca_va", "bni_va", "other_va"
                                        );

              $transaction = array(
                'enabled_payments' => $enable_payments,
                'transaction_details' => $transaction_details,
                // 'customer_details' => $customer_details,
                'item_details' => $item_details,
              );

              $snapToken = Veritrans_Snap::getSnapToken($transaction);    
          }
            ?>
              </tbody>
            <tfoot>
                <tr>
                <th>NO FAKTUR</th>
                <th>JUDUL</th>
                <th>HARGA</th>
                <th>TRANSPORT</th>
                <th>TANGGAL</th>
                <th>JUMLAH</th>
                <th>STATUS</th>
                <th class="text-center">ACTION</th>
              </tr>
              </tfoot>
            </table>
            </div>
            <p>
                <pre>
                  <div id="result-json"></div>
                </pre>
              </p>
          </div>
          <div class="heading_container heading_center">
            <h2>Transaksi Selesai</h2>
          </div><br><br>
          <div class="row">
            <div class="col-lg-12">
              <table id="example2" class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                <th>NO FAKTUR</th>
                <th>JUDUL</th>
                <th>HARGA</th>
                <th>TRANSPORT</th>
                <th>TANGGAL</th>
                <th>JUMLAH</th>
                <th>STATUS</th>
                <th class="text-center">ACTION</th>
              </tr>
              </thead>
              <tbody>
            <?php
            $usr_id = $_SESSION['login-user']['usr_id'];
            $n=1;
            $show=$syntax->view("transaksi,seni,mstr_user where transaksi.sn_id=seni.sn_id and transaksi.usr_id=mstr_user.usr_id and transaksi.usr_id=$usr_id and transaksi.t_status>2 ");
            foreach ($show as $r) {
            ?>
                <tr>
                <td>T<?=$r['no_transaksi']?></td>
                <td><?=$r['judul']?></td>
                <td>Rp. <?=number_format($r['harga'],2,".",",")?></td>
                <td>Rp. <?=number_format($r['transport'],2,".",",")?></td>
                <td><?=$r['tgl_kegiatan']?></td>
                <td><?=$r['jml']?> x</td>
                <td><?php
                if ($r['t_status']=='0') {
                  echo '<p class="text-info">Menunggu Konfirmasi</p>';
                }elseif ($r['t_status']=='1') {
                  echo '<p class="text-warning">Menunggu pembayaran</p>';
                }elseif ($r['t_status']=='2') {
                  echo '<p class="text-primary">Proses</p>';
                }elseif ($r['t_status']=='3') {
                  echo '<p class="text-primary">Selesai</p>';
                }elseif ($r['t_status']=='4') {
                  echo '<p class="text-danger">Batal</p>';
                }
                ?></td>
                <td class="text-center">
                  <a href="<?=base_url('index.php?page=detail-seni&&sn_id='.$r['sn_id']);?>"><button class="btn btn-info ">Lihat</button></a>
                  <?php
                  if ($r['t_status']=='1') {
                  echo'<a id="pay-button" href="#"><button class="btn btn-success ">Bayar</button></a>';
                  }
                  if ($r['t_status']!='3' && $r['t_status']!='4') {
                    echo '<a href="#"><button class="btn btn-danger ">Batal</button></a>';
                  }
                  ?>
                </td>
              </tr>
              
            <?php    
          }
            ?>
              </tbody>
            <tfoot>
                <tr>
                <th>NO FAKTUR</th>
                <th>JUDUL</th>
                <th>HARGA</th>
                <th>TRANSPORT</th>
                <th>TANGGAL</th>
                <th>JUMLAH</th>
                <th>STATUS</th>
                <th class="text-center">ACTION</th>
              </tr>
              </tfoot>
            </table>
            </div>
            <!-- <p>
                <pre>
                  <div id="result-json"></div>
                </pre>
              </p> -->
          </div>

        </div>
      </section>
    </div>
              
    <!-- end food section -->
