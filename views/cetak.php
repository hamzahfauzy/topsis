<table align="center">
	<tr>
		<td>
			<img src="<?= $this->assets->get('assets/sapi.png') ?>" width="100px">
		</td>
		<td>
			<h2>Penjualan Sapi Online</h2>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<hr>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<h2 align="center">INVOICE</h2>
			<h4>Detail Transaksi</h4>
			<table width="300px" align="center" cellpadding="5" border="1">
				<tr>
					<td>Nama Produk</td>
					<td><?= $transaksi->product()->nama ?></td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td><?= $transaksi->product()->deskripsi ?></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td><?= $transaksi->product()->kategori ?></td>
				</tr>
				<tr>
					<td>Harga</td>
					<td><?= $transaksi->product()->harga ?></td>
				</tr>
			</table>
			<h4>Detail Pembeli</h4>
			<table width="300px" align="center" cellpadding="5" border="1">
				<tr>
					<td>Nama</td>
					<td><?= $transaksi->pembeli()->nama_lengkap ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><?= $transaksi->pembeli()->alamat ?></td>
				</tr>
				<tr>
					<td>No. Telepon</td>
					<td><?= $transaksi->pembeli()->no_telepon ?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<script type="text/javascript">
window.print()
</script>