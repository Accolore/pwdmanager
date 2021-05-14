<div class="d-none"><?php echo $this->pagination->create_links(); ?></div>
<div id="items-wrapper">
	<?php //$count = 1; ?>
	<?php if ($items) : ?>
		<?php foreach ($items as $value) : ?>
			<?php $text_truncate = 1000; ?>
			<?php //$border_class = ($count % 2) ? 'border-secondary' : 'border-dark'; ?>
			<div class="item mb-2 mt-2 pb-2 border-bottom border-secondary">
				<div class="row">
					<div class="col-8">
						<h5 class="title"><?php echo $value['title']; ?></h5>
					</div>
					<div class="col-4 text-end">
						<div class="btn-group">
							<button class="btn btn-sm btn-outline-warning edit-trigger fas fa-edit" data-id="<?php echo $value['id'] ?>" title="Edit"></button>
							<a href="#" class="btn btn-sm btn-outline-danger delete-button" data-id="<?php echo $value['id'] ?>" title="Delete"><i class="fas fa-times"></i></a>
						</div>
					</div>
				</div>
				<div class="mt-2" id="item-data-<?php echo $value['id'] ?>">
					<?php if ($value['username'] != '') : ?>
						<div class="row">
							<div class="col-1">
								<span class="badge bg-info"><i class="fas fa-user"></i></span>
							</div>
							<div class="col-11">
								<a href="#" class="code copy-usr-button" data-usr="<?php echo $value['username'] ?>" title="Copy Username"><?php echo $value['username']; ?></a>
							</div>
						</div>
						<?php /*
						<div class="row">
							<div class="col-12">
								<a href="#" class="code copy-usr-button" data-usr="<?php echo $value['username'] ?>" title="Sopy Username">
									<span class="badge bg-success"><i class="fas fa-user"></i> <?php echo $value['username']; ?></span>
								</a>
							</div>
						</div>
						*/ ?>
					<?php endif; ?>
					<?php if ($value['password'] != '') : ?>
						<div class="row">
							<div class="col-1">
								<span class="badge bg-info"><i class="fas fa-key"></i></span>
							</div>
							<div class="col-11">
								<a href="#" class="code copy-pwd-button" data-pwd="<?php echo $value['password'] ?>" title="Copy Password"><?php echo $value['password']; ?></a>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($value['url'] != '') : ?>
						<div class="row">
							<div class="col-1">
								<span class="badge bg-info"><i class="fas fa-globe"></i></span>
							</div>
							<div class="col-11">
								<?php $url = strlen($value['url']) <= $text_truncate ? $value['url'] : substr($value['url'], 0, $text_truncate-3) . '...' ?>
								<?php if (filter_var($value['url'], FILTER_VALIDATE_URL) === FALSE) : ?>
									<span class="code"><?php echo $url; ?></span>
								<?php else : ?>
									<a href="<?php echo $value['url']; ?>" class="code" target="_blank" title="Go to URL"><?php echo $url; ?></a>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>				
					<?php if ($value['note'] != '') : ?>
						<div class="row mb-2">
							<div class="col-1">
								<span class="badge bg-info"><i class="fas fa-pencil-alt"></i></span>
							</div>
							<div class="col-11"><span class="code"><?php echo nl2br($value['note']); ?></span></div>
						</div>
					<?php endif; ?>
				</div>
				<form method="post" class="closed d-none mt-3" id="edit-form-<?php echo $value['id'] ?>" action=<?php echo base_url('items/edit/') . $value['id']; ?>>
					<div class="d-grid d-block mb-2">
						<div class="form-floating mb-2">
							<input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $value['title'];?>" />
							<label for="title">Title</label>
						</div>
						<div class="form-floating mb-2">
							<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $value['username'];?>" />
							<label for="username">Username</label>
						</div>
						<div class="form-floating mb-2">
							<input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $value['password'];?>" />
							<label for="password">Password</label>
						</div>
						<div class="form-floating mb-2">
							<input type="text" name="url" class="form-control" placeholder="Url" value="<?php echo $value['url'];?>" />
							<label for="url">Url</label>
						</div>
						<textarea class="form-control mb-2" name="note" rows="3" placeholder="Notes"><?php echo  $value['note']; ?></textarea>
						<button type="submit" class="btn btn-outline-success" title="Salva"><i class="fas fa-check"></i> Save</button>
					</div>
				</form>
			</div>
			<?php //$count++; ?>
		<?php endforeach; ?>
	<?php else : ?>
		<div class="row mt-5">
			<div class="col-12 text-center">
				<i class="fas fa-3x fa-exclamation-triangle text-warning"></i>
				<h1 class="title">No result found</h1>
				</div>
	<?php endif; // if ($items) : ?>
</div>

<?php /*
<div class="page-load-status">
	<h3 class="infinite-scroll-last">Fine</h3>
	<h3 class="infinite-scroll-error">Errore</h3>
</div>
*/ ?>

<?php /* <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script> */ ?>
<script>
	const copyToClipboard = str => {
		const el = document.createElement('textarea');
		el.value = str;
		el.setAttribute('readonly', '');
		el.style.position = 'absolute';
		el.style.left = '-9999px';
		document.body.appendChild(el);
		el.select();
		document.execCommand('copy');
		document.body.removeChild(el);
	};

	document.querySelectorAll('.copy-pwd-button').forEach(item => {
		item.addEventListener('click', event => {	
			event.preventDefault();
			copyToClipboard(item.getAttribute('data-pwd'));
			//alert('Password saved in clipboard.')
		});
	});

	document.querySelectorAll('.copy-usr-button').forEach(item => {
		item.addEventListener('click', event => {	
			event.preventDefault();
			copyToClipboard(item.getAttribute('data-usr'));
			//alert('Username saved in clipboard.')
		});
	});	

	document.querySelectorAll('.delete-button').forEach(item => {
		item.addEventListener('click', event => {
			event.preventDefault();	
			var domanda = confirm("Are you sure you want to proceed?");
			if (domanda) {
				window.location.href = "<?php echo base_url('items/delete/'); ?>" + item.getAttribute('data-id');
			}
		});
	});

	document.querySelectorAll('.edit-trigger').forEach(item => {
		item.addEventListener('click', event => {		
			let edit_form = document.getElementById("edit-form-" + item.getAttribute('data-id'));
			let description = document.getElementById("item-data-" + item.getAttribute('data-id'));

			if (edit_form.classList.contains('closed')) {
				edit_form.classList.remove('d-none');
				description.classList.add('d-none');
				edit_form.classList.remove('closed');
				edit_form.classList.add('open');

				item.classList.add('fa-minus');
				item.classList.remove('fa-edit');

				edit_form.elemets[0].focus();
			} else {

				edit_form.classList.add('d-none');
				description.classList.remove('d-none');
				edit_form.classList.remove('open');
				edit_form.classList.add('closed');

				item.classList.remove('fa-minus');
				item.classList.add('fa-edit');
			}
		});
	});
</script>