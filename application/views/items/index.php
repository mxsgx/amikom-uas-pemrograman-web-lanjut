<?php require_once $_ci_view_file.'components/header.php' ?>

<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Items</h2>
			</div>
			<?php if (strtolower($auth['user']['role']) === 'admin') : ?>
				<div class="col-auto ms-auto d-print-none">
					<div class="btn-list">
						<span class="d-none d-sm-inline">
							<a href="<?php echo base_url('items/add') ?>" class="btn btn-primary">
								Add Item
							</a>
						</span>

						<a href="<?php echo base_url('items/add') ?>" class="btn btn-primary d-sm-none btn-icon"
							aria-label="Add item">
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
									<th>Stock</th>
									<th>Buy Price</th>
									<th>Sell Price</th>
									<th class="w-1"></th>
								</tr>
							</thead>
							<tbody>
								<?php if ( ! empty($data)): ?>
									<?php foreach ($data as $item): ?>
										<tr>
											<td>
												<div><?php echo $item['name'] ?></div>
												<div class="text-secondary"><?php echo $item['sku'] ?></div>
											</td>
											<td class="text-secondary">
												<?php echo $item['stock'].' '.$item['unit'] ?>
											</td>
											<td>
												<div>
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
														stroke-linecap="round" stroke-linejoin="round"
														class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path
															d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
														<path d="M9 11v-5a3 3 0 0 1 6 0v5" />
													</svg>
													<span><?php echo $item['currency'].' '.number_format($item['buy_price'], 2) ?></spaN>
												</div>
											</td>
											<td>
												<div>
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
														stroke-linecap="round" stroke-linejoin="round"
														class="icon icon-tabler icons-tabler-outline icon-tabler-tag">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M7.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
														<path
															d="M3 6v5.172a2 2 0 0 0 .586 1.414l7.71 7.71a2.41 2.41 0 0 0 3.408 0l5.592 -5.592a2.41 2.41 0 0 0 0 -3.408l-7.71 -7.71a2 2 0 0 0 -1.414 -.586h-5.172a3 3 0 0 0 -3 3z" />
													</svg>
													<span><?php echo $item['currency'].' '.number_format($item['sell_price'], 2) ?></span>
												</div>
											</td>
											<td>
												<div class="btn-list flex-nowrap">
													<a href="<?php echo base_url('items/view/'.$item['id']) ?>"
														class="btn">View</a>
													<?php if (strtolower($auth['user']['role']) === 'admin') : ?>
														<a href="<?php echo base_url('items/edit/'.$item['id']) ?>"
															class="btn">Edit</a>
														<a href="<?php echo base_url('items/delete/'.$item['id']) ?>"
															class="btn btn-outline-danger">Delete</a>
													<?php endif ?>
												</div>
											</td>
										</tr>
									<?php endforeach ?>
								<?php else: ?>
									<tr>
										<td colspan="4" class="text-center">No items</td>
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
