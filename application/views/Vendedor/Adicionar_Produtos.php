<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="shortcut icon" href="<?php echo base_url();?>bestsells/img/bestlogo.png">
  <title><?php echo get_phrase('Vendedor | Adicionar Produtos');?></title>

   <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/materialize/css/materialize.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- custom css file include-->
  <style type="text/css">
      body{
        background: rgba(0,0,0,0.05);
      }

      img{
        width: 80px;
        height: 80px !important;
        border-radius: 100%;
        border:1px solid rgb(0,192,239);
      }
  </style>

</head>
<body>
  <br>
  <!--Body Section Start-->
  <div class="container">

    <!--Carrs Section Start-->
      <div class="row" style="background: #fff;border: 1px solid silver;margin-bottom: 4px;">
        <div class="col l4 m6 s12">
          <h5 style="margin-top: 0px;margin-bottom: 0px;padding: 10px;color:rgb(0,192,239);"><?php echo get_phrase('Categoria Carros & Automoveis')?></h5>
        </div>
        <div class="col l8 m4 s12">
          
        </div>
      </div>
      <div class="row" style="border: 1px solid silver;margin-bottom: 0px;padding: 10px;background: #fff;">
        <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img03.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Carros_Particulares');?>" style="color: grey;"><?php echo get_phrase('Carros Particulares')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img04.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Carros_Coletivos');?>" style="color: grey;"><?php echo get_phrase('Transporte de Passageiros')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img02.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Carros_Pesados');?>" style="color: grey;"><?php echo get_phrase('Transportes de Carga / Pesados')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img06.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Motos');?>" style="color: grey;"><?php echo get_phrase('Motos & Triciclos')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img01.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Bics');?>" style="color: grey;"><?php echo get_phrase('Bicicletas')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img08.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Accessories');?>" style="color: grey;"><?php echo get_phrase('Acessórios de Carros & Automoveis')?></a></h6>
          </center>
        </div>

      </div>
    <!--Carrs Section End-->
    <br>
    <!--Eletrodomestics Section Start-->

    <div class="row" style="background: #fff;border: 1px solid silver;margin-bottom: 4px;">
        <div class="col l4 m6 s12">
          <h5 style="margin-top: 0px;margin-bottom: 0px;padding: 10px;color:rgb(0,192,239);"><?php echo get_phrase('Categoria Eletrodomésticos')?></h5>
        </div>
        <div class="col l8 m4 s12">
          
        </div>
      </div>
      <div class="row" style="border: 1px solid silver;margin-bottom: 0px;padding: 10px;background: #fff;">
        <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img22.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Geleiras_Congeladores');?>" style="color: grey;"><?php echo get_phrase('Geleiras & Congeladores')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img24.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Fogoes');?>" style="color: grey;"><?php echo get_phrase('Fogões')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img25.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Televisores');?>" style="color: grey;"><?php echo get_phrase('Televisores')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12" hidden>
          <center>
          <img src="<?=base_url('assets/img/cat_img/img26.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Som');?>" style="color: grey;"><?php echo get_phrase('Aparelhos de Som')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img27.png');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Eletro_Acessorios');?>" style="color: grey;"><?php echo get_phrase('Acessórios Eletrodomésticos')?></a></h6>
          </center>
        </div>

      </div>

    <!--Eletrodomestics Section End-->
    <br>
    <!--Eletronics Section Start-->

       <div class="row" style="background: #fff;border: 1px solid silver;margin-bottom: 4px;">
        <div class="col l4 m6 s12">
          <h5 style="margin-top: 0px;margin-bottom: 0px;padding: 10px;color:rgb(0,192,239);"><?php echo get_phrase('Categoria Eletrónicos')?></h5>
        </div>
        <div class="col l8 m4 s12">
          
        </div>
      </div>
      <div class="row" style="border: 1px solid silver;margin-bottom: 0px;padding: 10px;background: #fff;">
        <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img17.png');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Celulares');?>" style="color: grey;"><?php echo get_phrase('Celulares')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img18.png');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Desktop');?>" style="color: grey;"><?php echo get_phrase('Computadores de Mesa')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img19.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Laptops');?>" style="color: grey;"><?php echo get_phrase('Laptops')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/4.png');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Tablets');?>" style="color: grey;"><?php echo get_phrase('Tablets')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img20.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Impressoras');?>" style="color: grey;"><?php echo get_phrase('Impressoras & Fotocopiadoras')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img21.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Acessorios_Eletronicos');?>" style="color: grey;"><?php echo get_phrase('Acessórios Eletrónicos')?></a></h6>
          </center>
        </div>

      </div>

    <!--Eletronics Section End-->
    <br>
    <!--Men Fashion Section Start-->


    <div class="row" style="background: #fff;border: 1px solid silver;margin-bottom: 4px;">
        <div class="col l4 m6 s12">
          <h5 style="margin-top: 0px;margin-bottom: 0px;padding: 10px;color:rgb(0,192,239);"><?php echo get_phrase('Categoria Moda Masculina')?></h5>
        </div>
        <div class="col l8 m4 s12">
          
        </div>
      </div>
      <div class="row" style="border: 1px solid silver;margin-bottom: 0px;padding: 10px;background: #fff;">
        <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img09.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Camisas');?>" style="color: grey;"><?php echo get_phrase('Camisas & Camisetes')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img10.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Calcas_Masculinas');?>" style="color: grey;"><?php echo get_phrase('Calças')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img11.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Calcados_Masculinos');?>" style="color: grey;"><?php echo get_phrase('Calçados')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img12.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Acc_Masculinos');?>" style="color: grey;"><?php echo get_phrase('Acessórios Masculinos')?></a></h6>
          </center>
        </div>

      </div>

    <!--Men Fashion Section End-->
    <br>
    <!--Women Fashion Section Start-->

     <div class="row" style="background: #fff;border: 1px solid silver;margin-bottom: 4px;">
        <div class="col l4 m6 s12">
          <h5 style="margin-top: 0px;margin-bottom: 0px;padding: 10px;color:rgb(0,192,239);"><?php echo get_phrase('Categoria Moda Feminina')?></h5>
        </div>
        <div class="col l8 m4 s12">
          
        </div>
      </div>
      <div class="row" style="border: 1px solid silver;margin-bottom: 0px;padding: 10px;background: #fff;">
        <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img13.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Blusas_Femininas');?>" style="color: grey;"><?php echo get_phrase('Camisas, Camisetes & Blusas')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img14.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Calcas_Femeninas');?>" style="color: grey;"><?php echo get_phrase('Calças')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img15.png');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Calcados_Femininos');?>" style="color: grey;"><?php echo get_phrase('Calçados')?></a></h6>
          </center>
        </div>

         <div class="col l2 m4 s12">
          <center>
          <img src="<?=base_url('assets/img/cat_img/img16.jpg');?>" class="responsive-img"></img>
          <h6 style="margin-top: -2px;"><a href="<?=base_url('Vendedor/Acc_Femininos');?>" style="color: grey;"><?php echo get_phrase('Acessórios Femininos')?></a></h6>
          </center>
        </div>

      </div>

    <!--Women Fashion Section End-->

  </div>


  <!--Body Section End-->

<!--jquery file include-->
<script type="text/javascript" src="<?php echo base_url();?>assets/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/materialize/js/materialize.js"></script>
</body>
</html>