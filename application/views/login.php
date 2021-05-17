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
<body> 
	<div class="container">
		<div class="text-center mb-4 mt-4">
			<img src="<?php echo base_url('assets/images/logo_small.png'); ?>" alt="PWD Manager" width="250px">
		</div>
		<form method="post" action="<?php echo base_url('login/access/'); ?>">
			<div class="form-floating mb-3">
				<input type="text" name="username" class="form-control form-control-lg" placeholder="Username"/>
				<label for="name">User</label>
				<span class="text-danger"><?php echo form_error('username'); ?></span>
			</div>
			<div class="form-floating mb-3">
				<input type="password" name="password" class="form-control form-control-lg" placeholder="Password" />
				<label for="password">Password</label>
				<span class="text-danger"><?php echo form_error('password'); ?></span>
			</div>
			<div class="d-grid d-block mb-3">
				<button type="submit" class="btn btn-lg btn-outline-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
				<?php /* <input type="submit" name="insert" value="Login" class="btn btn-lg btn-light" /> */ ?>
			</div>
			<?php $error = $this->session->flashdata("error"); ?>
			<?php if ($error): ?>
				<div class="mb-3">
					<p class="text-danger text-center"><?php echo $error; ?></p>
				</div>
			<?php endif; ?>
		</form>
		<div class="text-center">
			<p class="text-muted">GPL License - 2021</p>
		</div>
	</div>
</body>
</html>