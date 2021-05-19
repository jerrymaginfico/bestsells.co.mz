<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Best$ells | Actualizar Imagens</title>
		<link rel="shortcut icon" href="<?php echo base_url();?>bestsells/img/bestlogo.png">
		
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/home/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/home/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/home/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/home/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="<?php echo base_url();?>bestsells/home/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/home/css/style.css"/>
		
		 </head>
	<body>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li class="active"><a href="<?=base_url('Vendedor/Dashboard');?>">Dashboard</a></li>
						<li><a href="#"><?=$mobile->categoria;?></a></li>
						<li><a href="#">Actualizar Imagens</a></li>
						<li><a href="#"><?=$mobile->cel_title;?></a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<?php if($mobile->image_one == ""):?>
				                  <img src="<?php echo base_url();?>bestsells/img/bestlogo.png" alt="Product Image">
				                  <?php else: ?>
				                	<img src="<?= base_url().'EletronicImages/'.$mobile->image_one;?>" class="product-image" alt="Product Image">
				                <?php endif;?>
							</div>

							<div class="product-preview">
							<?php if($mobile->image_two == ""):?>
				                 <img src="<?php echo base_url();?>bestsells/img/bestlogo.png" alt="Product Image">
				                  <?php else: ?>
				                <img src="<?= base_url().'EletronicImages/'.$mobile->image_two;?>" class="product-image" alt="Product Image">
				                <?php endif;?>
							</div>

							<div class="product-preview">
							<?php if($mobile->image_three == ""):?>
                  				<img src="<?php echo base_url();?>bestsells/img/bestlogo.png" alt="Product Image">
                  				<?php else: ?>
                				<img src="<?= base_url().'EletronicImages/'.$mobile->image_three;?>" class="product-image" alt="Product Image">
                			<?php endif;?>
							</div>

							<div class="product-preview">
								<?php if($mobile->image_four == ""):?>
				                  <img src="<?php echo base_url();?>bestsells/img/bestlogo.png" alt="Product Image">
				                  <?php else: ?>
				                <img src="<?= base_url().'EletronicImages/'.$mobile->image_four;?>" class="product-image" alt="Product Image">
				                <?php endif;?>
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<?php if($mobile->image_one == ""):?>
				                  <img src="<?php echo base_url();?>bestsells/img/bestlogo.png" alt="Product Image">
				                  <?php else: ?>
				                	<img src="<?= base_url().'EletronicImages/'.$mobile->image_one;?>" class="product-image" alt="Product Image">
				                <?php endif;?>
							</div>

							<div class="product-preview">
								<?php if($mobile->image_two == ""):?>
				                  <img src="<?php echo base_url();?>bestsells/img/bestlogo.png" alt="Product Image">
				                  <?php else: ?>
				                	<img src="<?= base_url().'EletronicImages/'.$mobile->image_two;?>" class="product-image" alt="Product Image">
				                <?php endif;?>
							</div>

							<div class="product-preview">
								<?php if($mobile->image_three == ""):?>
				                  <img src="<?php echo base_url();?>bestsells/img/bestlogo.png" alt="Product Image">
				                  <?php else: ?>
				                	<img src="<?= base_url().'EletronicImages/'.$mobile->image_three;?>" class="product-image" alt="Product Image">
				                <?php endif;?>
							</div>

							<div class="product-preview">
								<?php if($mobile->image_one == ""):?>
				                  <img src="<?php echo base_url();?>bestsells/img/bestlogo.png" alt="Product Image">
				                  <?php else: ?>
				                	<img src="<?= base_url().'EletronicImages/'.$mobile->image_four;?>" class="product-image" alt="Product Image">
				                <?php endif;?>
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->					
				</div>
				<br>
				<br>
				<br>
				<!-- /row -->
			<div class="card-footer">
	            <?=form_open_multipart('Vendedor/mobile_image_update/'.$mobile->cel_id);?>
	            <h6><?php echo get_phrase('Actualizar Imagens (4)');?></h6>
	            <br>
	            <h6 style="font-size: 14px;font-weight: 500;"><?php echo get_phrase('Imagens do Celular');?></h6>
	            <input type="file" name="image" id="image" style="border: 1px solid silver; padding: 10px; box-shadow: none;">
	            <br>
	            <h6 style="font-size: 14px;font-weight: 500;"><?php echo get_phrase('Posicao da Imagem(1-4)');?></h6>
	            <input type="text" class="form-control" name="image_position" id="image_position" placeholder="Ex.:1,2,3,4" style="width: 30%;" required>
	            <br>
	            <button type="submit" class="btn btn-primary"><?php echo get_phrase('Actualizar');?></button>
	             <?=form_close();?>
          </div>
        </div>
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


		

		<!-- jQuery Plugins -->
		<script src="<?php echo base_url();?>bestsells/home/js/jquery.min.js"></script>
		<script src="<?php echo base_url();?>bestsells/home/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>bestsells/home/js/slick.min.js"></script>
		<script src="<?php echo base_url();?>bestsells/home/js/nouislider.min.js"></script>
		<script src="<?php echo base_url();?>bestsells/home/<?php echo base_url();?>bestsells/home/js/jquery.zoom.min.js"></script>
		<script src="<?php echo base_url();?>bestsells/home/js/main.js"></script>


	</body>
</html>
