<?php
	if(@$form_edit){
		$title = "Edit Data Siswa";
		
		//URL Jika edit data
		$url = "siswa/do_edit/" . $result->id_siswa;
	} else {
		$title = "Tambah Data Siswa";
		
		//URL Jika Tambah Data
		$url = "siswa/do_tambah/";
	}
?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo $title?><small>SMK Negeri 4 Bandung</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>Data</a></li>
			<li class="active"><?php echo $title?></li>
		</ol>
	</section>
	
	<section class="content">
		<div class="row">
			<div class="box box-primary">
				<form action="<?php echo site_url($url)?>" method="POST">
					<div class="box-body">
						<!-- Feedback -->
						<?php if(!empty($success)) { ?>
						<div class="alert alert-success">
							<?php echo $success ?>
						</div>
						<?php } ?>
						
						<?php if(!empty($error)) { ?>
						<div class="alert alert-danger">
							<?php echo $error ?>
						</div>
						<?php } ?>
						<!-- End of Feedback -->
						<div class="form-group">
							<label for="nis">NIS</label>
							<input type="text" name="nis" class="form-control" id="nis"
							placeholder="NIS" value="<?php echo @$result->nis?>">
						</div>
						<div class="form-group">
							<label for="nama_siswa">Nama Siswa</label>
							<input type="text" name="nama" class="form-control" id="nama"
							placeholder="Nama Siswa" value="<?php echo @$result->nama?>">
						<div class="form-group">
							<label for="jk">Jenis Kelamin</label>
							<label><?php echo form_radio("jk", "L", @$result->jk == 'L');?>L</label>
							<label><?php echo form_radio("jk", "P", @$result->jk == 'P');?>P</label>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea name="alamat" class="form-control" id="alamat"
							placeholder="Alamat"><?php echo @$result->alamat?></textarea>
						</div>
						<div class="form-group">
							<label for="notelp">No Telp</label>
							<input type="text" name="notelp" class="form-control" id="notelp"
							placeholder="No Telp" value="<?php echo @$result->notelp?>">
						</div>
						<div class="form-group">
							<label for="jurusan">Agama</label>
							<?php
								$dropdown = array(
								"Islam"=>"Islam",
								"Kristen"=>"Kristen",
								"Buddha"=>"Buddha");
								echo form_dropdown("agama",$dropdown, @$result->agama, 'class="form-control" id="agama"');
							?>
						</div>
						<div class="form-group">
							<label for="id_kelas">Kelas</label>
							<?php
								echo form_dropdown("id_kelas", $kelas, @$result->id_kelas, 'class="form-control" id="id_kelas"')?>
						</div>
					</div>
					
					<div class="box-footer">
						<button type="sumbit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>