<!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="info-box mb-3">
                        <span class="info-box-icon bg-navy elevation-1"><i class="fa fa-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Postingan aktif</span>
                            <span class="info-box-number">
                            <?php $show=$syntax->view("seni where status=1 and snm_id=".$_SESSION['login-user']['snm_id']);
                                echo mysqli_num_rows($show);
                            ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="info-box mb-3">
                        <span class="info-box-icon bg-navy elevation-1"><i class="fa fa-spinner"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Menunggu konfirmasi</span>
                            <span class="info-box-number">
                            <?php $show=$syntax->view("seni where status=0 and snm_id=".$_SESSION['login-user']['snm_id']);
                                echo mysqli_num_rows($show);
                            ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-4">
                        <div class="info-box mb-3">
                        <span class="info-box-icon bg-navy elevation-1"><i class="fa fa-calendar-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Transaksi baru</span>
                            <span class="info-box-number">
                            <?php $show=$syntax->view("transaksi,seni where transaksi.sn_id = seni.sn_id and t_status=0 and snm_id=".$_SESSION['login-user']['snm_id']);
                                echo mysqli_num_rows($show);
                            ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id="accordion">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">FAQ</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                    <div class="card card-primary card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        1. Bagaimana cara menambah postingan ?
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                <li>pertama pilih menu postingan</li>
                                <li>kemudian pilih add new </li>
                                <li>silahkan lengkapi data dari postingan tersebut </li>
                                <li>jika data sudah benar kemudian klik add </li>
                                <li>postingan berhasil ditambahkan</li>
                               
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        2. Dimana saya bisa melihat data transaksi
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                silahkan pilih menu transaksi, maka disitu akan muncul data data transaksi
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    </div>
                        
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6"></div>
            
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    