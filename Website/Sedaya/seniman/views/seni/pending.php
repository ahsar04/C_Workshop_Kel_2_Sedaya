<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Post</a></li>
              <li class="breadcrumb-item active">Pending</li>
            </ol>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Postingan baru</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <?php
                  $show=$syntax->view_field("seni.sn_id, mstr_user.nama, mstr_user.alamat, seni.judul, seni.gambar, seni.kategori, jenis.jenis, seni.keterangan, seni.jangkauan, seni.harga, seni.status","seni join mstr_user on seni.usr_id = mstr_user.usr_id join jenis on seni.jns_id = jenis.jns_id where seni.status=0 order by sn_id desc");
                  $n=1;
                  foreach ($show as $r) {
                    $sn_id = $r['sn_id'];
                    $nama = $r['nama'];
                    $alamat = $r['alamat'];
                    $judul = $r['judul'];
                    $gambar = $r['gambar'];
                    $kategori = $r['kategori'];
                    $jenis = $r['jenis'];
                    $keterangan = $r['keterangan'];
                    $jangkauan = $r['jangkauan'];
                    $harga = $r['harga'];
                    $status = $r['status'];
                  ?>
                  <div class="col-md-4 col-6">
                    <div class="info-box position-relative p-3" >
                      <!-- <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-success">
                          <?=$jenis?>
                        </div>
                      </div> -->
                      <div class="row">
                        <div class="col-md-6">
                          <img src="<?=base_url('admin/public/img/seni/'.$gambar)?>" alt="" class="img-fluid img-thumbnail" style="max-height: 250px; max-width: 100%; display: block;"  srcset="">
                        </div>
                        <div class="col-md-6">
                          <h3><?=$judul?></h3>
                          <?=substr($keterangan,0,100)?>..
                          <!-- <b>Jenis :</b> <?=$jenis?><br>
                          <b>Harga :</b> Rp. <?=number_format($harga,2,".",",")?><br><br> -->
                          <br><br>
                          <div class="row">
                          <div class="col-md-6"></div>
                          <div class="col-md-6"><a class=" btn btn-secondary  btn-block" href="#" data-toggle="modal" data-target="#modal-lg" onclick="tampildata('<?=$sn_id?>','<?=$nama?>','<?=$alamat?>','<?=$judul?>','<?=base_url('admin/public/img/seni/'.$gambar)?>','<?=$kategori?>',
                          '<?=$jenis?>','<?=$keterangan?>','<?=$jangkauan?>','<?=number_format($harga,2,".",",")?>','<?=$status?>')">Detail
                          </a></div></div>
                        </div>
                      </div>
                      <!-- <b>Deskripsi :</b> <br>
                      <?=substr($keterangan,0,100)?>.. -->
                    </div>
                  </div>
                  <?php
                  if ($n % 3 ==0) {
                    echo'</div><div class="row">';
                  }
                  $n++;}
                  ?>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content bg-info">
                <div class="modal-header">
                  <h4 class="modal-title">Detail</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table>
                    <tr >
                      <td rowspan="7"><img src="<?=base_url('admin/public/img/seni/default.png')?>" id="foto" width="300px" class="img-fluid" height="100px" ></td>
                      <td rowspan="7"> <div class="col-md-1"></div></td>
                      <td rowspan="7"> <div class="col-md-1"></div></td>
                    </tr>
                    <tr>
                      <td><b>Oleh </b></td>
                      <td> : <span id="nama"></span></td>
                    </tr>
                    <tr>
                      <td><b>Judul </b></td>
                      <td> : <span id="judul"></span></td>
                    </tr>
                    <tr>
                      <td><b>Kategori</b></td>
                      <td> : <span id="kategori"></span></td>
                    </tr>
                    <tr>
                      <td><b>Jenis</b></td>
                      <td> : <span id="jenis"></span></td>
                    </tr>
                    <tr>
                      <td><b>harga </b></td>
                      <td> : Rp. <span id="harga"></span></td>
                    </tr>
                    <tr>
                      <td><b>jangkauan </b></td>
                      <td> : <span id="jangkauan"></span></td>
                    </tr>
                  </table>
                    <br>
                  <table>
                    <tr>
                      <td><div class="col-md-1"></div></td>
                      <td><b>Deskripsi: </b></td>
                    </tr>
                    <tr>
                      <td><div class="col-md-1"></div></td>
                      <td><span id="keterangan"></span></td>
                    </tr>
                    <tr>
                      <td><div class="col-md-1"></div></td>
                      <td><b>Alamat: </b></td>
                    </tr>
                    <tr>
                      <td><div class="col-md-1"></div></td>
                      <td><span id="alamat"></span></td>
                    </tr>
                  </table>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                  <form action="<?=base_url('admin/proses/seni.php?proses=konfirmasi');?>" method="POST">
                  <input type="hidden" name="sn_id" id="sn_id" value="sn_id">
                  <input type="submit" class="btn btn-danger" name="dec" value="Decline">
                  <input type="submit" class="btn btn-success" name="acc" value="Accept">
                  </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <script>
      function tampildata(sn_id,nama,alamat,judul,gambar,kategori,jenis,keterangan,jangkauan,harga,status) {
      $('#sn_id').attr('value', sn_id);
      $('#nama').html(nama);
      $('#alamat').html(alamat);
      $('#judul').html(judul);
      $('#kategori').html(kategori);
      $('#jenis').html(jenis);
      $('#foto').attr('src', gambar);
      $('#keterangan').html(keterangan);
      $('#jangkauan').html(jangkauan);
      $('#harga').html(harga);
      $('#status').html(status);
      }
    </script>