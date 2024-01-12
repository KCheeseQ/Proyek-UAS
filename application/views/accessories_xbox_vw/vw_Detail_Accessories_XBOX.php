<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Details Accessories For XBOX Page</div>
				<div class="card-body">
					<img src="<?= base_url('assets/img/accessories_xbox/') . $accessories_xbox['image']; ?>" style="width: 100px;" class="img-thumbnail">
					<h6 class="card-subtitle mb-2 text-muted"><?= $accessories_xbox['description']; ?></h6>
				</div>
				<div class="card-footer justify-content-center">
					<a href="<?= base_url('Accessories_XBOX') ?>" class="btn btn-danger">Close</a>
				</div>
			</div>
		</div>
	</div>
</div>
