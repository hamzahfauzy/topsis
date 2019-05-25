<?php set_page("Kriteria"); $this->load("partial.header") ?>
<div class="container">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2>Edit Kriteria</h2>
				<?php if ($error) { ?>
				<div class="alert alert-danger" role="alert">
					Kriteria sudah ada.
				</div>						
				<?php } ?>
			</div>
			<div class="col-sm-12">
				<form method="post" action="<?= base_url() ?>/admin/kriteria/update">
					<input type="hidden" name="id" value="<?= $kriteria->id ?>">
					<div class="form-group">
						<label for="nama">Nama Kriteria</label>
						<input type="text" name="nama" class="form-control" placeholder="Nama Kriteria" required="" value="<?= $kriteria->nama ?>">
						<span class="form-error nama">Nama Kriteria tidak boleh kosong</span>
					</div>
					<div class="form-group">
						<label for="bobot">Bobot</label>
						<input type="text" name="bobot" class="form-control" placeholder="Bobot Kriteria" required="" value="<?= $kriteria->bobot ?>">
						<span class="form-error bobot">Bobot Kriteria tidak boleh kosong</span>
					</div>
					<button class="btn btn-danger"><i class="fa fa-save"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
