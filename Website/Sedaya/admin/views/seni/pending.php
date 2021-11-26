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

    <!-- Main content -->
    <section class="content">
          <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <!-- /.card-header -->
            <div class="card">
              <div class="card-header">
                <h1>Data Admin</h1>
                <!-- <a href="<?=base_url("admin/index.php?page=admin/insert");?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New</button></a></br> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>JUDUL</th>
                    <th>KATEGORI</th>
                    <th>JENIS</th>
                    <th>KETERANGAN</th>
                    <th>JANGKAUAN</th>
                    <th>STATUS</th>
                    <th class="text-center"><i class="fa fa-cogs aligh-center"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $show=$syntax->view_field("seni.jns_id, seni.judul, seni.kategori, jenis.jenis, seni.keterangan, seni.jangkauan, seni.status","seni join mstr_user on seni.usr_id = mstr_user.usr_id JOIN jenis on seni.jns_id = jenis.jns_id where seni.status =0");
                      $n=1;
                      foreach ($show as $r) {
                  ?>
                  <tr>
                    <td><?=$n++?></td>
                    <td><?=$r["judul"]?></td>
                    <td><?=$r["kategori"]?></td>
                    <td><?=$r["jenis"]?></td>
                    <td><?=substr($r["keterangan"],0,75)?></td>
                    <td><?=$r["jangkauan"]?></td>
                    <td>
                    <?php
                      if($r["status"]==0) {
                        echo "<b class='text-warning'><i>Menunggu konfirmasi</i></b>";
                      }elseif ($r["status"]==1) {
                        echo "<b class='text-primary'><i>Siap</i></b>";
                      }elseif ($r["status"]==2){
                        echo "<b class='text-info'><i>Sedang dipesan</i></b>";
                      }elseif ($r["status"]==3){
                        echo "<b class='text-danger'><i>Di nonaktifkan</i></b>";
                      }
                    ?>
                    </td>
                    <td class="text-center">
                        <a href="<?=base_url('admin/index.php?page=user/update&&jns_id='.$r['jns_id']);?>"><button class="btn btn-primary"><i class="fa fa-newspaper"></i></button></a>
                        <a href="<?=base_url('admin/index.php?page=user/update&&jns_id='.$r['jns_id']);?>"><button class="btn btn-success"><i class="fa fa-check"></i></button></a>
                        <a href="<?=base_url('admin/proses/user.php?proses=delete&&jns_id='.$r['jns_id']);?>" onclick="return confirm('nonaktifkan postingan?')"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
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
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->