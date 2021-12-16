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
                                        1. Lorem ipsum dolor sit amet
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        2. Aenean massa
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        3. Donec quam felis
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                                </div>
                            </div>
                        </div>
                        <div class="card card-warning card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        4. Donec pede justo
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseFour" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                                </div>
                            </div>
                        </div>
                        <div class="card card-warning card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        5. In enim justo
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseFive" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
                                </div>
                            </div>
                        </div>
                        <div class="card card-warning card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        6. Integer tincidunt
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseSix" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
                                </div>
                            </div>
                        </div>
                        <div class="card card-danger card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        7. Aenean leo ligula
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseSeven" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
                                </div>
                            </div>
                        </div>
                        <div class="card card-danger card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        8. Aliquam lorem ante
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseEight" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
                                </div>
                            </div>
                        </div>
                        <div class="card card-danger card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        9.  Quisque rutrum
                                    </h4>
                                </div>
                            </a>
                            <div id="collapseNine" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
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

    