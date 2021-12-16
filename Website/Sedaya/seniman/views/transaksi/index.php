<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Transaksi</h1>
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
                <!-- <a href="<?=base_url("seniman/index.php?page=seniman/insert");?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New</button></a></br> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>NO TRANSAKSI</th>
                    <th>JUDUL</th>
                    <th>TGL PEMESANAN</th>
                    <th>TGL KEGIATAN</th>
                    <th>STATUS</th>
                    <th class="text-center"><i class="fa fa-cogs aligh-center"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $show=$syntax->view("transaksi,seni where transaksi.sn_id=seni.sn_id and snm_id = $snm_id order by no_transaksi desc");
                      $n=1;
                      foreach ($show as $r) {
                  ?>
                  <tr>  
                    <td><?=$r['no_transaksi']?></td>
                    <td><?=$r['judul']?></td>
                    <td><?=$r['tgl_pemesanan']?></td>
                    <td><?=$r['tgl_kegiatan']?> - <?=$r['tgl_akhir']?></td>
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
                        <a href="<?=base_url('seniman/index.php?page=detail-transaksi&&no_transaksi='.$r['no_transaksi']);?>"><button class="btn btn-secondary"><i class="fa fa-newspaper"></i></button></a>
                        <!-- <a href="<?=base_url('seniman/index.php?page=seniman/update&&no_transaksi='.$r['no_transaksi']);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a> -->
                        <a href="<?=base_url('seniman/proses/user.php?proses=delete&&no_transaksi='.$r['no_transaksi']);?>" onclick="return confirm('Yakin Hapus')"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NO TRANSAKSI</th>
                    <th>JUDUL</th>
                    <th>TGL PEMESANAN</th>
                    <th>TGL KEGIATAN</th>
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
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>