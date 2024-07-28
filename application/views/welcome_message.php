<?php require_once $_ci_view_file.'components/header.php'; ?>

<div class="page-header">
	<div class="container-xl">
		<div class="row">
			<div class="col">
				<div class="page-pretitle">
					Overview
				</div>
				<h2 class="page-title">
					Dashboard
				</h2>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">
			<div class="col-12">
				<div class="row row-cards">
					<div class="col-sm-6 col-lg-3">
						<div class="card card-sm">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-auto">
										<span
											class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="icon icon-tabler icons-tabler-outline icon-tabler-cash-register">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<path
													d="M21 15h-2.5c-.398 0 -.779 .158 -1.061 .439c-.281 .281 -.439 .663 -.439 1.061c0 .398 .158 .779 .439 1.061c.281 .281 .663 .439 1.061 .439h1c.398 0 .779 .158 1.061 .439c.281 .281 .439 .663 .439 1.061c0 .398 -.158 .779 -.439 1.061c-.281 .281 -.663 .439 -1.061 .439h-2.5" />
												<path d="M19 21v1m0 -8v1" />
												<path
													d="M13 21h-7c-.53 0 -1.039 -.211 -1.414 -.586c-.375 -.375 -.586 -.884 -.586 -1.414v-10c0 -.53 .211 -1.039 .586 -1.414c.375 -.375 .884 -.586 1.414 -.586h2m12 3.12v-1.12c0 -.53 -.211 -1.039 -.586 -1.414c-.375 -.375 -.884 -.586 -1.414 -.586h-2" />
												<path
													d="M16 10v-6c0 -.53 -.211 -1.039 -.586 -1.414c-.375 -.375 -.884 -.586 -1.414 -.586h-4c-.53 0 -1.039 .211 -1.414 .586c-.375 .375 -.586 .884 -.586 1.414v6m8 0h-8m8 0h1m-9 0h-1" />
												<path d="M8 14v.01" />
												<path d="M8 17v.01" />
												<path d="M12 13.99v.01" />
												<path d="M12 17v.01" />
											</svg>
										</span>
									</div>
									<div class="col">
										<div class="font-weight-medium">
											<?php echo $data['transactions_count'] ?> Transactions
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="card card-sm">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-auto">
										<span
											class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="icon icon-tabler icons-tabler-outline icon-tabler-truck-delivery">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
												<path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
												<path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
												<path d="M3 9l4 0" />
											</svg>
										</span>
									</div>
									<div class="col">
										<div class="font-weight-medium">
											<?php echo $data['suppliers_count'] ?> Suppliers
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="card card-sm">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-auto">
										<span
											class="bg-x text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-x -->
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="icon icon-tabler icons-tabler-outline icon-tabler-box">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
												<path d="M12 12l8 -4.5" />
												<path d="M12 12l0 9" />
												<path d="M12 12l-8 -4.5" />
											</svg>
										</span>
									</div>
									<div class="col">
										<div class="font-weight-medium">
											<?php echo $data['items_count'] ?> Items
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="card card-sm">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-auto">
										<span
											class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round"
												class="icon icon-tabler icons-tabler-outline icon-tabler-users">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
												<path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
												<path d="M16 3.13a4 4 0 0 1 0 7.75" />
												<path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
											</svg>
										</span>
									</div>
									<div class="col">
										<div class="font-weight-medium">
											<?php echo $data['users_count'] ?> Users
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once $_ci_view_file.'components/footer.php'; ?>
