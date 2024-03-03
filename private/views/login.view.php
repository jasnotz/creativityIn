<?php $this->view('includes/header')?>
	
	<div class="container-fluid">
		
	<form method="post">
		<div class="border p-4 mx-auto mr-4 rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
			<img src="<?=ROOT?>/assets/logo-text.png" class="d-block mx-auto" style="width:175px;">
			<img src="<?=ROOT?>/assets/logo.jpg" class="border border-primary d-block mx-auto rounded-circle" style="width:100px;">
	<br>
			<?php if(count($errors) > 0):?>
			<div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
			  <strong>Errors:</strong>
			   <?php foreach($errors as $error):?>
			  	<br><?=$error?>
			  <?php endforeach;?>
			  <span  type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </span>
			</div>
			<?php endif;?>
			
			<input class="form-control" value="<?=get_var('email')?>" type="email" name="email" placeholder="Email" autofocus autocomplete="off">
			<br>
			<input class="form-control" value="<?=get_var('password')?>" type="password" name="password" placeholder="Password">
			<br>
			<button class="btn" style="background-color: #ece8d2; color: #5a5226;">Login</button>
		</div>
		<div>
			<?php include_once("../private/views/includes/crowling.php") ?>
		</div>
	</form>
	</div>

<?php $this->view('includes/footer')?>