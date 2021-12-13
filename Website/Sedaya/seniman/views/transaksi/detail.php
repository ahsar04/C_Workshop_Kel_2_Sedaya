<?php
    $primary = $_GET['no_transaksi'];
    $q = $syntax->view_kon("transaksi,mstr_user,seni","transaksi.usr_id=mstr_user.usr_id and transaksi.sn_id = seni.sn_id and no_transaksi='$primary'");
    $r = $q->fetch_array();
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">No Tranaksi: <b><?=$r['no_transaksi']?></b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<tr>
								<td>Tanggal Pemesanan</td>
								<td class="col-md-1">: </td>
								<td><?=$r['tgl_pemesanan']?></td>
							</tr><br><br>
						</div>
						<div class="col-md-4">
						</div>
						<div class="col-md-4">
							<tr>
								<td>Pemesan</td>
								<td class="col-md-1">: </td>
								<td><?=$r['nama']?></td>
							</tr>
						</div>
					</div>
					<div class="row">
						<table class="table">
						<tr>
							<th>Judul</th>
							<th>Harga</th>
						</tr>
						<tr>
							<td><?=$r['judul']?></td>
							<td><?=$r['harga']?></td>
						</tr>
						</table>
					</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Save</button> -->
                  <a href="<?=base_url('admin/index.php?page=transaksi')?>" class="btn btn-info float-left"><i class="fa fa-angle-double-left"></i> back</a>
                </div>
                <!-- /.card-footer -->
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
			