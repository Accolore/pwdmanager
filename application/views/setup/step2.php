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
			<img src="<?php echo base_url("assets/images/icon_accolore.png"); ?>" alt="AccoLore" width="30">
			Step 2			
		</a>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-12">
			<form id="insert-form" class="mt-3 w-100" action="<?php echo base_url('items/step1/');?>" method="post">
				<p>Insert administration username and password that will be created.</p>
				<input type="text" name="username" class="form-control mb-2" placeholder="Utente" />
				<input type="text" name="password" class="form-control mb-2" placeholder="Password" />
				<div class="d-grid">
					<button type="submit" class="btn btn-lg btn-outline-success" title="Salva"><i class="fas fa-plus"></i> Salva</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>

	document.querySelectorAll('.copy-pwd-button').forEach(item => {
		item.addEventListener('click', event => {	
			event.preventDefault();
			copyToClipboard(item.getAttribute('data-pwd'));
			//alert('Password copiata negli appunti.')
		});
	});

	document.querySelectorAll('.copy-usr-button').forEach(item => {
		item.addEventListener('click', event => {	
			event.preventDefault();
			copyToClipboard(item.getAttribute('data-usr'));
			//alert('Utente copiato negli appunti.')
		});
	});	

	document.querySelectorAll('.delete-button').forEach(item => {
		item.addEventListener('click', event => {
			event.preventDefault();	
			var domanda = confirm("Sei sicuro?");
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
				// visualizzo la form
				edit_form.classList.remove('d-none');
				description.classList.add('d-none');
				edit_form.classList.remove('closed');
				edit_form.classList.add('open');
				// impostare icona del pulsante event.target "x"
				item.classList.add('fa-minus');
				item.classList.remove('fa-edit');

				edit_form.elemets[0].focus();
			} else {
				// nascondo la form
				edit_form.classList.add('d-none');
				description.classList.remove('d-none');
				edit_form.classList.remove('open');
				edit_form.classList.add('closed');
				// impostare icona del pulsante event.target "edit"
				item.classList.remove('fa-minus');
				item.classList.add('fa-edit');
			}
		});
	});

	/*
	var elem = document.querySelector('#items-wrapper');
	var infScroll = new InfiniteScroll( elem, {
		path   : '.pagination-next a',
		append : '.item',
		history: false,
		//status : '.page-load-status',
	});
	*/
</script>
<div class="text-center">
		<p class="text-muted">&copy; 2021</p>
	</div>
</div>
</body>
</html>