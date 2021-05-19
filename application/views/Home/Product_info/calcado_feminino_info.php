<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href="<?php echo base_url();?>bestsells/img/bestlogo.png">
		
		<title>BestSellS | <?=$woman->mfoot_title;?></title>
		
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="<?php echo base_url();?>bestsells/css/font-awesome.min.css">

		<!-- Custom stylesheet -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/css/style.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/css/mine.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/css/nav.css"/>
		 </head>
	<body>

		<!-- HEADER -->
<header>
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i>+258 84 596 4141</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i>info@bestsells.co.mz</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i>Maputo, Matola</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="<?php echo base_url('Vendedor/index');?>"><i class="fa fa-plus"></i> Publicar</a></li>
						<li><a href="<?php echo base_url('Vendedor/sign_up');?>"><i class="fa fa-user-o"></i> Minha Conta</a></li>
					</ul>
				</div>
			</div>
		<!-- TOP HEADER -->

		<!-- MAIN HEADER -->
<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
		
		
		<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									
								</a>
							</div>
						</div>
		<!-- /LOGO -->
		
			<!-- SEARCH BAR -->
			<div class="col-md-6">
			<div class="header-search">
				<ul id="search_items">
				<h6 style="font-size:16px;;color:#fff;">Procurar</h6>
				 <?= form_open("Home/search_result");?>
				 <li>
						<select name="listing_items" id="listing_items">
								<option selected disabled>Categoria do Artigo</option>
								<option value="celulares">Celulares</option>
								<option value="desktop">Computadores de Mesa</option>
								<option value="laptops">Laptops</option>
								<option value="geleiras">Geleiras & Congeladores</option>
								<option value="carros particulares">Carros Particulares</option>
								<option value="semi colectivos">Carros Semi-Colectivos</option>
								<option value="carros de carga">Carros de Carga / Pesados</option>
								<option value="camisetes masculinas">Camisetes Masculinas</option>
								<option value="calcados masculinos">Calçados Masculinos</option>
								<option value="blusas femeninas">Blusas & Camisetes Femeninas</option>
								<option value="calcados femeninos">Calçados Femeninos</option>
						</select>
							<input type="text" name="article" id="article" placeholder="Titulo do Artigo" required>
							<button class="btn btn-primary" id="btnSearch">Procurar&nbsp;&nbsp;<span class="fa fa-search"></span></button>
						</li>
					</ul>
					<?=form_close();?>
			</div>
		</div>
		<!-- /SEARCH BAR --><!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">Todas</option>
										<option value="1">Eletrónicos</option>
										<option value="2">Eletrod.</option>
										<option value="3">Automovéis</option>
										<option value="4">Moda Masc.</option>
										<option value="4">Moda Femin.</option>		
									</select>
									<input class="input" placeholder="Produto">
									<button class="search-btn">Procurar</button>
								</form>
							</div>
						</div>
		<!-- /SEARCH BAR -->
		<!-- Menu Toogle -->
		<div class="menu-toggle">
			<a href="#">
				<i class="fa fa-bars"></i>
				<span>Menu</span>
			</a>
		</div>
		<!-- /Menu Toogle -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="<?php echo base_url('Home/index');?>">Home</a></li>
						<li><a href="#">Eletrónicos</a>
							<ul>
								<li><a href="<?php echo base_url('Home/store_celulares');?>">Celulares</a></li>
								<li><a href="<?php echo base_url('Home/store_desktops');?>">Computadores de Mesa</a></li>
								<li><a href="<?php echo base_url('Home/store_laptops');?>">Laptops</a></li>
								<li><a href="<?php echo base_url('Home/store_tablets');?>">Tablets</a></li>
								<li><a href="<?php echo base_url('Home/store_printers');?>">Impressoras & Fotocopiadoras</a></li>
								<li><a href="<?php echo base_url('Home/store_eletronic_acessories');?>">Acessórios Eletrónicos</a></li>
							</ul>
						</li>
						<li><a href="#">Eletrodomésticos</a>
							<ul>
								<li><a href="<?php echo base_url('Home/store_freezers');?>">Geleiras & Congeladores</a></li>
								<li><a href="<?php echo base_url('Home/store_fogoes');?>">Fogões</a></li>
								<li><a href="<?php echo base_url('Home/store_televisores');?>">Televisores</a></li>
								<li><a href="<?php echo base_url('Home/store_eletrodomestic_acessories');?>">Acessórios Eletrodomésticos</a></li>
							</ul>
						</li>
						<li><a href="#">Carros</a>
							<ul>
								<li><a href="<?php echo base_url('Home/store_carros_particulares');?>">Carros Particulares</a></li>
								<li><a href="<?php echo base_url('Home/store_carros_colectivos');?>">Transporte de Passageiros</a></li>
								<li><a href="<?php echo base_url('Home/store_carros_de_carga');?>">Transporte de Carga/Pesados</a></li>
								<li><a href="<?php echo base_url('Home/store_motos_e_triciclos');?>">Motos & Triciclos</a></li>
								<li><a href="<?php echo base_url('Home/store_bicicletas');?>">Bicicletas</a></li>
								<li><a href="<?php echo base_url('Home/store_cars_acessories');?>">Acessórios De Carros & Automoveis</a></li>
							</ul>
						</li>
						<li><a href="#">Moda Masculina</a>
							<ul>
								<li><a href="<?php echo base_url('Home/store_camisas_masculinas');?>">Camisas & Camisetes</a></li>
								<li><a href="<?php echo base_url('Home/store_calcas_masculinas');?>">Calças</a></li>
								<li><a href="<?php echo base_url('Home/store_calcados_masculinos');?>">Calçados</a></li>
								<li><a href="<?php echo base_url('Home/store_men_accesories');?>">Acessórios Masculinos</a></li>
							</ul>
						</li>
						<li class="active"><a href="#">Moda Feminina</a>
							<ul>
								<li><a href="<?php echo base_url('Home/store_blusas_femininas');?>">Blusas, Camisas & Camisetes</a></li>
								<li><a href="<?php echo base_url('Home/store_calcas_femininas');?>">Calças</a></li>
								<li><a href="<?php echo base_url('Home/store_calcados_femininos');?>">Calçados</a></li>
								<li><a href="<?php echo base_url('Home/store_women_acessories');?>">Acessórios Femeninos</a></li>

								<!--Quando colocar Slideshow, colocar a posicao da nav como absolute-->
							</ul>
						</li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
						<li class="active"><a href="<?php echo base_url('Home/index');?>">Home</a></li>
						<li><a href="#"><?=$woman->categoria;?></a></li>
						<li><a href="#">Calçados Femininos</a></li>
						<li><a href="#"><?=$woman->mfoot_title;?></a></li>
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
									<?php if($woman->image_one == ""):?>
										<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="img-responsive">
										<?php else: ?>
										<img src="<?=base_url().'WomenImages/'.$woman->image_one;?>" class="responsive-img">
									<?php endif;?>
							</div>

							<div class="product-preview">
									<?php if($woman->image_two == ""):?>
										<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="img-responsive">
										<?php else: ?>
										<img src="<?=base_url().'WomenImages/'.$woman->image_two;?>" class="responsive-img">
									<?php endif;?>
							</div>

						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
									<?php if($woman->image_one == ""):?>
										<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="img-responsive">
										<?php else: ?>
										<img src="<?=base_url().'WomenImages/'.$woman->image_one;?>" class="responsive-img">
									<?php endif;?>
							</div>

							<div class="product-preview">
									<?php if($woman->image_two == ""):?>
										<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="img-responsive">
										<?php else: ?>
										<img src="<?=base_url().'WomenImages/'.$woman->image_two;?>" class="responsive-img">
									<?php endif;?>
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?=$woman->mfoot_title;?></h2>
							<div>
								<h3 class="product-price"><?=number_format($woman->product_price);?></h3>
							</div>
						<table class="table">
								<tr>
									<td>
										<h6><?php echo get_phrase('Tamanho');?></h6>
									</td>
									<td>
										<?=$woman->mfoot_size;?>
									</td>
								</tr>		
							</table>
							<br>
							<h5 class="title">Dados do Vendedor</h5>
							<table class="table">
								<tr>
									<td><h6><?php echo get_phrase('Vendedor');?></h6></td>
									<td><?=$woman->nome_completo;?></td>
								</tr>
								<tr>
									<td><h6><?php echo get_phrase('Email');?></h6></td>
									<td><?=$woman->email;?></td>
								</tr>
								<tr>
									<td><h6><?php echo get_phrase('Contactos');?></h6></td>
									<td><?=$woman->vend_contato1;?> / <?=$woman->vend_contato2;?></td>
								</tr>
							</table>
							<ul class="product-links">
								<li>Partilhar:</li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Descrição</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12 text-center" style="font-size: 16px;">
											<p><?=$woman->mfoot_descricao;?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Sobre a Best$ells</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Eletrónicos</a></li>
									<li><a href="#">Eletrodomésticos</a></li>
									<li><a href="#">Automovéis</a></li>
									<li><a href="#">Moda Masculina</a></li>
									<li><a href="#">Moda Feminina</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Important Link</h3>
								<ul class="footer-links">
									<li><a href="<?php echo base_url('Home/index');?>">Home</a></li>
									<li><a href="<?php echo base_url('Vendedor/sign_up');?>">Criar Conta</a></li>
									<li><a href="<?php echo base_url('Vendedor/index');?>">Minha Conta</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Dados Best$ells</h3>
								<ul class="footer-links">
								<li><a href="#"><i class="fa fa-phone"></i>+258 84 596 4141</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>info@bestsells.co.mz</a></li>
								<li><a href="#"><i class="fa fa-map-marker"></i>Maputo, Matola</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">XIT2S</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->
			
		<!-- jQuery Plugins -->
		<!--Scripts-->
		<script type="text/javascript" src="<?=base_url('bestsells/materialize/js/materialize.js'); ?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/jquery/jquery.js'); ?>"></script>
		<!--Ajax file include-->
		<script type="text/javascript" src="<?=base_url('assets/Ajax/Ajax.js');?>"></script>
		<script src="<?php echo base_url();?>bestsells/js/jquery.min.js"></script>
		<script src="<?php echo base_url();?>bestsells/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>bestsells/js/slick.min.js"></script>
		<script src="<?php echo base_url();?>bestsells/js/nouislider.min.js"></script>
		<script src="<?php echo base_url();?>bestsells/js/jquery.zoom.min.js"></script>
		<script src="<?php echo base_url();?>bestsells/js/main.js"></script>
		<script src="<?php echo base_url();?>bestsells/js/mine.js"></script>

		<!--CUSTOM JS FILE--->
		<script type="text/javascript">
				$(document).ready(function(){

					$('.dropdown-trigger').dropdown({
						hover:true,
						coverTrigger:false
					});
				});
		</script>
		
	</body>
</html>
