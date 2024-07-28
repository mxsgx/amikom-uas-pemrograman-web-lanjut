<?php require_once $_ci_view_file.'components/base_header.php'; ?>

<div class="page page-center">
	<div class="container container-tight py-4">
		<div class="card card-md">
			<div class="card-body">
				<h2 class="h2 text-center mb-4">Login to your account</h2>
				<form action="<?php echo base_url('auth/login') ?>" method="post" autocomplete="off">
					<div class="mb-3">
						<label for="username" class="form-label">Username</label>
						<input type="text" name="username" id="username" class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : '' ?>" placeholder="Your username">
						<?php if (isset($errors['username'])) : ?>
							<span class="invalid-feedback">
								<?php echo $errors['username'] ?>
							</span>
						<?php endif ?>
					</div>
					<div class="mb-4">
						<label for="password" class="form-label">Password</label>
						<input type="password" name="password" id="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>" placeholder="Your password">
						<?php if (isset($errors['password'])) : ?>
							<span class="invalid-feedback">
								<?php echo $errors['password'] ?>
							</span>
						<?php endif ?>
					</div>
					<div>
						<button type="submit" class="btn btn-primary w-100">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once $_ci_view_file.'components/base_footer.php'; ?>
