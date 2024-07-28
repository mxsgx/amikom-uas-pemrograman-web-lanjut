<?php require_once $_ci_view_file.'components/header.php' ?>

<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Add Item</h2>
			</div>
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">
					<span class="d-none d-sm-inline">
						<a href="<?php echo base_url('items') ?>" class="btn btn-secondary">
							Cancel
						</a>
					</span>

					<a href="<?php echo base_url('items') ?>" class="btn btn-secondary d-sm-none btn-icon"
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
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			<div class="col-12">
				<form action="<?php echo base_url('items/edit/'.$data['id']) ?>" method="post" class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-md-6 mb-3">
								<label for="name" class="form-label required">Item Name</label>
								<input type="text"
									class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : '' ?>"
									id="name" name="name" placeholder="Input item name" required
									value="<?php echo $data['name'] ?>">
								<?php if (isset($errors['name'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['name'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label for="sku" class="form-label required">Item SKU</label>
								<input type="text"
									class="form-control <?php echo isset($errors['sku']) ? 'is-invalid' : '' ?>"
									id="sku" name="sku" placeholder="Input item sku" required
									value="<?php echo $data['sku'] ?>">
								<?php if (isset($errors['sku'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['sku'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label for="stock" class="form-label required">Item Initial Stock</label>
								<input type="number"
									class="form-control <?php echo isset($errors['stock']) ? 'is-invalid' : '' ?>"
									id="stock" name="stock" placeholder="Input item initial stock" required min="0"
									value="<?php echo $data['stock'] ?>">
								<?php if (isset($errors['stock'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['stock'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label for="unit" class="form-label required">Item Unit Name</label>
								<input type="text"
									class="form-control <?php echo isset($errors['unit']) ? 'is-invalid' : '' ?>"
									id="unit" name="unit" placeholder="Input item unit name" required
									value="<?php echo $data['unit'] ?>">
								<?php if (isset($errors['unit'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['unit'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label for="buy-price" class="form-label required">Item Buy Price</label>
								<input type="number"
									class="form-control <?php echo isset($errors['buy_price']) ? 'is-invalid' : '' ?>"
									id="buy-price" name="buy_price" placeholder="Input item buy price" required min="0"
									value="<?php echo $data['buy_price'] ?>">
								<?php if (isset($errors['buy_price'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['buy_price'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label for="sell-price" class="form-label required">Item Sell Price</label>
								<input type="number"
									class="form-control <?php echo isset($errors['sell_price']) ? 'is-invalid' : '' ?>"
									id="sell-price" name="sell_price" placeholder="Input item sell price" required
									min="0" value="<?php echo $data['sell_price'] ?>">
								<?php if (isset($errors['sell_price'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['sell_price'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 mb-3">
								<label for="description" class="form-label required">Description</label>
								<textarea
									class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : '' ?>"
									id="description" name="description" rows="6" required
									placeholder="Input item description"><?php echo $data['description'] ?></textarea>
								<?php if (isset($errors['description'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['description'] ?>
									</span>
								<?php endif ?>
							</div>
						</div>
					</div>
					<div
						class="card-footer d-flex flex-column flex-md-row justify-content-md-end align-items-md-center gap-4">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once $_ci_view_file.'components/footer.php' ?>
