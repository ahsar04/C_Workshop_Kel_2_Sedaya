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
  </div>
  <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card-header -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add data admin</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form
            class="form-horizontal"
            method="POST"
            action="<?=base_url('admin/proses/admin.php?proses=insert');?>"
            enctype="multipart/form-data"
          >
            <div class="card-body row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Name *</label>
                  <div class="col-sm-10">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Full name"
                      name="nama"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gender *</label>
                  <div class="col-sm-10 form-check">
                    <span class="col-sm-1"></span>
                    <input
                      class="form-check-input"
                      type="radio"
                      name="jk"
                      value="L"
                    />
                    <label class="form-check-label col-sm-2">Male</label>
                    <input
                      class="form-check-input"
                      type="radio"
                      name="jk"
                      value="P"
                    />
                    <label class="form-check-label col-sm-2">Female</label>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"
                    >Place of birth *</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Regency"
                      name="tmp_lahir"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Date of birt *</label>
                  <div class="col-sm-10">
                    <input
                      type="date"
                      class="form-control"
                      placeholder="yyyy-mm-dd"
                      name="tgl_lahir"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Address *</label>
                  <div class="col-sm-10">
                    <textarea
                      type="text"
                      class="form-control"
                      placeholder="road:xxxx, distric:xxxx, regency:xxxx, province:xxxx"
                      name="alamat"
                      required
                    ></textarea>
                  </div>
                </div>
                <!-- <label> Provinsi </label>
                <select
                  class="select2-data-array browser-default"
                  id="select2-provinsi"
                ></select>
                <br />
                <label> Kabupaten </label>
                <select
                  class="select2-data-array browser-default"
                  id="select2-kabupaten"
                ></select>
                <br />
                <label> Kecamatan </label>
                <select
                  class="select2-data-array browser-default"
                  id="select2-kecamatan"
                ></select>
                <br />
                <label> Kelurahan </label>
                <select
                  class="select2-data-array browser-default"
                  id="select2-kelurahan"
                ></select> -->
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">telephone *</label>
                  <div class="col-sm-10">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="08xxxx...."
                      name="telp"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email *</label>
                  <div class="col-sm-10">
                    <input
                      type="email"
                      class="form-control"
                      placeholder="example@example.example"
                      name="email"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Username *</label>
                  <div class="col-sm-10">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      name="username"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Password *</label>
                  <div class="col-sm-10">
                    <input
                      type="password"
                      class="form-control"
                      placeholder="Password"
                      name="password"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Photo *</label>
                  <div class="col-sm-10">
                    <input
                      type="file"
                      class="form-control"
                      name="foto"
                      required
                    />
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Add
              </button>
              <a
                href="<?=base_url('admin/index.php?page=admin')?>"
                class="btn btn-info float-left"
                ><i class="fa fa-angle-double-left"></i> back</a
              >
            </div>
            <!-- /.card-footer -->
          </form>
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
<!-- <script>
  $('.flexdatalist').flexdatalist({
     minLength: 1
  });
  function getKab(id) {
    $.ajax({
      type: "POST",
      url: "req.php",
      data: "data=" + id,
      dataType: "html",
      success: function (data) {
        $("#kab").html(data);
      },
      error: function (output) {
        alert("fail");
      },
    });
  }
</script> -->
