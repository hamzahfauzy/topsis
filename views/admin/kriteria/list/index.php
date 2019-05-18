<?php set_page("Kriteria"); $this->load("partial.header") ?>
<div class="container">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2>Kriteria List <?= $kriteria->nama ?> (Bobot : <?= $kriteria->bobot?>)</h2>
				<a href="<?= base_url() ?>/admin/kriteria/list/<?=$kriteria->id?>/create" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah List Kriteria</a>
				<a href="<?= base_url() ?>/admin/kriteria" class="btn btn-warning">Kembali</a>
				<p></p>
			</div>
			<div class="col-sm-12">
				<table class="table table-bordered">
					<tr>
						<td>No</td>
						<td>Nama</td>
						<td>Aksi</td>
					</tr>
					<?php if(empty($kriteria->lists())){ ?>
					<tr>
						<td colspan="3"><i>Tidak ada data</i></td>
					</tr>
					<?php } ?>

					<?php $no=1; foreach($kriteria->lists() as $rs): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td>
							<?= $rs->list_label ?>
							<br>
							Nilai : <b><?=$rs->list_value?></b> 
						</td>
						<td>
							<a href="<?= base_url() ?>/admin/kriteria/list/<?=$kriteria->id?>/edit/<?=$rs->id?>" class="btn btn-sm btn-success"><i class="fa fa-pencil-alt"></i> Edit</a>
							<a href="<?= base_url() ?>/admin/kriteria/list/<?=$kriteria->id?>/delete/<?=$rs->id?>" class="btn btn-sm btn-warning"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
