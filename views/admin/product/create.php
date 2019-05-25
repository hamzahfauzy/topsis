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
						<label for="kategori">Kategori</label>
						<select name="kategori" class="form-control" required="">
							<option value="">- Pilih Kategori -</option>
							<option value="Jantan">Jantan</option>
							<option value="Betina">Betina</option>
						</select>
						<span class="form-error kategori">Kategori tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Produk" required=""></textarea>
						<span class="form-error deskripsi">Nama Produk tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="harga">Harga</label>
						<br>
						<i>Harga tidak boleh menggunakan titik (.)</i>
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
						<select name="kriteria[<?=$value->id ?>]" class="form-control">
							<?php foreach($value->lists() as $list){ ?>
							<option value="<?=$list->list_value?>"><?=$list->list_label?></option>
							<?php } ?>
						</select>
					</div>
					<?php endforeach ?>
					<button class="btn btn-danger"><i class="fa fa-save"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
