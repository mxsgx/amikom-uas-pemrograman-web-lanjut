<?php require_once $_ci_view_file.'components/header.php' ?>

<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Create Transaction</h2>
			</div>
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">
					<span class="d-none d-sm-inline">
						<a href="<?php echo base_url('transactions') ?>" class="btn btn-secondary">
							Cancel
						</a>
					</span>

					<a href="<?php echo base_url('transactions') ?>" class="btn btn-secondary d-sm-none btn-icon"
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
				<form action="<?php echo base_url('transactions/create') ?>" method="post" class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-md-6 mb-3">
								<label for="item" class="form-label required">Item Name</label>
								<select class="form-control <?php echo isset($errors['item_id']) ? 'is-invalid' : '' ?>"
									id="item" name="item_id" placeholder="Select item" required>
									<?php if ( ! empty($items)): ?>
										<?php foreach ($items as $item): ?>
											<option value="<?php echo $item['id'] ?>" <?php echo isset($old['item_id']) && $old['item_id'] === $item['id'] ? 'selected' : '' ?>><?php echo $item['name'] ?> (<?php echo $item['stock'] <= 0 ? 'Out of Stock' : 'In Stock' ?>)</option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
								<?php if (isset($errors['item_id'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['item_id'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
							<label for="supplier" class="form-label">Supplier Name</label>
								<select class="form-control <?php echo isset($errors['supplier_id']) ? 'is-invalid' : '' ?>"
									id="supplier" name="supplier_id" placeholder="Select supplier">
									<option value="">-</option>
									<?php if ( ! empty($suppliers)): ?>
										<?php foreach ($suppliers as $supplier): ?>
											<option value="<?php echo $supplier['id'] ?>" <?php echo isset($old['supplier_id']) && $old['supplier_id'] === $supplier['id'] ? 'selected' : '' ?>><?php echo $supplier['name'] ?></option>
										<?php endforeach ?>
									<?php endif ?>
								</select>
								<?php if (isset($errors['supplier_id'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['supplier_id'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label for="quantity" class="form-label required">Quantity</label>
								<input type="number"
									class="form-control <?php echo isset($errors['quantity']) ? 'is-invalid' : '' ?>"
									id="quantity" name="quantity" placeholder="Input quantity" required min="1"
									value="<?php echo isset($old['quantity']) ? $old['quantity'] : '1' ?>">
								<?php if (isset($errors['quantity'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['quantity'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label for="price" class="form-label">Price per Unit</label>
								<input type="number"
									class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : '' ?>"
									id="price" name="price" placeholder="Input price or leave it blank"
									value="<?php echo isset($old['price']) ? $old['price'] : '' ?>">
								<?php if (isset($errors['price'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['price'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label for="date" class="form-label required">Transaction Date</label>
								<input type="date"
									class="form-control <?php echo isset($errors['date']) ? 'is-invalid' : '' ?>"
									id="date" name="date" placeholder="Input transaction date" required min="0"
									value="<?php echo isset($old['date']) ? $old['date'] : date('Y-m-d') ?>">
								<?php if (isset($errors['date'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['date'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<label for="type" class="form-label required">Transaction Type</label>
								<select class="form-control <?php echo isset($errors['type']) ? 'is-invalid' : '' ?>"
									id="type" name="type" placeholder="Select type">
									<option value="in" <?php echo isset($old['type'])  && strtolower($old['type'])  === 'in' ? 'selected' : '' ?>>IN</option>
									<option value="out" <?php echo isset($old['type']) && strtolower($old['type']) === 'out' ? 'selected' : '' ?>>OUT</option>
								</select>
								<?php if (isset($errors['type'])): ?>
									<span class="invalid-feedback">
										<?php echo $errors['type'] ?>
									</span>
								<?php endif ?>
							</div>
							<div class="col-12 mb-3">
								<label for="description" class="form-label">Description</label>
								<textarea
									class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : '' ?>"
									id="description" name="description" rows="6"
									placeholder="Input transaction description"><?php echo isset($old['description']) ? $old['description'] : '' ?></textarea>
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
						<label class="form-check form-switch mb-0">
							<input class="form-check-input" type="checkbox" name="new">
							<span class="form-check-label">Save and Add New</span>
						</label>
						<button type="submit" class="btn btn-primary">Create</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once $_ci_view_file.'components/footer.php' ?>
