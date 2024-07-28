<?php require_once $_ci_view_file.'components/header.php' ?>

<div class="page-header">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h2 class="page-title"><?php echo $data['supplier']['name'] ?></h2>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			<div class="col-12">
				<div class="card">
					<div class="card-header">Supplier Information</div>
					<div class="card-body">
						<div class="datagrid">
							<div class="datagrid-item">
								<div class="datagrid-title">Supplier Name</div>
								<div class="datagrid-content"><?php echo $data['supplier']['name'] ?></div>
							</div>
							<div class="datagrid-item">
								<div class="datagrid-title">Contact</div>
								<div class="datagrid-content"><?php echo $data['supplier']['contact'] ?></div>
							</div>
							<div class="datagrid-item">
								<div class="datagrid-title">Address</div>
								<div class="datagrid-content"><?php echo $data['supplier']['address'] ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-header">Transactions History</div>
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
								<?php if ( ! empty($data['transactions'])): ?>
									<?php foreach ($data['transactions'] as $transaction): ?>
										<tr>
											<td><?php echo $transaction['date'] ?></td>
											<td>
												<div><?php echo $transaction['item_name'] ?></div>
												<?php if (strtolower($transaction['type']) === 'in'): ?>
													<div class="text-secondary">Supplier:
														<?php echo $transaction['supplier_name'] ?></div>
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
										<td colspan="7" class="text-center">No transactions</td>
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
