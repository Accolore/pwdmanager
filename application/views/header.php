<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PWD Manager</title>  
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">

	<link rel="icon" href="<?php echo base_url('assets/images/logo_small_icon_only_inverted.png'); ?>" sizes="300x300" type="image/png">
	<link rel="icon" href="<?php echo base_url('assets/images/logo_small_icon_only_inverted.png'); ?>">
</head>

<nav class="navbar sticky-top navbar-light bg-light">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
			<img src="<?php echo base_url("assets/images/logo_small_icon_only_inverted.png"); ?>" alt="PWD Manager" height="42">
		</a>
		<div class="d-flex justify-content-end">
			<div class="input-group">
				<button type="button" class="btn btn-outline-primary fas fa-search" id="search-trigger" title="Search"></button>
				<a class="btn btn-outline-primary" href="<?php echo base_url("items/list"); ?>" title="Reset"><i class="fas fa-sync"></i></a>
				<button type="button" class="btn btn-outline-success fas fa-plus" id="insert-trigger" title="Add New"></button>
				<a class="btn btn-outline-dark" href="<?php echo base_url("login/logout"); ?>" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
			</div>
		</div>
		<form id="search-form" class="d-none mt-3 w-100" action="<?php echo base_url('items/list/');?>" method="post">
			<div class="input-group">
				<input type="search" class="form-control" placeholder="What are you looking for?" id="title" name="title" value="<?php echo set_value('title', ''); ?>" aria-label="Cerca">
				<button type="submit" class="btn btn-outline-primary" title="Search"><i class="fas fa-search" ></i></button>
			</div>
		</form>
		<form id="insert-form" class="d-none mt-3 w-100" action="<?php echo base_url('items/edit/');?>" method="post">
			<input type="text" name="title" class="form-control mb-2" placeholder="Title" />
			<input type="text" name="username" class="form-control mb-2" placeholder="Username" />
			<input type="text" name="password" class="form-control mb-2" placeholder="Password" />
			<input type="text" name="url" class="form-control mb-2" placeholder="Url" />
			<textarea class="form-control mb-2" name="note" rows="3" placeholder="Notes"></textarea>
			<div class="d-grid">
				<button type="submit" class="btn btn-lg btn-outline-success fas fa-plus" title="Save"></button>
			</div>
		</form>
	</div>
</nav>
<script>
	document.getElementById('search-trigger').addEventListener('click', event => {	
		event.preventDefault();
		const search_form = document.getElementById('search-form');

		document.getElementById('insert-form').classList.add('d-none');
		document.getElementById('insert-trigger').classList.remove('fa-minus');
		document.getElementById('insert-trigger').classList.add('fa-plus');

		if (search_form.classList.contains('d-none')) {
			// visualizzo la form
			search_form.classList.remove('d-none');
			event.target.classList.remove('fa-search');
			event.target.classList.add('fa-minus');

			search_form.elements[0].focus();
		} else {
			// nascondo la form
			search_form.classList.add('d-none');
			event.target.classList.remove('fa-minus');
			event.target.classList.add('fa-search');
		}
	});

	document.getElementById('insert-trigger').addEventListener('click', event => {	
		event.preventDefault();
		const insert_form = document.getElementById('insert-form');

		document.getElementById('search-form').classList.add('d-none');
		document.getElementById('search-trigger').classList.remove('fa-minus');
		document.getElementById('search-trigger').classList.add('fa-search');
		
		if (insert_form.classList.contains('d-none')) {
			// visualizzo la form
			insert_form.classList.remove('d-none');
			event.target.classList.remove('fa-plus');
			event.target.classList.add('fa-minus');

			insert_form.elements[0].focus();
		} else {
			// nascondo la form
			insert_form.classList.add('d-none');
			event.target.classList.remove('fa-minus');
			event.target.classList.add('fa-plus');
		}
	});
</script>
<div class="container-fluid">