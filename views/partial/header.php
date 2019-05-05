<?php use vendor\zframework\Session; ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TOPSIS</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=$this->assets->get('font-awesome/css/fontawesome.css')?>">
	<link rel="stylesheet" href="<?=$this->assets->get('font-awesome/css/brands.css')?>">
	<link rel="stylesheet" href="<?=$this->assets->get('font-awesome/css/solid.css')?>">
	<!-- Bootstrap core CSS -->
	<link href="<?=$this->assets->get('css/bootstrap.min.css')?>" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?=$this->assets->get('css/mdb.min.css')?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=$this->assets->get('css/styles.css')?>">
	<script type="text/javascript" src="<?=$this->assets->get('js/site.js')?>"></script>
</head>
<body>

<?php if(Session::get('id')){ ?>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark info-color">
  <div class="container">
  <!-- Navbar brand -->
  <a class="navbar-brand" href="#">TOPSIS</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

  	<ul class="navbar-nav ml-auto">
      <li class="nav-item <?= get_page() == 'Home' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url() ?>/admin">
          <i class="fas fa-home"></i> Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item <?= get_page() == 'Kriteria' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url() ?>/admin/kriteria">
          <i class="fab fa-typo3"></i> Kriteria
        </a>
      </li>
      <li class="nav-item <?= get_page() == 'Products' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url() ?>/admin/products">
          <i class="fas fa-list-alt"></i> Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>/logout">
          <i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
    </ul>

  </div>
  <!-- Collapsible content -->
  </div>

</nav>
<?php } ?>
<!--/.Navbar-->
<div style="padding-top: 20px;"></div>