<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href="<?php echo base_url();?>bestsells/img/bestlogo.png">
		
		<title>BestSellS | Pagina Inicial</title>
		
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>bestsells/css/bootstrap.min.css"/>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

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

		<!-- Slider Section Start -->
		
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

  			<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="responvive-img d-block w-100">
					</div>

					
					<div class="item">
						<img src="<?=base_url('bestsells/img/commerce.png');?>" class="responvive-img d-block w-100">
					</div>

					<div class="item">
					<img src="<?=base_url('bestsells/img/E-commerce-Payment.png');?>" class="responvive-img d-block w-100">
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			
		<!-- Slider Section End -->
		 
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

		<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h4 class="title"><?php echo get_phrase('Carros Particulares (10)');?></h4>&nbsp;&nbsp;
							<span class="right"><a href="<?php echo base_url('Home/store_carros_particulares');?>"><?php echo get_phrase('Ver Todos')?></a></span>
						</div>
					</div>

		<!-- /section title -->
		<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
													
				
				<!-- product -->		<?php if(count($cars)):?>
											<?php foreach($cars as $car): ?>
										<div class="product">
											<div class="product-img">
												<?php if($car->image_one == ""):?>
												<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="img-responsive" style="height: 170px;">
												<?php else: ?>
													<img src="<?=base_url().'CarrsImages/'.$car->image_one;?>" class="responsive-img" style="height: 170px;">
												<?php endif;?>
											</div>
											<div class="product-body">
												<p class="product-category"><?=$car->car_categoria;?></p>
												<h3 class="product-name"><a href="<?php echo base_url('Home/particular_car_info/'.$car->part_id);?>" title="<?=$car->part_title;?>"><?=word_limiter($car->part_title,3);?></a></h3>
												<h4 class="product-price"><?=number_format($car->product_price);?></h4>
											</div>
											<div class="add-to-cart">
												<a href="<?php echo base_url('Home/particular_car_info/'.$car->part_id);?>"><button class="add-to-cart-btn"><i class="fa fa-eye"></i> Ver Mais </button></a>
											</div>
										</div>
									<?php endforeach;
									else: ?>
									<?php endif;?>
				<!-- /product -->

									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
				<br>
				<br>
				<br>

				<!-- Freezers Listing Section Start -->
				<div class="row">

		<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h4 class="title"><?php echo get_phrase('Geleiras & Congeladores (10)');?></h4>&nbsp;&nbsp;
							<span class="right"><a href="<?php echo base_url('Home/store_freezers');?>"><?php echo get_phrase('Ver Todos')?></a></span>
						</div>
					</div>

		<!-- /section title -->
		<!-- Products tab & slick -->
					<div class="col-md-12">
						
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-2">
													
				
				<!-- product -->		<?php if(count($freeze)):?>
											<?php foreach($freeze as $freeze): ?>
										<div class="product">
											<div class="product-img">
												<?php if($freeze->image_one == ""):?>
												<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="img-responsive" style="height: 170px;">
												<?php else: ?>
													<img src="<?=base_url().'DomesticImages/'.$freeze->image_one;?>" class="responsive-img" style="height: 170px;">
												<?php endif;?>
											</div>
											<div class="product-body">
												<p class="product-category"><?=$freeze->freeze_categoria;?></p>
												<h3 class="product-name"><a href="<?php echo base_url('Home/freezer_info/'.$freeze->freeze_id);?>" title="<?=$freeze->freeze_title;?>"><?=word_limiter($freeze->freeze_title,3);?></a></h3>
												<h4 class="product-price"><?=number_format($freeze->product_price);?></h4>
											</div>
											<div class="add-to-cart">
											<a href="<?php echo base_url('Home/freezer_info/'.$freeze->freeze_id);?>"><button class="add-to-cart-btn"><i class="fa fa-eye"></i> Ver Mais </button></a>
											</div>
										</div>
									<?php endforeach;
									else: ?>
									<?php endif;?>
				<!-- /product -->

									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
				<!-- Freezers Listing Section Start -->
				<br>
				<br>
				<br>

				<!-- Mobile Listing Section Start -->
				<div class="row">

		<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h4 class="title"><?php echo get_phrase('Celulares (10)');?></h4>&nbsp;&nbsp;
							<span class="right"><a href="<?php echo base_url('Home/store_celulares');?>"><?php echo get_phrase('Ver Todos')?></a></span>
						</div>
					</div>

		<!-- /section title -->
		<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab3" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-3">
													
				
				<!-- product -->		<?php if(count($cell)):?>
											<?php foreach($cell as $cell): ?>
										<div class="product">
											<div class="product-img">
												<?php if($cell->image_one == ""):?>
												<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="img-responsive" style="height: 170px;">
												<?php else: ?>
													<img src="<?=base_url().'EletronicImages/'.$cell->image_one;?>" class="responsive-img" style="height: 170px;">
												<?php endif;?>
											</div>
											<div class="product-body">
												<p class="product-category"><?=$cell->categoria;?></p>
												<h3 class="product-name"><a href="<?php echo base_url('Home/celular_info/'.$cell->cel_id);?>" title="<?=$cel->cel_title;?>"><?=word_limiter($cell->cel_title,3);?></a></h3>
												<h4 class="product-price"><?=number_format($cell->product_price);?></h4>
											</div>
											<div class="add-to-cart">
											<a href="<?php echo base_url('Home/celular_info/'.$cell->cel_id);?>"><button class="add-to-cart-btn"><i class="fa fa-eye"></i> Ver Mais </button></a>
											</div>
										</div>
									<?php endforeach;
									else: ?>
									<?php endif;?>
				<!-- /product -->

									</div>
									<div id="slick-nav-3" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
				<!--Mobile Listing Section End -->
				<br>
				<br>
				<br>
				<!--Laptops Listing Section Start-->
				<div class="row">

		<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h4 class="title"><?php echo get_phrase('Laptops (10)');?></h4>&nbsp;&nbsp;
							<span class="right"><a href="<?php echo base_url('Home/store_laptops');?>"><?php echo get_phrase('Ver Todos')?></a></span>
						</div>
					</div>

		<!-- /section title -->
		<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab4" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-4">
													
				
				<!-- product -->		<?php if(count($laps)):?>
											<?php foreach($laps as $laps): ?>
										<div class="product">
											<div class="product-img">
												<?php if($laps->image_one == ""):?>
												<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="img-responsive" style="height: 170px;">
												<?php else: ?>
													<img src="<?=base_url().'EletronicImages/'.$laps->image_one;?>" class="responsive-img" style="height: 170px;">
												<?php endif;?>
											</div>
											<div class="product-body">
												<p class="product-category"><?=$laps->categoria;?></p>
												<h3 class="product-name"><a href="<?php echo base_url('Home/laptop_info/'.$laps->lap_id);?>" title="<?=$laps->lap_title;?>"><?=word_limiter($laps->lap_title,2);?></a></h3>
												<h4 class="product-price"><?=number_format($laps->product_price);?></h4>
											</div>
											<div class="add-to-cart">
											<a href="<?php echo base_url('Home/laptop_info/'.$laps->lap_id);?>"><button class="add-to-cart-btn"><i class="fa fa-eye"></i> Ver Mais </button></a>
											</div>
										</div>
									<?php endforeach;
									else: ?>
									<?php endif;?>
				<!-- /product -->

									</div>
									<div id="slick-nav-4" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
				<!--Laptops Listing Section End-->
				<br>
				<br>
				<br>
				<!--Men Shirts Listing Section Start-->
				<div class="row">

		<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h4 class="title"><?php echo get_phrase('Camisas & Camisetes Masculinas (10)');?></h4>&nbsp;&nbsp;
							<span class="right"><a href="<?php echo base_url('Home/store_camisas_masculinas');?>"><?php echo get_phrase('Ver Todos')?></a></span>
						</div>
					</div>

		<!-- /section title -->
		<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab5" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-5">
													
				
				<!-- product -->		<?php if(count($mshirts)):?>
											<?php foreach($mshirts as $mshirts): ?>
										<div class="product">
											<div class="product-img">
												<?php if($mshirts->image_one == ""):?>
												<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="img-responsive" style="height: 170px;">
												<?php else: ?>
													<img src="<?=base_url().'MenImages/'.$mshirts->image_one;?>" class="responsive-img" style="height: 170px;">
												<?php endif;?>
											</div>
											<div class="product-body">
												<p class="product-category"><?=$mshirts->categoria;?></p>
												<h3 class="product-name"><a href="<?php echo base_url('Home/camisa_masculina_info/'.$mshirts->shirt_id);?>" title="<?=$laps->lap_title;?>"><?=word_limiter($mshirts->shirt_title,3);?></a></h3>
												<h4 class="product-price"><?=number_format($mshirts->product_price);?></h4>
											</div>
											<div class="add-to-cart">
											<a href="<?php echo base_url('Home/camisa_masculina_info/'.$mshirts->shirt_id);?>"><button class="add-to-cart-btn"><i class="fa fa-eye"></i> Ver Mais </button></a>
											</div>
										</div>
									<?php endforeach;
									else: ?>
									<?php endif;?>
				<!-- /product -->

									</div>
									<div id="slick-nav-5" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
				<!--Men Shirt Listing Section End-->

				<br>
				<br>
				<br>
				<!--Women Shirts Listing Section Start-->
				<div class="row">

		<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h4 class="title"><?php echo get_phrase('Blusas, Camisas & Camisetes Femeninas (10)');?></h4>&nbsp;&nbsp;
							<span class="right"><a href="<?php echo base_url('Home/store_blusas_femininas');?>"><?php echo get_phrase('Ver Todos')?></a></span>
						</div>
					</div>

		<!-- /section title -->
		<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab6" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-6">
													
				
				<!-- product -->		<?php if(count($wshirt)):?>
											<?php foreach($wshirt as $wshirt): ?>
										<div class="product">
											<div class="product-img">
												<?php if($wshirt->image_one == ""):?>
												<img src="<?=base_url('bestsells/img/bestlogo.png');?>" class="img-responsive" style="height: 170px;">
												<?php else: ?>
													<img src="<?=base_url().'WomenImages/'.$wshirt->image_one;?>" class="responsive-img" style="height: 170px;">
												<?php endif;?>
											</div>
											<div class="product-body">
												<p class="product-category"><?=$wshirt->categoria;?></p>
												<h3 class="product-name"><a href="<?php echo base_url('Home/blusa_feminina_info/'.$wshirt->wshirt_id);?>" title="<?=$wshirt->wshirt_title;?>"><?=word_limiter($wshirt->wshirt_title,3);?></a></h3>
												<h4 class="product-price"><?=number_format($wshirt->product_price);?></h4>
											</div>
											<div class="add-to-cart">
											<a href="<?php echo base_url('Home/blusa_feminina_info/'.$wshirt->wshirt_id);?>"><button class="add-to-cart-btn"><i class="fa fa-eye"></i> Ver Mais </button></a>
											</div>
										</div>
									<?php endforeach;
									else: ?>
									<?php endif;?>
				<!-- /product -->

									</div>
									<div id="slick-nav-6" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
				<!--Women Shirt Listing Section End-->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!--HOT DEAL SECTION-->
			
			<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

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

					//slider start
					

				});
		</script>
		
	</body>
</html>
