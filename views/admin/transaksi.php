<?php set_page("Transaksi"); $this->load("partial.header") ?>
<style type="text/css">
	.form-control { height: auto; }
</style>
<div class="container">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2>Transaksi</h2>
				<p></p>
			</div>
			<div class="col-sm-12">
				<table class="table table-bordered">
					<tr>
						<td>No</td>
						<td>Pembeli</td>
						<td>Produk</td>
						<td>Bukti</td>
						<td>Status</td>
					</tr>
					<?php if(empty($transaksi)){ ?>
					<tr>
						<td colspan="4"><i>Tidak ada data</i></td>
					</tr>
					<?php } ?>

					<?php $no=1; foreach($transaksi as $rs): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td>
							<?= $rs->pembeli()->nama_lengkap ?>
						</td>
						<td>
							<?= $rs->product()->nama ?>
							<br>
							Harga : Rp. <b><?=number_format($rs->product()->harga)?></b> 
						</td>
						<td>
							<?php if(empty($rs->bukti)){ ?>
								Bukti belum di kirim
							<?php }else{ ?>
								<a href="<?= base_url() ?>/uploads/<?= $rs->bukti ?>" class="btn btn-success"><i class="fa fa-eye"></i> Lihat Bukti</a>
							<?php } ?>
						</td>
						<td>
							<?= 
								$rs->status == 1 ? 'Bukti DP Belum dikirim'    :
								($rs->status == 2 ? 'Bukti DP Sudah dikirim'   : 
									($rs->status == 3 ? 'DP Sudah di terima'   : 
										($rs->status == 4 ? 'Bukti DP ditolak' : '')
									)
								)
							?>

							<?php if($rs->status ==  2){ ?>
								<br>
								<a href="<?= base_url() ?>/admin/transaksi/terima/<?= $rs->id ?>" class="btn btn-info">Terima Bukti</a>
								<a href="<?= base_url() ?>/admin/transaksi/tolak/<?= $rs->id ?>" class="btn btn-warning">Tolak Bukti</a>
							<?php } ?>
						</td>
					</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
