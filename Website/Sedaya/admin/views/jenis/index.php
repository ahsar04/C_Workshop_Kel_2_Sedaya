<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Jenis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">Jenis</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class="col-md-4">
                <!-- /.card-header -->
              <div class="card card-info  ">
                <div class="card-header">
                  <h3 class="card-title">Add data jenis</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?=base_url('admin/proses/jenis.php?proses=insert');?>" enctype="multipart/form-data">
                  <div class="card-body row">
                  <div class="col-md-11">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis *</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Jenis tari" name="jenis" required>
                      </div>
                    </div>
                  </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add</button>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
            <!-- /.col -->
          </div>
          <div class="col-md-8">
              <!-- /.card-header -->
            <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title">Data jenis</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>JENIS</th>
                    <th class="text-center"><i class="fa fa-cogs aligh-center"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $show=$syntax->view("jenis order by jns_id desc");
                      $n=1;
                      foreach ($show as $r) {
                      $jns_id = $r['jns_id'];
                      $jenis = $r['jenis'];
                  ?>
                  <tr>
                    <td><?=$n++?></td>
                    <td><?=$jenis?></td>
                    <td class="text-center">
                        <button onclick="tampildata('<?=$jns_id ?>','<?=$jenis ?>')" class="btn btn-success" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-edit"></i></button>
                        <a href="<?=base_url('admin/proses/jenis.php?proses=delete&&jns_id='.$r['jns_id']);?>" onclick="return confirm('Yakin Hapus')"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NO</th>
                    <th>JENIS</th>
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
                  <h4 class="modal-title">Edit data jenis</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <form action="<?=base_url('admin/proses/jenis.php?proses=update')?>" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jenis :</label>
                      <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="jns_id" name="jns_id" required>
                      <input type="text" class="form-control" id="jenis" placeholder="Jenis tari" name="jenis" required>
                      </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <input type="submit" value="Save Change" class="btn btn-primary">
                </div>
                  </form>
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
    <script>
      function tampildata(jns_id, jenis) {
      $('#jns_id').val(jns_id);
      $('#jenis').val(jenis);
      }
    </script>