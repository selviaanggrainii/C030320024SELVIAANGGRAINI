<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Tambah Data
			<!-- <small>Kategori Artikel</small> -->
		</h1>
	</section>

	<section class="content">

		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url().'dashboard/dbsuratmasuk_selvia'; ?>" class="btn btn-sm btn-primary">Kembali</a>
				
				<br/>
				<br/>

				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Tambah Data</h3>
					</div>
					<div class="box-body">
						
						
						<form method="post" action="<?php echo base_url('dashboard/kategori_aksi') ?>">
						<div class="box-body">
								<div class="form-group">
									<label>No Surat</label>
									<input type="text" name="no_surat" class="form-control" placeholder="Masukkan nama kategori ..">
									<?php echo form_error('dbsuratmasuk_selvia'); ?>
								</div>
								</div>
								<div class="box-body">
								<div class="form-group">
									<label>Pengirim</label>
									<input type="text" name="nama_pengirim" class="form-control" placeholder="Masukkan nama kategori ..">
									<?php echo form_error('dbsuratmasuk_selvia'); ?>
								</div>
								</div>
								<div class="box-body">
								<div class="form-group">
									<label>Waktu</label>
									<input type="date" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama kategori ..">
									<?php echo form_error('dbsuratmasuk_selvia'); ?>
								</div>
								</div>
								<div class="box-body">
								<div class="form-group">
									<label>Tempat</label>
									<input type="text" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama kategori ..">
									<?php echo form_error('dbsuratmasuk_selvia'); ?>
								</div>
								</div>
								<div class="box-body">
								<div class="form-group">
									<label>Lampiran</label>
									<input type="text" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama kategori ..">
									<?php echo form_error('dbsuratmasuk_selvia'); ?>
								</div>
								</div>
								<div class="box-body">
								<div class="form-group">
									<label>Perihal</label>
									<input type="text" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama kategori ..">
									<?php echo form_error('dbsuratmasuk_selvia'); ?>
								</div>
								</div>
								
							</div>

							<div class="box-footer">
								<input type="submit" class="btn btn-success" value="Simpan">
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>