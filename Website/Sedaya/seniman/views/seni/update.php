<?php
    $primary = $_GET['sn_id'];
    $q = $syntax->view_kon("seni","sn_id='$primary'");
    $r = $q->fetch_array();
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Data Seni</h1> -->
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
                <h3 class="card-title">Edit data seni</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?=base_url('seniman/proses/seni.php?proses=update');?>" enctype="multipart/form-data">
                <div class="card-body row">
					<input type="hidden" name="snm_id" value="<?=$snm_id?>">
					<div class="col-md-12">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Judul *</label>
							<div class="col-sm-10">
							<input type="hidden" value="<?=$r['sn_id']?>" name="sn_id" required>
							<input type="text" class="form-control" placeholder="Judul Seni" value="<?=$r['judul']?>" name="judul" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Kategori *</label>
							<div class="col-sm-10 form-check"><span class="col-sm-2"></span>
								<input class="form-check-input" <?php if ($r['kategori']=="Kelompok") {
									echo "checked";
								}?> type="radio" name="kategori" value="Kelompok">
								<label class="form-check-label col-sm-3">Kelompok</label>
								<input class="form-check-input" <?php if ($r['kategori']=="Individu") {
									echo "checked";
								}?> type="radio" name="kategori" value="Individu">
								<label class="form-check-label col-sm-3">Individu</label>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Jenis *</label>
							<div class="col-sm-10">
							<select name="jns_id" id="" class="form-control">
								<option class="form-control">Pilih Jenis</option>
								<?php
                 				$show=$syntax->view("jenis");
								foreach ($show as $j) {
								?>
									<option value="<?=$j['jns_id']?>" <?php if($r['jns_id']==$j['jns_id']) {echo'selected';}?> class="form-control"><?=$j['jenis']?></option>
									<?php }?>
							</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Keterangan *</label>
							<div class="col-sm-10">
							<textarea id="summernote" name="ket" required>
                				<?=$r['keterangan']?>
							</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">jangkauan *</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" value="<?=$r['jangkauan']?>" placeholder="kecamatan/kabupaten/provinsi" name="jangkauan" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">harga (Rp.) *</label>
							<div class="col-sm-10">
							<input type="number" value="<?=$r['harga']?>" class="form-control" min="0" name="harga" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Gambar *</label>
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
                  <a href="<?=base_url('seniman/index.php?page=postingan')?>" class="btn btn-info float-left"><i class="fa fa-angle-double-left"></i> back</a>
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
	
			