<?php set_page("Products"); $this->load("partial.header") ?>
<div class="container">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2>Tambah Produk</h2>
				<?php if ($error) { ?>
				<div class="alert alert-danger" role="alert">
					Produk sudah ada.
				</div>						
				<?php } ?>
			</div>
			<div class="col-sm-12">
				<form method="post" action="<?= base_url() ?>/admin/products/insert" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nama">Nama Produk</label>
						<input type="text" name="nama" class="form-control" placeholder="Nama Produk" required="">
						<span class="form-error nama">Nama Produk tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Produk" required=""></textarea>
						<span class="form-error deskripsi">Nama Produk tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="text" name="harga" class="form-control" placeholder="Harga Produk" required="">
						<span class="form-error harga">Harga Produk tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="gambar">Gambar</label>
						<input type="file" name="gambar" class="form-control" required="" style="height: auto;">
						<span class="form-error gambar">Gambar Produk tidak boleh kosong</span>
					</div>

					<h2>Kriteria Topsis</h2>
					<hr>
					<?php foreach ($kriteria as $key => $value): ?>
					<div class="form-group">
						<label for="kriteria[<?=$value->id ?>]"><?=$value->nama ?></label>
						<input type="number" name="kriteria[<?=$value->id ?>]" class="form-control" required="" min="1" max="<?=$value->bobot ?>">
						<span style="font-size: 12px"><i>Bobot Maksimal <?= $value->bobot ?></i></span>
					</div>
					<?php endforeach ?>
					<button class="btn btn-danger"><i class="fa fa-save"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
