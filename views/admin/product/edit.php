<?php set_page("Products"); $this->load("partial.header") ?>
<div class="container">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2>Edit Produk</h2>
				<?php if ($error) { ?>
				<div class="alert alert-danger" role="alert">
					Produk sudah ada.
				</div>						
				<?php } ?>
			</div>
			<div class="col-sm-12">
				<form method="post" action="<?= base_url() ?>/admin/products/update" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?=$product->id?>">
					<div class="form-group">
						<label for="nama">Nama Produk</label>
						<input type="text" name="nama" class="form-control" placeholder="Nama Produk" required="" value="<?= $product->nama ?>">
						<span class="form-error nama">Nama Produk tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" class="form-control" required="">
							<option value="">- Pilih Kategori -</option>
							<option value="Jantan" <?= $product->kategori == 'Jantan' ? 'selected=""' : '' ?>>Jantan</option>
							<option value="Betina" <?= $product->kategori == 'Betina' ? 'selected=""' : '' ?>>Betina</option>
						</select>
						<span class="form-error kategori">Kategori tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Produk" required=""><?= $product->deskripsi ?></textarea>
						<span class="form-error deskripsi">Nama Produk tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="harga">Harga</label>
						<br>
						<i>Harga tidak boleh menggunakan titik (.)</i>
						<input type="text" name="harga" class="form-control" placeholder="Harga Produk" required="" value="<?= $product->harga ?>">
						<span class="form-error harga">Harga Produk tidak boleh kosong</span>
					</div>

					<h2>Kriteria Topsis</h2>
					<hr>
					<?php foreach ($product->topsis() as $key => $value): ?>
					<div class="form-group">
						<label for="kriteria[<?=$value->kriteria_id ?>]"><?=$value->kriteria()->nama ?></label>
						<input type="number" name="kriteria[<?=$value->kriteria_id ?>]" class="form-control" required="" min="1" max="<?=$value->kriteria()->bobot ?>" value="<?= $value->nilai ?>">
						<span style="font-size: 12px"><i>Bobot Maksimal <?= $value->kriteria()->bobot ?></i></span>
					</div>
					<?php endforeach ?>
					<button class="btn btn-danger"><i class="fa fa-save"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
