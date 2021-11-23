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
                  ?>
                  <tr>
                    <td><?=$n++?></td>
                    <td><?=$r["nama"]?></td>
                    <td>
                      <?php
                      if ($r["jk"]=="L") {
                        echo "Laki-laki";
                      }elseif($r["jk"]=="P"){
                        echo "Perempuan";
                      }
                      ?>
                    </td>
                    <td><?=$r["tmp_lahir"]?>, <?=$r["tgl_lahir"]?></td>
                    <td><?=$r["telp"]?></td>
                    <td><?=$r["email"]?></td>
                    <td>
                    <?php
                      if ($r["status"]==1) {
                        echo "Admin Master";
                      }elseif ($r["status"]==2){
                        echo "Operator";
                      }
                    ?>
                    </td>
                    <td class="text-center"><a href="<?=base_url('admin/index.php?page=admin/update&&adm_id='.$r['adm_id']);?>"><button class="btn btn-primary"><i class="fa fa-newspaper"></i></button></a>
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
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->