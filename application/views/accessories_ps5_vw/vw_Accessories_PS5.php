<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800 text-center"><?php echo $judul; ?></h1>
	<div class="row">
		<div class="col-md-6">
			<a href="<?= base_url('Accessories_PS5/create') ?>" class="btn btn-info mb-2">Create Accessories For PS5</a>
		</div>
		<div class="col-md-12">
			<?= $this->session->flashdata('message'); ?>
			<table class="table">
				<thead>
					<tr>
						<td>No</td>
						<td>Image</td>
						<td>Description</td>
						<td>Action</td>
					</tr>
				</thead>

				<tbody>`	
					<?php $i = 1; ?>
					<?php foreach ($accessories_ps5 as $us) : ?>
						<tr>
							<td><?= $i; ?>.</td>
							<td><img src="<?= base_url('assets/img/accessories_ps5/') . $us['image']; ?>" style="width: 100px;" class="img-thumbnail"></td>
							<td><?= $us['description']; ?></td>
							<td>
								<a href="<?= base_url('Accessories_PS5/delete/') . $us['id']; ?>" class="badge badge-danger">Delete</a>
								<a href="<?= base_url('Accessories_PS5/edit/') . $us['id']; ?>" class="badge badge-warning">Edit</a>
								<a href="<?= base_url('Accessories_PS5/detail/') . $us['id']; ?>" class="badge badge-info">Detail</a>

							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
