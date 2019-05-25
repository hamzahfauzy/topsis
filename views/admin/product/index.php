<?php set_page("Products"); $this->load("partial.header") ?>
<div class="container">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2>Produk</h2>
				<a href="<?= base_url() ?>/admin/products/create" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Produk</a>
				<p></p>
			</div>
			<div class="col-sm-12">
				<table class="table table-bordered">
					<tr>
						<td>No</td>
						<td>Detail</td>
						<td>Aksi</td>
					</tr>
					<?php if(empty($products)){ ?>
					<tr>
						<td colspan="3"><i>Tidak ada data</i></td>
					</tr>
					<?php } ?>

					<?php $no=1; foreach($products as $rs): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td>
							<?= $rs->nama ?> (<i><?= $rs->kategori ?></i>)
							<br>
							Harga : Rp. <b><?= number_format($rs->harga)?></b> 
						</td>
						<td>
							<!-- <a href="<?= base_url() ?>/admin/kriteria/penilaian/<?=$rs->id?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> -->
							<a href="<?= base_url() ?>/admin/products/edit/<?=$rs->id?>" class="btn btn-sm btn-success"><i class="fa fa-pencil-alt"></i></a>
							<a href="<?= base_url() ?>/admin/products/delete/<?=$rs->id?>" class="btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
