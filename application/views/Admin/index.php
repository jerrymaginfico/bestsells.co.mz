<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<html>
<head>
	<title>Admin Login | BestSells</title>

	<link rel="shortcut icon" href="<?=base_url('assets/image/shop.jpg') ?>">

		  	<!--font awesome css file Include-->
	 <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/plugins/fontawesome-free/css/all.min.css">

			<!--Material Icon -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

			<!-- Materialize file Include -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/materialize/css/materialize.css">


	<!--Custom .css file-->
	<style type="text/css">

		body{
			background: rgb(0,192,239);
		}

		#admin_username, #admin_password{
			border-bottom: 1px solid rgb(0,192,239);
			box-shadow: none;
		}

		#admin_username:focus + label, #admin_password:focus + label{
			color: rgb(0,192,239);
		}
		
	</style>

</head>
<body>
		<h5 class="center-align white-text thin" style="margin-top: 5%; margin-bottom: 2%;">ADMIN LOGIN</h5>

		<!--Login Form Start-->

		<div class="row white" style="padding: 10px; padding-bottom: 50px;">
			<br><br>
			<div class="col l1 m1 s12"></div>
			<div class="col l3 m3 s12" style="border:1px solid rgb(0,192,239)">
				<br>

				<?=form_open('Admin/Login');?>

				<!--Error MEssage Section Start-->
				<?php if($msg = $this->session->flashdata('msg')):?>

				<p class="red-text" style="font-size: 14px;"><?=$msg;?></p>
				<?php endif;?>
				<!--Error MEssage Section Start-->
				
				<div class="input-field">
					<input type="text" name="admin_username" id="admin_username" required>
					<label for="admin_username">Username</label>
				</div>

				<div class="input-field">
					<input type="password" name="admin_password" id="admin_password" required>
					<label for="admin_password">Password</label>
				</div>
				
				<a href="" style="font-size: 12px;">Forgot Password</a>
				<br><br>

				<center><button type="submit" class="btn waves-effect waves-light">Login</button></center>
				<?=form_close();?>
				<br><br>
			</div>
			<div class="col l7 m7 s12">
				<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				<div class="row">
					<div class="col l3 m3 s12">
						<center>
						<h1><span class="fa fa-users" style="color: rgb(0,192,239);"></span></h1>
						<h6 style="color: rgb(0,192,239);">Manage Users</h6>
						</center>
					</div>

					<div class="col l3 m3 s12">
						<center>
						<h1><span class="fa fa-users" style="color: rgb(0,192,239);"></span></h1>
						<h6 style="color: rgb(0,192,239);">Manage Sellers</h6>
						</center>
					</div>

					<div class="col l3 m3 s12">
						<center>
						<h1><span class="fa fa-gift" style="color: rgb(0,192,239);"></span></h1>
						<h6 style="color: rgb(0,192,239);">Manage Users</h6>
						</center>
					</div>

					<div class="col l3 m3 s12">
						<center>
						<h1><span class="fa fa-cubes" style="color: rgb(0,192,239);"></span></h1>
						<h6 style="color: rgb(0,192,239);">Manage Items</h6>
						</center>
					</div>
				</div>
			</div>
			<div class="col l1 m1 s12"></div>
		</div>

		<!--Login Form End-->

<!--Scripts-->
	<script type="text/javascript" src="<?=base_url('assets/jquery/jquery.js') ?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/materialize/js/materialize.js') ?>"></script>
</body>
</html>