<?php set_page("Kriteria"); $this->load("partial.header") ?>
<div class="container">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2>Tambah Kriteria List (<?=$kriteria->nama?>)</h2>
				<?php if ($error) { ?>
				<div class="alert alert-danger" role="alert">
					Kriteria List sudah ada.
				</div>						
				<?php } ?>
			</div>
			<div class="col-sm-12">
				<form method="post" action="<?= base_url() ?>/admin/kriteria/list/save">
					<input type="hidden" name="kriteria_id" value="<?= $kriteria->id ?>">
					<div class="form-group">
						<label for="list_label">Nama</label>
						<input type="text" name="list_label" class="form-control" placeholder="Nama" required="">
						<span class="form-error list_label">Nama List tidak boleh kosong</span>
					</div>
					<div class="form-group">
						<label for="list_value">Nilai</label>
						<input type="number" name="list_value" step="any" class="form-control" placeholder="Nilai" required="" max="<?=$kriteria->bobot?>" min="0">
						<span class="form-error list_value">Nilai Tidak Boleh lebih dari <?= $kriteria->bobot ?></span>
					</div>
					<button class="btn btn-danger"><i class="fa fa-save"></i> Simpan</button>
					<a href="<?= base_url() ?>/admin/kriteria/list/<?=$kriteria->id?>" class="btn btn-warning">Kembali</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
