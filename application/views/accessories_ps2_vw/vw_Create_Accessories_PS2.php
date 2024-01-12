<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header justify-content-center">Create Accessories For PS2 Form</div>

				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="image">Image</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="image" id="image">
								<label for="image" class="custom-file-label">Choose File</label>
							</div>
						</div>

						<div class="form-group">
							<label for="description">Description</label>
							<input name="description" type="text" value="<?= set_value('description'); ?>" class="form-control" id="description" placeholder="Add a description">
							<?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<!-- Add the submit button here -->
						<button type="submit" name="create" class="btn btn-primary float-right">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
