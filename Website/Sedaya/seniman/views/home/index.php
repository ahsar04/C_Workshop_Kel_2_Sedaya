<!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah admin</span>
                                <span class="info-box-number">
                                <?php $show=$syntax->view("mstr_admin");
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
                        <span class="info-box-icon bg-maroon elevation-1"><i class="fa fa-cart-arrow-down"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Transaksi berlangsung</span>
                            <span class="info-box-number">
                            <?php $show=$syntax->view("transaksi where status=0");
                                echo mysqli_num_rows($show);
                            ?></span>
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
                            <?php $show=$syntax->view("seni where status=0");
                                echo mysqli_num_rows($show);
                            ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah user</span>
                                <span class="info-box-number">
                                <?php $show=$syntax->view("mstr_user");
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
                        <span class="info-box-icon bg-maroon elevation-1"><i class="fa fa-calendar-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Transaksi selesai</span>
                            <span class="info-box-number">
                            <?php $show=$syntax->view("transaksi where status=1");
                                echo mysqli_num_rows($show);
                            ?></span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-4">
                        <div class="info-box mb-3">
                        <span class="info-box-icon bg-navy elevation-1"><i class="fa fa-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Postingan aktif</span>
                            <span class="info-box-number">
                            <?php $show=$syntax->view("seni where status=1");
                                echo mysqli_num_rows($show);
                            ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-12 card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Transaksi Mingguan
                            </h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;">
                                <canvas class="flot-base" width="597" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 597.5px; height: 300px;"></canvas>
                                <canvas class="flot-overlay" width="597" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 597.5px; height: 300px;"></canvas>
                                <div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;">
                                    <svg style="width: 100%; height: 100%;">
                                        <g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                                            <text x="124.19460227272725" y="293.75" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">Senin</text>
                                            <text x="229.58309659090907" y="293.75" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">Selasa</text>
                                            <text x="332.1356534090909" y="293.75" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">Rabu</text>
                                            <text x="430.3522727272727" y="293.75" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">Kamis</text>
                                            <text x="31.501420454545453" y="293.75" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">Jumat</text>
                                            <text x="526.2017045454545" y="293.75" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">Sabtu</text>
                                            <text x="626.2017045454545" y="293.75" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">Minggu</text>
                                        </g>
                                        <g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                                            <text x="9.625" y="268.25" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">0</text>
                                            <text x="9.625" y="205.25" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">5</text>
                                            <text x="1" y="16.25" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">20</text>
                                            <text x="1" y="142.25" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">10</text>
                                            <text x="1" y="79.25" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">15</text>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body-->
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

    