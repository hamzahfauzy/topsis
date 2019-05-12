<?php set_page("Transaksi"); $this->load("partial.header") ?>
<style type="text/css">
	.form-control { height: auto; }
</style>
<div class="container">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2>Transaksi</h2>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
					Petunjuk Pembayaran
				</button>
				<p></p>
			</div>
			<div class="col-sm-12">
				<table class="table table-bordered">
					<tr>
						<td>No</td>
						<td>Nama</td>
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
							<?= $rs->product()->nama ?>
							<br>
							Harga : Rp. <b><?=number_format($rs->product()->harga)?></b> 
						</td>
						<td>
							<?php if(empty($rs->bukti)){ ?>
							<form method="post" action="<?= base_url()?>/pembeli/upload" enctype="multipart/form-data">
								<input type="hidden" name="id" value="<?= $rs->id ?>">
								<label>Upload Bukti</label>
								<input type="file" name="bukti" required="" class="form-control">
								<button class="btn btn-info"><i class="fa fa-upload"></i> Upload</button>
							</form>
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
						</td>
					</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Petunjuk Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Lakukan transfer down payment (DP) ke Rekening : 23234456.13235.43.12342 an Ternak Rawang
        <br>
        Nb. Jika selama 3 hari pembayaran tidak di lunasi maka DP di anggap hangus
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load("partial.footer") ?>
