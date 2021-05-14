<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Security</title>  
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">

	<link rel="icon" href="<?php echo base_url('assets/images/icon_accolore.png'); ?>" sizes="512x512" type="image/png">
	<link rel="icon" href="<?php echo base_url('assets/images/icon_accolore.png'); ?>">
</head>

<nav class="navbar sticky-top navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="#">
			<img src="<?php echo base_url("assets/images/logo_small_icon_only_inverted.png"); ?>" alt="PWD Manager" height="42">
		</a>
		<div class="d-flex justify-content-end">
			User creation
		</div>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-12">
			<form id="insert-form" class="mt-3 w-100" action="<?php echo base_url('setup/step1/');?>" method="post">
				<p>Insert username and password that will be created.</p>
				<input type="text" name="username" class="form-control mb-2" placeholder="Username" />
				<input type="text" name="password" class="form-control mb-2" placeholder="Password" />
				<p>Users can access to different "areas" where passwords are stored.</p>
				<p>A user that have access to area "1" cannot view the data stored in area "2"</p>
				<p>The default area is 1, but you can create multiple areas with multiple users, with separated data.</p>
				<input type="number" name="registry_id" class="form-control mb-2" placeholder="Area ID" value="1" />

				<div class="d-grid">
					<button type="submit" class="btn btn-lg btn-outline-success" title="Salva"><i class="fas fa-plus"></i> Create</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="text-center">
		<p class="text-muted">&copy; 2021</p>
	</div>
</div>
</body>
</html>