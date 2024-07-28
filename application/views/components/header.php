<?php require_once $_ci_view_file . 'components/base_header.php'; ?>

<div class="page">
	<header class="navbar navbar-expand-md d-print-none">
		<div class="container-xl">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
				aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
				<a href="<?php echo base_url() ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="110" height="32" viewBox="0 0 232 68"
						class="navbar-brand-image">
						<path
							d="M64.6 16.2C63 9.9 58.1 5 51.8 3.4 40 1.5 28 1.5 16.2 3.4 9.9 5 5 9.9 3.4 16.2 1.5 28 1.5 40 3.4 51.8 5 58.1 9.9 63 16.2 64.6c11.8 1.9 23.8 1.9 35.6 0C58.1 63 63 58.1 64.6 51.8c1.9-11.8 1.9-23.8 0-35.6zM33.3 36.3c-2.8 4.4-6.6 8.2-11.1 11-1.5.9-3.3.9-4.8.1s-2.4-2.3-2.5-4c0-1.7.9-3.3 2.4-4.1 2.3-1.4 4.4-3.2 6.1-5.3-1.8-2.1-3.8-3.8-6.1-5.3-2.3-1.3-3-4.2-1.7-6.4s4.3-2.9 6.5-1.6c4.5 2.8 8.2 6.5 11.1 10.9 1 1.4 1 3.3.1 4.7zM49.2 46H37.8c-2.1 0-3.8-1-3.8-3s1.7-3 3.8-3h11.4c2.1 0 3.8 1 3.8 3s-1.7 3-3.8 3z"
							fill="#066fd1" style="fill: var(--tblr-primary, #066fd1)"></path>
					</svg>
				</a>
			</div>
			<div class="navbar-nav flex-row order-md-last">
				<div class="nav-item dropdown">
					<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
						aria-label="Open user menu">
						<span
							class="avatar avatar-sm"><?php echo $auth['logged_in'] ? substr($auth['user']['name'], 0, 1) : '?' ?></span>
						<div class="d-none d-xl-block ps-2">
							<div><?php echo $auth['logged_in'] ? $auth['user']['name'] : 'Guest' ?></div>
							<div class="mt-1 small text-secondary">
								<?php echo $auth['logged_in'] ? $auth['user']['name'] : 'Login First' ?>
							</div>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
						<?php if ($auth['logged_in']) { ?>
							<a href="#" class="dropdown-item">Profile</a>
							<div class="dropdown-divider"></div>
							<a href="<?php echo base_url('/auth/logout') ?>" class="dropdown-item">Logout</a>
						<?php } else { ?>
							<a href="<?php echo base_url('/auth/login') ?>" class="dropdown-item">Login</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</header>

	<header class="navbar-expand-md">
		<div class="navbar-collapse collapse" id="navbar-menu" style="">
			<div class="navbar">
				<div class="container-xl">
					<div class="row flex-fill align-items-center">
						<div class="col">
							<ul class="navbar-nav">
								<li class="nav-item <?php echo isset($active_page) && $active_page === 'dashboard' ? 'active' : '' ?>">
									<a class="nav-link" href="<?php echo base_url() ?>">
										<span
											class="nav-link-icon d-md-none d-lg-inline-block">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round" class="icon">
												<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
												<path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
												<path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
												<path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
											</svg>
										</span>
										<span class="nav-link-title">
											Home
										</span>
									</a>
								</li>

								<li class="nav-item <?php echo isset($active_page) && $active_page === 'suppliers' ? 'active' : '' ?>">
									<a class="nav-link" href="<?php echo base_url('suppliers') ?>">
										<span
											class="nav-link-icon d-md-none d-lg-inline-block">
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
										<span class="nav-link-title">
											Suppliers
										</span>
									</a>
								</li>


								<li class="nav-item <?php echo isset($active_page) && $active_page === 'items' ? 'active' : '' ?>">
									<a class="nav-link" href="<?php echo base_url('items') ?>">
										<span
											class="nav-link-icon d-md-none d-lg-inline-block">
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
										<span class="nav-link-title">
											Items
										</span>
									</a>
								</li>
								<li class="nav-item <?php echo isset($active_page) && $active_page === 'transactions' ? 'active' : '' ?>">
									<a class="nav-link" href="<?php echo base_url('transactions') ?>">
										<span
											class="nav-link-icon d-md-none d-lg-inline-block">
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
										<span class="nav-link-title">
											Transactions
										</span>
									</a>
								</li>
								<?php if (strtolower($auth['user']['role']) === '') : ?>
									<li class="nav-item <?php echo isset($active_page) && $active_page === 'users' ? 'active' : '' ?>">
										<a class="nav-link" href="<?php echo base_url('users') ?>">
											<span
												class="nav-link-icon d-md-none d-lg-inline-block">
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
											<span class="nav-link-title">
												Users
											</span>
										</a>
									</li>
								<?php endif ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="page-wrapper">
		<?php require_once $_ci_view_file.'components/notifications.php'; ?>
