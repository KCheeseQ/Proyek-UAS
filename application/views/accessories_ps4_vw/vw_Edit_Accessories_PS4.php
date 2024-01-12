<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header justify-content-center">Create Accessories For PS4 Form</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $accessories_ps4['id']; ?>">
						<div class="form-group">
							<?php echo base_url('assets/img/accessories_ps4/') . $accessories_ps4['image']; ?>
							<img src="<?= base_url('assets/img/accessories_ps4/') . $accessories_ps4['image']; ?>" style="width: 100px;" class="img-thumbnail">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="image" id="image">
								<label for="image" class="custom-file-label">Choose File</label>
								<?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="description">Description</label>
							<input value="<?= $accessories_ps4['description']; ?>" name="description" type="text" class="form-control" id="description" placeholder="Add a description">
							<?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<!-- Add the submit button here -->
						<a href="<?= base_url('Accessories_PS4') ?>" class="btn btn-danger">Close</a>
						<button type="submit" name="create" class="btn btn-primary float-right">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
