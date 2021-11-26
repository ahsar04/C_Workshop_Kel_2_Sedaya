<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Admin</li>
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
                <a href="<?=base_url("admin/index.php?page=admin/insert");?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New</button></a></br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>JENIS KELAMIN</th>
                    <th>TTL</th>
                    <th>TELP</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th class="text-center"><i class="fa fa-cogs aligh-center"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $show=$syntax->view("mstr_admin");
                      $n=1;
                      foreach ($show as $r) {
                        $foto = $r['foto'];
                        $nama = $r['nama'];
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
                    <td><?=$nama?></td>
                    <td>
                      <?php
                      if ($jk=="L") {
                        echo "Laki-laki";
                      }elseif($jk=="P"){
                        echo "Perempuan";
                      }
                      ?>
                    </td>
                    <td><?=$tmp_lahir?>, <?=$tgl_lahir?></td>
                    <td><?=$telp?></td>
                    <td><?=$email?></td>
                    <td>
                    <?php
                      if ($status==1) {
                        echo "Admin Master";
                      }elseif ($status==2){
                        echo "Operator";
                      }
                    ?>
                    </td>
                    <td class="text-center">
                        <button data-toggle="modal" data-target="#modal-lg" onclick="tampildata('<?=base_url('admin/public/img/'.$foto)?>','<?=$nama?>','<?=$jk?>','<?=$tmp_lahir?>','<?=$tgl_lahir?>','<?=$telp?>','<?=$email?>','<?=$status?>','<?=$alamat?>')" class="btn btn-primary"><i class="fa fa-newspaper"></i></button>
                        <a href="<?=base_url('admin/index.php?page=admin/update&&adm_id='.$r['adm_id']);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                        <a href="<?php if ($_SESSION['login']['adm_id']==$r['adm_id']) {
                                echo "#";
                              }else {echo base_url('admin/proses/admin.php?proses=delete&&adm_id='.$r['adm_id']);}?>" onclick="<?php if ($_SESSION['login']['adm_id']==$r['adm_id']) {
                                echo "alert('Data tidak dapat dihapus!')";
                              }else { echo "return confirm('Yakin Hapus')";  }?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>JENIS KELAMIN</th>
                    <th>TTL</th>
                    <th>TELP</th>
                    <th>EMAIL</th>
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
          <!-- /.col -->
          <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Detail</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table class="table">
                    <tr >
                      <td rowspan="7"><img src="<?=base_url('admin/public/img/avatar5.png')?>" id="foto" width="220px" height="250px" ></td>
                    </tr>
                    <tr>
                      <td><b>Nama </b></td>
                      <td> : <span id="nama"></span></td>
                    </tr>
                    <tr>
                      <td><b>Jk</b></td>
                      <td> : <span id="jk"></span></td>
                    </tr>
                    <tr>
                      <td><b>TTL</b></td>
                      <td> : <span id="tmp_lahir"></span>, <span id="tgl_lahir"></span></td>
                    </tr>
                    <tr>
                      <td><b>Telp </b></td>
                      <td> : <span id="telp"></span></td>
                    </tr>
                    <tr>
                      <td><b>Email </b></td>
                      <td> : <span id="email"></span></td>
                    </tr>
                    <tr>
                      <td><b>Status </b></td>
                      <td> : <span id="status"></span></td>
                    </tr>
                  </table>
                    <br>
                  <table class="table">
                    <tr>
                      <td><b>Alamat: </b></td>
                    </tr>
                    <tr>
                      <td><span id="alamat"></span></td>
                    </tr>
                  </table>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
      function tampildata(foto, nama, jk, tmp_lahir, tgl_lahir, telp, email, status, alamat) {
      $('#foto').attr('src', foto);
      $('#nama').html(nama);
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
      if (status=='1') {
        setStatus = 'Admin Master';
      }else if (status=='2') {
        setStatus = 'Operator';
      }
      $('#status').html(setStatus);
      $('#alamat').html(alamat);
      }
    </script>