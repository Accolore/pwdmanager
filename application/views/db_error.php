<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PWD Manager</title>  
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
			Database error
		</div>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-12">
			<p>The application database tables does not exists.</p>
			<p>Run <code>DATABASE_SETUP.sql</code> in you MySQL to create the database and the default user with the following credentials.</p>
			<p>Usermane: <code>admin</code></p>
			<p>Password: <code>admin</code></p>
			<div class="d-grid d-block mb-3">
				<a href="<?php echo base_url("login/access"); ?>" class="btn btn-lg btn-outline-primary"><i class="fas fa-sign-in-alt"></i> Go to login</a>
			</div>
		</div>
	</div>
</div>
<div class="text-center">
		<p class="text-muted">&copy; 2021</p>
	</div>
</div>
</body>
</html>