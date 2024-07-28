<?php require_once $_ci_view_file . 'components/header.php' ?>

<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Edit "<?php echo $data['name'] ?>" Supplier</h2>
			</div>
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">
					<span class="d-none d-sm-inline">
						<a href="<?php echo base_url('suppliers') ?>" class="btn btn-secondary">
							Cancel
						</a>
					</span>

					<span class="d-none d-sm-inline">
						<a href="<?php echo base_url('suppliers/delete/' . $data['id']) ?>" class="btn btn-danger">
							Delete
						</a>
					</span>

					<a href="<?php echo base_url('suppliers') ?>" class="btn btn-secondary d-sm-none btn-icon"
						aria-label="Cancel">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
							<path stroke="none" d="M0 0h24v24H0z" fill="none" />
							<path d="M5 12l14 0" />
							<path d="M5 12l6 6" />
							<path d="M5 12l6 -6" />
						</svg>
					</a>

					<a href="<?php echo base_url('suppliers/delete/' . $data['id']) ?>"
						class="btn btn-danger d-sm-none btn-icon" aria-label="Delete">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
							<path stroke="none" d="M0 0h24v24H0z" fill="none" />
							<path d="M4 7l16 0" />
							<path d="M10 11l0 6" />
							<path d="M14 11l0 6" />
							<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
							<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			<div class="col-12">
				<form action="<?php echo base_url('suppliers/edit/' . $data['id']) ?>" method="post" class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-md-6 mb-3">
								<label for="name" class="form-label required">Supplier Name</label>
								<input type="text"
									class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : '' ?>"
									id="name" name="name" placeholder="Input supplier name" required
									value="<?php echo $data['name'] ?>">
								<?php if (isset($errors['name'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['name'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label for="contact" class="form-label required">Supplier Contact</label>
								<input type="text"
									class="form-control <?php echo isset($errors['contact']) ? 'is-invalid' : '' ?>"
									id="contact" name="contact" placeholder="Input supplier contact" required
									value="<?php echo $data['contact'] ?>">
								<?php if (isset($errors['contact'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['contact'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 mb-3">
								<label for="address" class="form-label required">Address</label>
								<textarea
									class="form-control <?php echo isset($errors['address']) ? 'is-invalid' : '' ?>"
									id="address" name="address" rows="6" required
									placeholder="Input supplier address"><?php echo $data['address'] ?></textarea>
								<?php if (isset($errors['address'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['address'] ?>
									</span>
								<?php endif ?>
							</div>
						</div>
					</div>
					<div
						class="card-footer d-flex flex-column flex-md-row justify-content-md-end align-items-md-center gap-4">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once $_ci_view_file . 'components/footer.php' ?>
