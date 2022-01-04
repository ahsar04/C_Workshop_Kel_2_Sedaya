<?php
    $primary = $_GET['adm_id'];
    $q = $syntax->view_kon("mstr_admin","adm_id='$primary'");
    $r = $q->fetch_array();
?>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update data admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?=base_url('admin/proses/admin.php?proses=update');?>" enctype="multipart/form-data">
			  <input type="hidden" name="adm_id" value="<?=$r['adm_id']?>">
                <div class="card-body row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Name *</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Full name" name="nama" value="<?=$r['nama']?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Gender *</label>
							<div class="col-sm-10 form-check"><span class="col-sm-1"></span>
								<input class="form-check-input" type="radio" name="jk" value="L" <?php if ($r['jk']=='L') {
									echo "checked";
								}?>>
								<label class="form-check-label col-sm-2">Male</label>
								<input class="form-check-input" type="radio" name="jk" value="P" <?php if ($r['jk']=='P') {
									echo "checked";
								}?>>
								<label class="form-check-label col-sm-2">Female</label>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Place of birth *</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Regency" name="tmp_lahir" value="<?=$r['tmp_lahir']?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Date of birt *</label>
							<div class="col-sm-10">
							<input type="date" class="form-control" placeholder="yyyy-mm-dd" name="tgl_lahir" value="<?=$r['tgl_lahir']?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Address *</label>
							<div class="col-sm-10">
							<textarea type="text" class="form-control" placeholder="road:xxxx, distric:xxxx, regency:xxxx, province:xxxx"  name="alamat" required><?=$r['alamat']?></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">telephone *</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="08xxxx...." name="telp" value="<?=$r['telp']?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Email *</label>
							<div class="col-sm-10">
							<input type="email" class="form-control" placeholder="example@example.example" name="email" value="<?=$r['email']?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Username *</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Username" name="username" value="<?=$r['username']?>" required>
							</div>
						</div>
						<!-- <div class="form-group row">
							<label class="col-sm-2 col-form-label">Password *</label>
							<div class="col-sm-10">
							<input type="password" class="form-control" placeholder="Password" name="password" value="<?=$r['password']?>" required>
							</div>
						</div> -->
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Status *</label>
							<div class="col-sm-10">
							<select name="status" class="form-control" id="">
								<?php
								if ($r['adm_id']!='adm1') {
									if ($r['status']==1) {
										echo '<option class="form-control" value="1" selected>Admin Master</option>';
										echo '<option class="form-control" value="2">Operator</option>';
									}else{
										echo '<option class="form-control" value="1">Admin Master</option>';
										echo '<option class="form-control" value="2" selected>Operator</option>';
									}
								}else{
									echo'<option class="form-control" value="1">Admin Master</option>';
								}
								?>
							</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Photo *</label>
							<div class="col-sm-10">
							<input type="file" class="form-control"  name="foto">
								<span style="color:red;"><i> *kosongi jika tetap</i></span>
							</div>
						</div>
					</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Save</button>
                  <a href="<?=base_url('admin/index.php?page=admin')?>" class="btn btn-info float-left"><i class="fa fa-angle-double-left"></i> back</a>
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
			