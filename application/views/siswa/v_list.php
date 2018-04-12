<div class="content-wrapper">
	<section class="content-header">
		<h1>Data Siswa<small>SMK Negeri 4 Bandung</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">
						<?php if(@$level == 1) { ?>
						<a href="<?php echo site_url("siswa/tambah")?>" class="btn btn-primary">
								<i class="fa fa-plus"></i> Tambah
							</a>
							<?php } ?>
							</a>
						</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>NIS</th>
									<th>Nama Siswa</th>
									<th>Jenis Kelamin</th>
									<th>Alamat</th>
									<th>No Telp</th>
									<th>Agama</th>
									<th>Kelas</th>
									<th>Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php
									$i = 1;
									foreach ($result as $row){ ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $row->nis?></td>
									<td><?php echo $row->nama?></td>
									<td><?php echo $row->jk?></td>
									<td><?php echo $row->alamat?></td>
									<td><?php echo $row->notelp?></td>
									<td><?php echo $row->agama?></td>
									<td><?php echo $row->nama_kelas?></td>
									<td>
										<?php if(@$level == 1) { ?>
										<a class="btn btn-primary" href="<?= site_url("siswa/edit/".$row->nis)?>">
											<i class="fa fa-pencil"></i> Edit
										</a>
										
										<a class="btn btn-danger" href="<?= site_url("siswa/delete/".$row->nis)?>">
											<i class="fa fa-trash-o"></i> Delete
										</a>
										<?php }?>
									</td>
								</tr>
								<?php $i++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>