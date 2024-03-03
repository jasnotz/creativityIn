<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

<style>
	h1{
		font-size: 80px;
		color: limegreen;
	}

	a{
		text-decoration: none;
	}

	.card-header{
		font-weight: bold;
	}

	.card{
		min-width: 250px;
	}
</style>
	<div class="container-fluid p-4 mx-auto" style="max-width: 1000px;">
	 
	 	<div class="row justify-content-center ">

	 		<?php if(Auth::access('super_admin')):?>
		 		<div class="card col-3 rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/schools">
		 			<div class="card-header" style="color: #5a5226;">SCHOOLS</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-graduation-cap" style="color: #ece8d2;"></i>
		 			</h1>
		 			<div class="card-footer" style="color: #5a5226;">View all schools</div>
	 				</a>
		 		</div>
		 	<?php endif;?>

		 	<?php if(Auth::access('admin')):?>
		 		<div class="card col-3 rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/users">
		 			<div class="card-header" style="color: #5a5226;">STAFF</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-chalkboard-teacher" style="color: #ece8d2;"></i>
		 			</h1>
		 			<div class="card-footer" style="color: #5a5226;">View all staff members</div>
		 			</a>
		 		</div>
		 	<?php endif;?>

		 	<?php if(Auth::access('reception')):?>
		 		<div class="card col-3 rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/students">
		 			<div class="card-header" style="color: #5a5226;">STUDENTS</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-user-graduate" style="color: #ece8d2; border: black; border-width: 5px; "></i>
		 			</h1>
		 			<div class="card-footer" style="color: #5a5226;">View all students</div>
		 			</a>
		 		</div>
		 	<?php endif;?>

		 		<div class="card col-3 rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/classes">
		 			<div class="card-header" style="color: #5a5226;">CLASSES</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-university" style="color: #ece8d2;"></i>
		 			</h1>
		 			<div class="card-footer" style="color: #5a5226;">View all classes</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/tests">
		 			<div class="card-header" style="color: #5a5226;">TESTS</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-file-signature" style="color: #ece8d2;"></i>
		 			</h1>
		 			<div class="card-footer" style="color: #5a5226;">View all tests</div>
		 			</a>
		 		</div>

		 		<?php if(Auth::access('admin')):?>
		 		<div class="card col-3 rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/statistics">
		 			<div class="card-header" style="color: #5a5226;">STATISTICS</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-chart-pie" style="color: #ece8d2;"></i>
		 			</h1>
		 			<div class="card-footer" style="color: #5a5226;">View student statistics</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/settings">
		 			<div class="card-header" style="color: #5a5226;">SETTINGS</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-cogs" style="color: #ece8d2;"></i>
		 			</h1>
		 			<div class="card-footer" style="color: #5a5226;">View app settings</div>
		 			</a>
		 		</div>
		 		<?php endif;?>

		 		<div class="card col-3 rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/profile">
		 			<div class="card-header" style="color: #5a5226;">PROFILE</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-id-card" style="color: #ece8d2;"></i>
		 			</h1>
		 			<div class="card-footer" style="color: #5a5226;">View your profile</div>
		 			</a>
		 		</div>

		 		<div class="card col-3 rounded m-4 p-0 border">
	 				<a href="<?=ROOT?>/logout">
		 			<div class="card-header" style="color: #5a5226;">LOGOUT</div>
		 			<h1 class="text-center">
		 				<i class="fa fa-sign-out-alt" style="color: #ece8d2;"></i>
		 			</h1>
		 			<div class="card-footer" style="color: #5a5226;">Logout from the system</div>
	 				</a>
		 		</div>

	 	</div>
	</div>
 
<?php $this->view('includes/footer')?>
