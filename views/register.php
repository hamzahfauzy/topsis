<?php $this->load("partial.header") ?>
<style type="text/css">
#nama_lengkap, #alamat, #no_telepon, #username, #password {
	font-size: 1.2em;
}

.input-username {
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
}

.input-password {
	border-top-right-radius: 0px;
	border-top-left-radius: 0px;
}

.login-wrapper {
	background-color: rgba(255,255,255,0.7);
	padding: 15px;
	padding-top:20px;
	padding-bottom:20px;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-4 m-auto">
			<br><br><br>
			<div class="login-wrapper">
				<center>
					<img src="<?= $this->assets->get('assets/sapi.png') ?>" width="100px">
				</center>
				<h2 align="center" class="text-info">Register</h2>
				<hr>
				<div class="form-container">
					<?php if ($error) { ?>
					<div class="alert alert-danger" role="alert">
						Username sudah digunakan
					</div>						
					<?php } ?>
					<form method="post" action="<?= base_url() ?>/register">
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required="">
							<span class="form-error nama_lengkap">Nama Lengkap cannot be empty</span>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required="">
							<span class="form-error alamat">Alamat cannot be empty</span>
						</div>
						<div class="form-group">
							<label>No Telepon</label>
							<input type="text" name="no_telepon" id="no_telepon" class="form-control" placeholder="No Telepon" required="">
							<span class="form-error no_telepon">No Telepon cannot be empty</span>
						</div>
						<div class="form-group">
							<label>Daftar Sebagai</label>
							<select name="level" required="" class="form-control">
								<option value="2">Pembeli</option>
								<option value="3">Penjual</option>
							</select>
							<span class="form-error no_telepon">No Telepon cannot be empty</span>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username" required="">
							<span class="form-error username">username cannot be empty</span>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
							<span class="form-error password">password cannot be empty</span>
						</div>
						<div class="form-group">
							<p></p>
							<button class="btn btn-info btn-block"><i class="fa fa-sign-in-alt"></i> Daftar</button>
						</div>
					</form>
				</div>
				<br>
				<p align="center"> Copyright &copy; 2019 - <a href="#">RAWANG TERNAK SHOP</a></p>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
