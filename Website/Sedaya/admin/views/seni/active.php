<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Post</a></li>
              <li class="breadcrumb-item active">Active</li>
            </ol>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <!-- /.card-header -->
            <div class="card">
              <div class="card-header">
            <h1>Data Postingan</h1>
                <!-- <a href="<?=base_url("admin/index.php?page=admin/insert");?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New</button></a></br> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>JUDUL</th>
                    <th>JENIS</th>
                    <th>KETERANGAN</th>
                    <th>STATUS</th>
                    <th class="text-center"><i class="fa fa-cogs aligh-center"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $show=$syntax->view_field("seni.sn_id, mstr_seniman.nama_snm, mstr_seniman.alamat, seni.judul, seni.gambar, seni.kategori, jenis.jenis, seni.keterangan, seni.jangkauan, seni.harga, seni.status","seni join mstr_seniman on seni.snm_id = mstr_seniman.snm_id join jenis on seni.jns_id = jenis.jns_id where seni.status!=0 order by sn_id desc");
                  $n=1;
                  foreach ($show as $r) {
                    $sn_id = $r['sn_id'];
                    $nama = $r['nama_snm'];
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
                  <tr>
                    <td><?=$n++?></td>
                    <td><?=$judul?></td>
                    <td><?=$jenis?></td>
                    <td><?php
                    echo substr($r['keterangan'],0,70);
                      if (strlen($r['keterangan'])>70) {
                        echo "...";
                      }
                    ?></td>
                    <td>
                    <?php
                      if($status==0) {
                        echo "<b class='text-warning'><i>Menunggu konfirmasi</i></b>";
                      }elseif ($status==1) {
                        echo "<b class='text-primary'><i>aktif</i></b>";
                      }elseif ($status==2){
                        echo "<b class='text-info'><i>Rekomendasi</i></b>";
                      }elseif ($status==3){
                        echo "<b class='text-danger'><i>Di nonaktifkan</i></b>";
                      }
                    ?>
                    </td>
                    <td class="text-center">
                      <a href="#" data-toggle="modal" data-target="#modal-lg" onclick="tampildata('<?=$sn_id?>','<?=$nama?>','<?=$alamat?>','<?=$judul?>','<?=base_url('admin/public/img/seni/'.$gambar)?>','<?=$kategori?>',
                      '<?=$jenis?>','<?=$keterangan?>','<?=$jangkauan?>','<?=$harga?>','<?=$status?>')"><button class="btn btn-secondary"><i class="fa fa-newspaper"></i></button></a>
                      <a href="<?=base_url('admin/proses/seni.php?proses=delete&&sn_id='.$sn_id);?>" onclick="return confirm('Hapus postingan?')"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NO</th>
                    <th>JUDUL</th>
                    <th>JENIS</th>
                    <th>KETERANGAN</th> 
                    <th>STATUS</th>
                    <th class="text-center"><i class="fa fa-cogs aligh-center"></i></th>
                  </tr>
                  </tfoot>
                </table>
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
                      <td rowspan="8"><img src="<?=base_url('admin/public/img/seni/default.png')?>" id="foto" width="300px" class="img-fluid" height="100px" ></td>
                      <td rowspan="8"> <div class="col-md-1"></div></td>
                      <td rowspan="8"> <div class="col-md-1"></div></td>
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
                      <td> : <span id="jenis"></span>, <span id="tgl_lahir"></span></td>
                    </tr>
                    <tr>
                      <td><b>harga </b></td>
                      <td> : <span id="harga"></span></td>
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
                  <input type="submit" class="btn btn-danger" id="conf" name="dec" value="Decline">
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
    <!-- /.content -->
    <script>
      function tampildata(sn_id,nama,alamat,judul,gambar,kategori,jenis,keterangan,jangkauan,harga,status) {
      var name='';
      var value='';
      var btn='';
      var type='submit';
      if (status==1) {
        name = 'dec';
        value = 'Nonaktifkan';
        btn = 'btn btn-danger';
      }else if (status==3) {
        name = 'acc';
        value = 'Aktifkan';
        btn = 'btn btn-primary';
      }else {
        type = 'hidden';
      }
      $('#conf').attr('class', btn);
      $('#conf').attr('type', type);
      $('#conf').attr('value', value);
      $('#conf').attr('name', name);
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