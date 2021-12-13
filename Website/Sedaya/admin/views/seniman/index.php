<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Seniman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Seniman</li>
            </ol>
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
                <!-- <a href="<?=base_url("admin/index.php?page=seniman/insert");?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New</button></a></br> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>TELP</th>
                    <th>EMAIL</th>
                    <th>ALAMAT</th>
                    <th class="text-center"><i class="fa fa-cogs aligh-center"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $show=$syntax->view("mstr_seniman,mstr_user where mstr_seniman.usr_id=mstr_user.usr_id order by snm_id desc");
                      $n=1;
                      foreach ($show as $r) {
                        $foto = $r['foto'];
                        $nama = $r['nama'];
                        $nama_snm = $r['nama_snm'];
                        $jk = $r['jk'];
                        $tmp_lahir = $r['tmp_lahir'];
                        $tgl_lahir = $r['tgl_lahir'];
                        $telp = $r['telp'];
                        $email = $r['email'];
                        $status = $r['status'];
                        $alamat = $r['alamat'];
                  ?>
                  <tr>
                    <td><?=$n++?></td>
                    <td><?=$nama_snm?></td>
                    <td><?=$telp?></td>
                    <td><?=$email?></td>
                    <td><?=$alamat?></td>
                    <td class="text-center">
                        <button data-toggle="modal" data-target="#modal-lg" onclick="tampildata('<?=base_url('admin/public/img/user/'.$foto)?>','<?=$nama?>','<?=$nama_snm?>','<?=$jk?>','<?=$tmp_lahir?>','<?=$tgl_lahir?>','<?=$telp?>','<?=$email?>','<?=$status?>','<?=$alamat?>')" class="btn btn-secondary"><i class="fa fa-newspaper"></i></button>
                        <!-- <a href="<?=base_url('admin/index.php?page=user/update&&snm_id='.$r['snm_id']);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a> -->
                        <!-- <a href="<?=base_url('admin/proses/user.php?proses=delete&&snm_id='.$r['snm_id']);?>" onclick="return confirm('Yakin Hapus')"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> -->
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>TELP</th>
                    <th>EMAIL</th>
                    <th>ALAMAT</th>
                    <th class="text-center"><i class="fa fa-cogs aligh-center"></i></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
                  <table class="">
                    <tr >
                      <td rowspan="7"><img src="<?=base_url('admin/public/img/avatar5.png')?>" class="img-fluid" id="foto" width="220px" height="250px" ></td>
                      <td rowspan="7"><div class="col-md-1"></div></td>
                      <td rowspan="7"><div class="col-md-1"></div></td>
                    </tr>
                    <tr>
                      <td><b>Nama </b></td>
                      <td> : <span id="nama_snm"></span></td>
                    </tr>
                    <tr>
                    <tr>
                      <td><b>Oleh </b></td>
                      <td> : <span id="nama"></span></td>
                    </tr>
                    <tr>
                      <td><b>Telp </b></td>
                      <td> : <span id="telp"></span></td>
                    </tr>
                    <tr>
                      <td><b>Email </b></td>
                      <td> : <span id="email"></span></td>
                    </tr>
                  </table>
                    <br>
                  <table class="">
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
                <div class="modal-footer justify-content-between text-right">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
      function tampildata(foto, nama, nama_snm, jk, tmp_lahir, tgl_lahir, telp, email, status, alamat) {
      $('#foto').attr('src', foto);
      $('#nama').html(nama);
      $('#nama_snm').html(nama_snm);
      var setJk;
      if (jk=='L') {
        setJk = 'Laki-laki';
      }else if (jk=='P') {
        setJk = 'Perempuan';
      }
      $('#jk').html(setJk);
      $('#tmp_lahir').html(tmp_lahir);
      $('#tgl_lahir').html(tgl_lahir);
      $('#telp').html(telp);
      $('#email').html(email);
      var setStatus;
      if (status=='0') {
        setStatus = 'Penikmat seni';
      }else if (status=='1') {
        setStatus = 'Seniman';
      }
      $('#status').html(setStatus);
      $('#alamat').html(alamat);
      }
    </script>