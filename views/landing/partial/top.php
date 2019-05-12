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
					|
					<a href="<?=base_url()?>/register"><i class="fas fa-user-plus"></i> <b>Register</b></a>
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
	      <li class="nav-item <?= get_page() == 'Hasil' ? 'active' : '' ?>">
	        <a class="nav-link" href="<?= base_url() ?>/?type=betina">
	          Ternak Betina</a>
	      </li>
	      <li class="nav-item <?= get_page() == 'Hasil' ? 'active' : '' ?>">
	        <a class="nav-link" href="<?= base_url() ?>/?type=jantan">
	          Ternak Jantan</a>
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