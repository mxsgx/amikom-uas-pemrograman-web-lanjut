<?php require_once $_ci_view_file.'components/header.php' ?>

<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Suppliers</h2>
			</div>
			<?php if (strtolower($auth['user']['role']) === 'admin') : ?>
				<div class="col-auto ms-auto d-print-none">
					<div class="btn-list">
						<span class="d-none d-sm-inline">
							<a href="<?php echo base_url('suppliers/add') ?>" class="btn btn-primary">
								Add Supplier
							</a>
						</span>

						<a href="<?php echo base_url('suppliers/add') ?>" class="btn btn-primary d-sm-none btn-icon"
							aria-label="Add supplier">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
								class="icon">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<path d="M12 5l0 14"></path>
								<path d="M5 12l14 0"></path>
							</svg>
						</a>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			<div class="col-12">
				<div class="card">
					<div class="table-responsive">
						<table class="table table-vcenter card-table table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Contact</th>
									<th>Address</th>
									<th class="w-1"></th>
								</tr>
							</thead>
							<tbody>
								<?php if ( ! empty($data)): ?>
									<?php foreach ($data as $supplier): ?>
										<tr>
											<td><?php echo $supplier['name'] ?></td>
											<td class="text-secondary">
												<?php echo $supplier['contact'] ?>
											</td>
											<td class="text-secondary">
												<?php echo $supplier['address'] ?>
											</td>
											<td>
												<div class="btn-list flex-nowrap">
													<a href="<?php echo base_url('suppliers/view/'.$supplier['id']) ?>"
														class="btn">View</a>
													<?php if (strtolower($auth['user']['role']) === 'admin') : ?>
														<a href="<?php echo base_url('suppliers/edit/'.$supplier['id']) ?>"
															class="btn">Edit</a>
														<a href="<?php echo base_url('suppliers/delete/'.$supplier['id']) ?>"
															class="btn btn-outline-danger">Delete</a>
													<?php endif ?>
												</div>
											</td>
										</tr>
									<?php endforeach ?>
								<?php else: ?>
									<tr>
										<td colspan="4" class="text-center">No suppliers</td>
									</tr>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once $_ci_view_file.'components/footer.php' ?>
