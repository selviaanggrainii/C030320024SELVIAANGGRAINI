<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Surat Masuk
			<small>Surat Masuk</small>
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-9">
				
				<a href="<?php echo base_url().'dashboard/kategori_tambah'; ?>" class="btn btn-sm btn-primary">Buat Surat Masuk baru</a>

				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Surat Masuk</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<!-- <th width="1%">N0 Surat</th> -->
									<th>No Surat</th>
									<th>Pengirim</th>
									<<th>Waktu</th>
									<th>Tempat</th>
									<th>Lampiran</th>
									<th>Perihal</th>
									<th>Aksi</th> 
									<!-- <th width="10%">Tempat</th> -->
								</tr>
							</thead>
							<tbody>
								<?php 
								// $no = 1;
								foreach($dbsuratmasuk_selvia as $k){ 
									?>
									<tr>
										<!-- <td><?php echo $no++; ?></td> -->
										<td><?php echo $k->no_surat; ?></td>
										<td><?php echo $k->nama_pengirim; ?></td>
										<td><?php echo $k->waktu; ?></td>
										<td><?php echo $k->tempat; ?></td>
										<td><?php echo $k->lampiran; ?></td>
										<td><?php echo $k->perihal; ?></td> 
										<td>
											<a href="<?php echo base_url().'dashboard/kategori_edit/'.$k->id_surat; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
											<a href="<?php echo base_url().'dashboard/kategori_hapus/'.$k->id_surat; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						

					</div>
				</div>

			</div>
		</div>

	</section>

</div>