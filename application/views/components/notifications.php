<?php if ( ! empty($notifications) && is_array($notifications)) : ?>
	<div class="container-xl">
		<?php foreach ($notifications as $notification) : ?>
			<div class="alert alert-<?php echo $notification['type'] ?> alert-dismissible mt-2 mb-0" role="alert">
				<div class="d-flex">
				<div>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 9h.01"></path><path d="M11 12h1v4h1"></path></svg>
				</div>
				<div>
					<?php echo $notification['message'] ?>
				</div>
				</div>
				<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
			</div>
		<?php endforeach ?>
	</div>
<?php endif ?>
