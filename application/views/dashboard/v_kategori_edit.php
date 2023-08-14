<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Surat Masuk
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
						<h3 class="box-title">Edit Surat Masuk</h3>
					</div>
					<div class="box-body">
						
						<?php foreach($dbsuratmasuk_selvia as $k){ ?>

							<form method="post" action="<?php echo base_url('dashboard/kategori_update') ?>">
								<div class="box-body">
								<div class="form-group">
										<label>No Surat</label>
										<input type="hidden" name="id" value="<?php echo $k->id_surat; ?>">
										<input type="text" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama kategori .." value="<?php echo $k->no_surat; ?>">
										<?php echo form_error('dbsuratmasuk_selvia'); ?>
									</div>
									<!-- <div class="form-group">
										<label>No Surat</label>
										<input type="hidden" name="id" value="<?php echo $k->id_surat; ?>">
										<input type="text" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama pengirim .." value="<?php echo $k->no_surat; ?>">
										<?php echo form_error('dbsuratmasuk_selvia'); ?>
									</div>
									<div class="form-group">
										<label>Pengirim</label>
										<input type="hidden" name="id" value="<?php echo $k->id_surat; ?>">
										<input type="text" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama pengirim .." value="<?php echo $k->nama_pengirim; ?>">
										<?php echo form_error('dbsuratmasuk_selvia'); ?>
									</div> -->
									<!-- <div class="form-group">
										<label>Waktu</label>
										<input type="hidden" name="id" value="<?php echo $k->id_surat; ?>">
										<input type="date" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama pengirim .." value="<?php echo $k->dbsuratmasuk_selvia; ?>">
										<?php echo form_error('dbsuratmasuk_selvia'); ?>
									</div> -->
									<!-- <div class="form-group">
										<label>Tempat</label>
										<input type="hidden" name="id" value="<?php echo $k->id_surat; ?>">
										<input type="text" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama pengirim .." value="<?php echo $k->tempat; ?>">
										<?php echo form_error('dbsuratmasuk_selvia'); ?>
									</div>
									<div class="form-group">
										<label>Lampiran</label>
										<input type="hidden" name="id" value="<?php echo $k->id_surat; ?>">
										<input type="text" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama pengirim .." value="<?php echo $k->lampiran; ?>">
										<?php echo form_error('dbsuratmasuk_selvia'); ?>
									</div>
									<div class="form-group">
										<label>Perihal</label>
										<input type="hidden" name="id" value="<?php echo $k->id_surat; ?>">
										<input type="text" name="dbsuratmasuk_selvia" class="form-control" placeholder="Masukkan nama pengirim .." value="<?php echo $k->perihal; ?>">
										<?php echo form_error('dbsuratmasuk_selvia'); ?>
									</div> -->
								</div>

								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Update">
								</div>
							</form>

						<?php } ?>

					</div>
				</div>

			</div>
		</div>

	</section>

</div>