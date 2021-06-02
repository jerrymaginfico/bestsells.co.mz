	<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href="<?php echo base_url();?>bestsells/img/bestlogo.png">
		
		<title>Best$ellS</title>

		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/fonts/iconic/css/material-design-iconic-font.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/vendor/animate/animate.css">
		<!--===============================================================================================-->	
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/vendor/css-hamburgers/hamburgers.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/vendor/animsition/css/animsition.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/vendor/select2/select2.min.css">
		<!--===============================================================================================-->	
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/vendor/daterangepicker/daterangepicker.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/css/util.css">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/css/main2.css">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bestsells/css/main3.css">

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
						<li class="active"><a href="<?php echo base_url();?>Home/index">Home</a></li>
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
						<li><a href="#">Moda Feminina</a>
							<ul>
								<li><a href="<?php echo base_url('Home/store_blusas_femininas');?>">Blusas, Camisas & Camisetes</a></li>
								<li><a href="<?php echo base_url('Home/store_calcas_femininas');?>">Calças</a></li>
								<li><a href="<?php echo base_url('Home/store_calcados_femininos');?>">Calçados</a></li>
								<li><a href="<?php echo base_url('Home/store_women_acessories');?>">Acessórios Femeninos</a></li>

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

		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="<?php echo base_url();?>navegate/home">Home</a></li>
							<li class="active"><a href="#">Cadastro de Usúarios</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

	<div class="limiter" style="margin-bottom:-30px; margin-top: -30px;">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('<?=base_url('bestsells/img/sign.png');?>');"></div>
			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">

				<?=form_open("Vendedor/CriarConta");?>
					<span class="login100-form-title p-b-59">
						Cadastro de Usuários
					</span>

					<div class="wrap-input100 validate-input" required>
						<span class="label-input100">Nome Completo</span>
						<input class="input100" type="text" name="name_user" id="name_user" placeholder="Nome..." / required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email_user" id="email_user" placeholder="Endereço email..." / required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" required>
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password_user" id="password_user" placeholder="Password..."  required>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="agree" required>
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									Concordo com
									<a href="#" class="txt2 hov1">
										Termos de Uso
									</a>
								</span>
							</label>
						</div>						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" id="btnSave">
								Cadastrar - Me
							</button>
						</div>

						<a href="<?php echo base_url('Vendedor/index');?>" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Entrar
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				<?=form_close(); ?>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>bestsells/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>bestsells/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>bestsells/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>bestsells/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>bestsells/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>bestsells/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>bestsells/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>bestsells/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>bestsells/js/main.js"></script>

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

		<!--Custom js file include-->

		<script type="text/javascript">
			$(document).ready(function(){

			});
		</script>
		
	</body>
</html>

