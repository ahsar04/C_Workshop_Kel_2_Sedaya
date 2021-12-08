<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kritik & Saran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Kritik & Saran</a></li>
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
              <div class="card-header bg-info">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>Kritik & Saran</th>
                    <th class="text-center"><i class="fa fa-cogs aligh-center"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $show=$syntax->view("feedback");
                      $n=1;
                      foreach ($show as $r) {
                        $id=$r['id'];
                        $nama = $r['nama'];
                        $email = $r['email'];
                        $kritik_saran = $r['kritik_saran'];
                  ?>
                  <tr>
                    <td><?=$n++?></td>
                    <td><?=$nama?></td>
                    <td><?=$email?></td>
                    <td><?=$kritik_saran?></td>
                    <td class="text-center">
                        <a href="<?=base_url('admin/proses/feedback.php?proses=delete&&id='.$id);?>" onclick="return confirm('Yakin Hapus')"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>Kritik & Saran</th>
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
      if (status=='0') {
        setStatus = 'Penikmat seni';
      }else if (status=='1') {
        setStatus = 'Seniman';
      }
      $('#status').html(setStatus);
      $('#alamat').html(alamat);
      }
    </script>