<?php require_once $_ci_view_file.'components/header.php' ?>

<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title">Transactions</h2>
			</div>
			<?php if (strtolower($auth['user']['role']) === 'admin') : ?>
				<div class="col-auto ms-auto d-print-none">
					<div class="btn-list">
						<span class="d-none d-sm-inline">
							<a href="<?php echo base_url('transactions/create') ?>" class="btn btn-primary">
								Add Transaction
							</a>
						</span>

						<a href="<?php echo base_url('transactions/create') ?>" class="btn btn-primary d-sm-none btn-icon"
							aria-label="Add transaction">
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
									<th>Date</th>
									<th>Item Name</th>
									<th class="text-center">Transaction Type</th>
									<th class="text-center">Quantity</th>
									<th>Price</th>
									<th>Total</th>
									<th class="w-1"></th>
								</tr>
							</thead>
							<tbody>
								<?php if ( ! empty($data)): ?>
									<?php foreach ($data as $transaction): ?>
										<tr>
											<td><?php echo $transaction['date'] ?></td>
											<td>
												<div><?php echo $transaction['item_name'] ?></div>
												<?php if (strtolower($transaction['type']) === 'in'): ?>
													<div class="text-secondary">Supplier: <?php echo $transaction['supplier_name'] ?></div>
												<?php endif ?>
											</td>
											<td class="text-center">
												<?php echo strtoupper($transaction['type']) ?>
											</td>
											<td class="text-secondary text-center">
												<?php echo $transaction['quantity'] ?>
											</td>
											<td>
												<?php echo $transaction['currency'].' '.number_format($transaction['price'], 2) ?>
											</td>
											<td>
												<?php echo $transaction['currency'].' '.number_format($transaction['total_price'], 2) ?>
											</td>
											<td>
												<!-- -->
											</td>
										</tr>
									<?php endforeach ?>
								<?php else: ?>
									<tr>
										<td colspan="6" class="text-center">No transactions</td>
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
