<?php 
use vendor\zframework\Session;
$kriteria = app\Kriteria::get(); 
?>
<!-- Central Modal Small -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <form action="<?= base_url() ?>">
  <input type="hidden" name="cari" value="1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Cari Ternak</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">&times; Close</button>
        <button type="submit" class="btn btn-primary">Cari</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- Central Modal Small -->

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
				<?php if(!Session::get('id')){ ?>
				|
				<a href="<?=base_url()?>/login"><i class="fa fa-sign-in-alt text-warning"></i> <b>Login</b></a>
				|
				<a href="<?=base_url()?>/register"><i class="fas fa-user-plus"></i> <b>Register</b></a>
				<?php }else{ ?>
				|
				<a href="<?=base_url()?>/<?= (Session::user()->level == 1 || Session::user()->level == 3) ? 'admin' : 'pembeli' ?>"><i class="fa fa-user"></i> <?= Session::user()->nama_lengkap ? Session::user()->nama_lengkap : Session::user()->username ?></a>
				|
				<a href="<?=base_url()?>/logout"><i class="fa fa-sign-out-alt text-warning"></i> <b>Logout</b></a>
				<?php } ?>
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
		    <button class="btn" type="button" data-toggle="modal" data-target="#searchModal"><i class="fas fa-search"></i> Cari</button>
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