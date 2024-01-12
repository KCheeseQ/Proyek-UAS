<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Details Games For PS5 Page</div>
				<div class="card-body">
					<img src="<?= base_url('assets/img/games_ps5/') . $games_ps5['image']; ?>" style="width: 100px;" class="img-thumbnail">
					<h6 class="card-subtitle mb-2 text-muted"><?= $games_ps5['description']; ?></h6>
				</div>
				<div class="card-footer justify-content-center">
					<a href="<?= base_url('Games_PS5') ?>" class="btn btn-danger">Close</a>
				</div>
			</div>
		</div>
	</div>
</div>
