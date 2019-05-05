<?php $this->load('landing.partial.header') ?>
<div class="container">
	<div class="header-section">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<table>
					<tr>
						<td>
							<img src="<?= $this->assets->get('assets/sapi.png') ?>" width="100px">
						</td>
						<td>
							<h2>Rawang Ternak<br>Shop</h2>
						</td>
					</tr>
				</table>
			</div>

			<div class="col-sm-12 col-md-6">
				<div class="float-right" style="padding-top: 25px;">
					<i class="fa fa-phone fa-rotate-90 text-success"></i> <a href="tel:081234567890"><b>0812 3456 7890</b></a>
					|
					<a href="<?=base_url()?>/login"><i class="fa fa-sign-in-alt text-warning"></i> <b>Login</b></a>
				</div>
			</div>
		</div>
	</div>

	<!--Navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark info-color">
	  <div class="container">
	  <!-- Collapse button -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
	    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <!-- Collapsible content -->
	  <div class="collapse navbar-collapse" id="basicExampleNav">
	  	<ul class="navbar-nav mr-auto">
	      <li class="nav-item <?= get_page() == 'Home' ? 'active' : '' ?>">
	        <a class="nav-link" href="<?= base_url() ?>">
	          <i class="fas fa-home"></i> Home
	          <span class="sr-only">(current)</span>
	        </a>
	      </li>
	      <li class="nav-item <?= get_page() == 'Hasil' ? 'active' : '' ?>">
	        <a class="nav-link" href="<?= base_url() ?>/tentang">
	          <i class="fas fa-user"></i> Tentang Penulis</a>
	      </li>
	    </ul>

	    <form class="form-inline">
	    	<input type="hidden" name="action" value="search">
		    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
		</form>
	  </div>
	  <!-- Collapsible content -->
	  </div>
	</nav>

	<div class="row">
		<div class="col-12">
			<br>
			<div class="slider slick-slider">
				<div class="slide-item" style="background-image: url(<?= $this->assets->get('assets/slide-1.jpg')?>); background-size: cover; background-repeat: no-repeat;"></div>
				<div class="slide-item" style="background-image: url(<?= $this->assets->get('assets/slide-2.jpg')?>); background-size: cover; background-repeat: no-repeat;"></div>
				<div class="slide-item" style="background-image: url(<?= $this->assets->get('assets/slide-3.jpg')?>); background-size: cover; background-repeat: no-repeat;"></div>
			</div>
		</div>
	</div>

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
					<span class="topsis-rating">Nilai Topsis : <?= $vi[$product->id] ?></span>
					<p><?= $product->deskripsi ?></p>
					<div>
						<a href="<?= base_url() ?>/detail/<?=$product->id?>" class="btn btn-block btn-success"><i class="fa fa-eye"></i> Detail</a>
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