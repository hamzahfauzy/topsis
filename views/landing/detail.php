<?php $this->load('landing.partial.header') ?>
<div class="container">
	<?php $this->load('landing.partial.top') ?>

	<div class="row">
		<div class="col-sm-12">
			<br>
			<h2 align="center">DETAIL PRODUK</h2>
			<hr>
		</div>
	</div>

	<div class="row row-eq-height">
		<div class="col-sm-12 col-md-12 product-container">
			<div class="row">
				<div class="col-sm-12 col-md-5">
					<img src="<?=$this->assets->get('uploads/'.$product->gambar)?>" class="img-thumbnail">
					<p></p>
					<a href="<?= base_url() ?>/beli/<?= $product->id ?>" class="btn btn-info btn-block">Beli Sapi Ini</a>
				</div>
				<div class="col-sm-12 col-md-7">
					<h2 class="product-title"><?= $product->nama ?></h2>
					<p>Deskripsi :</p>
					<p><?= $product->deskripsi ?></p>
					<p>Kategori : <b><?= $product->kategori ?></b></p>
					<p>Harga : Rp. <b><?= number_format(str_replace(".", "", $product->harga)) ?></b></p>
					<div>
						<h2>Penilaian Topsis</h2>
						<hr>
						<?php foreach ($product->topsis() as $key => $value): ?>
						<h4><?= $value->kriteria()->nama ?></h4>
						<p>Nilai : <b><?= $value->nilai ?></b> | Bobot : <b><?= $value->kriteria()->bobot ?></b></p>
						<?php endforeach ?>
						<h2>Hasil Penilaian : <?= $vi[$product->id] ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div style="padding-top: 30px;"></div>
	<div class="row">
		<div class="col-sm-12">
			<center>
			Copyright &copy; 2019 . <a href="#">Rawang Ternak Shop</a>
			</center>
		</div>
	</div>
</div>
<div style="padding-top: 50px;padding-bottom: 50px;"></div>
<?php $this->load('landing.partial.footer') ?>