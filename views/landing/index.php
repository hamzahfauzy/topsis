<?php $this->load('landing.partial.header') ?>
<?php 

// Comparison function
function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a > $b) ? -1 : 1;
}

// Sort and print the resulting array
if(isset($vi))
	uasort($vi, 'cmp');
?>
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
		<?php if(isset($_GET['cari'])){ ?>
			<div class="col-sm-12 product-container">
				<table class="table table-bordered">
					<tr>
						<td>#</td>
						<td>Nama</td>
						<td>Rangking</td>
						<td>Foto</td>
						<td></td>
					</tr>
					<?php 
					$no=1;
					foreach ($vi as $k => $rank):
						foreach ($products as $key => $product): 
							if($product->id != $k) continue;
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $product->nama ?></td>
						<td><?= array_search($product->id, array_keys($vi))+1; ?></td>
						<td><img src="<?=$this->assets->get('uploads/'.$product->gambar)?>" class="img-thumbnail"></td>
						<td>
							<a href="<?= base_url() ?>/detail/<?=$product->id?>" class="btn btn-block btn-success"><i class="fa fa-eye"></i> Detail</a>
							<p></p>
							<a href="<?= base_url() ?>/beli/<?= $product->id ?>" class="btn btn-info btn-block">Beli</a>
						</td>
					</tr>
						<?php endforeach ?>
					<?php endforeach ?>
				</table>
			</div>
		<?php }else{ ?>
			<?php foreach($products as $product){ ?>
			<div class="col-sm-12 col-md-6 product-container">
				<div class="row">
					<div class="col-sm-12 col-md-5">
						<img src="<?=$this->assets->get('uploads/'.$product->gambar)?>" class="img-thumbnail">
					</div>
					<div class="col-sm-12 col-md-7">
						<h2 class="product-title"><?= $product->nama ?></h2>
						<span>Kategori : <?= $product->kategori ?></span><br>
						<span class="topsis-rating">Rangking : <?= array_search($product->id, array_keys($vi))+1; ?></span><br>
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