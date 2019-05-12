<?php $this->load('landing.partial.header') ?>
<div class="container">
	<?php $this->load('landing.partial.top') ?>

	<div class="row">
		<div class="col-sm-12">
			<br>
			<h2 align="center">PRODUK</h2>
			<hr>
		</div>
	</div>

	<div class="row row-eq-height">
		<?php foreach($products as $product){ ?>
		<div class="col-sm-12 col-md-6 product-container">
			<div class="row">
				<div class="col-sm-12 col-md-5">
					<img src="<?=$this->assets->get('uploads/'.$product->gambar)?>" class="img-thumbnail">
				</div>
				<div class="col-sm-12 col-md-7">
					<h2 class="product-title"><?= $product->nama ?></h2>
					<span>Kategori : <?= $product->kategori ?></span><br>
					<span class="topsis-rating">Nilai Topsis : <?= $vi[$product->id] ?></span>
					<p><?= $product->deskripsi ?></p>
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<a href="<?= base_url() ?>/beli/<?= $product->id ?>" class="btn btn-info btn-block">Beli</a>
						</div>
						<div class="col-sm-12 col-md-6">
							<a href="<?= base_url() ?>/detail/<?=$product->id?>" class="btn btn-block btn-success"><i class="fa fa-eye"></i> Detail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
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