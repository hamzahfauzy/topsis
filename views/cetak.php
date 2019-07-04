<div style="color: #999 !important;font-family: arial;padding: 10px;width: 900px;margin: auto;border: 1px solid #eaeaea;">
<table align="center" width="100%">
	<tr>
		<td>
			<img src="<?= $this->assets->get('assets/sapi.png') ?>" width="100px">
		</td>
		<td style="text-align: right;">
			<h2 style="margin-bottom: 0px;padding-bottom: 0px;">Penjualan Sapi Online</h2>
			<span style="font-size: 10px">Rawang Ternak Shop</span>
			<p>
				<span><b>Invoice</b> <a href="#">#<?= strtoupper(substr(md5($transaksi->id), 0, 6)) ?></a></span><br>
				<span><b>Tanggal</b> : <?= $transaksi->created_at ?></span><br>
			</p>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<h2 align="center">INVOICE</h2>

			<h4>Detail Pembeli</h4>
			<table width="100%" align="center" cellpadding="5">
				<tr>
					<td width="20%">Nama</td>
					<td><?= $transaksi->pembeli()->nama_lengkap ?></td>
				</tr>
				<tr style="background: #eaeaea;">
					<td>Alamat</td>
					<td><?= $transaksi->pembeli()->alamat ?></td>
				</tr>
				<tr>
					<td>No. Telepon</td>
					<td><?= $transaksi->pembeli()->no_telepon ?></td>
				</tr>
			</table>

			<h4>Detail Produk</h4>
			<table width="100%" align="center" cellpadding="5" border="0">
				<tr>
					<td width="20%">Nama Produk</td>
					<td><?= $transaksi->product()->nama ?></td>
				</tr>
				<tr style="background: #eaeaea;">
					<td>Deskripsi</td>
					<td><?= nl2br($transaksi->product()->deskripsi) ?></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td><?= $transaksi->product()->kategori ?></td>
				</tr>
				<tr style="background: #eaeaea;">
					<td>Harga</td>
					<td><b>Rp. <?= number_format($transaksi->product()->harga) ?></b></td>
				</tr>
			</table>

			<h4>Detail Transaksi</h4>
			<table width="100%" align="center" cellpadding="5" border="0">
				<tr>
					<td>Total Harga</td>
					<td><b>Rp. <?= number_format($transaksi->product()->harga) ?></b></td>
				</tr>
				<tr style="background: #eaeaea;">
					<td>Jumlah Transfer</td>
					<td><b>Rp. <?= number_format($transaksi->jumlah_transfer) ?></b></td>
				</tr>
				<tr>
					<td>Sisa Pembayaran</td>
					<td><b>Rp. <?= number_format($transaksi->product()->harga-$transaksi->jumlah_transfer) ?></b></td>
				</tr>
			</table>
			<p align="center">Down payment (DP) di transfer ke Rekening : <b>23234456.13235.43.12342</b> an Ternak Rawang</p> 
		</td>
	</tr>
</table>
</div>
<script type="text/javascript">
window.print()
</script>