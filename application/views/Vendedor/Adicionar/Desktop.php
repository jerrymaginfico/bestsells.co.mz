<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo get_phrase('BestSells | Adicionar Computadores de Mesa');?></title>
  <link rel="shortcut icon" href="<?php echo base_url();?>bestsells/img/bestlogo.png">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
   
    #image_one,#image_two,#image_three,#image_four{
      border: 1px solid silver;
      padding: 10px;
      margin-bottom: 10px;
    }

  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Vendedor/Editar_Perfil/'.$result->vend_id);?>">
          <i class="far fa-user"></i>
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo get_phrase('Contacto & Localizacao');?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="text" class="form-control" name="email" id="email" value="email@bestsells.co.mz" disabled>
            </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" name="contact1" id="contact1"  value="+258 84 000 0000" disabled>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                  </div>
                  <input type="text" class="form-control" name="local" id="local" value="Localizacao" disabled>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo get_phrase('Fechar');?></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('Home/index');?>" class="brand-link">
      <img src="<?=base_url('bestsells/img/bestlogo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo get_phrase('Best$ells');?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('assets/img/vendedor.png');?>" class="img-circle elevation-2 img-responsive" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('Vendedor/Editar_Perfil/'.$result->vend_id);?>" class="d-block" title="<?=$result->nome_completo;?>">
            <?=word_limiter($result->nome_completo,2);?>
            </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url();?>Vendedor/Dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>Vendedor/Adicionar" class="nav-link active">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Adicionar
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <br>
          <br>
          <br>
          <br>
          <br>
          <li class="nav-header"><b><?php echo get_phrase('--- SUPORTE');?></b></li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-sm">
              <i class="nav-icon fa fa-info"></i>
              <p><?php echo get_phrase('Ajuda & Contacto');?></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>Vendedor/Logout" class="nav-link">
              <i class="nav-icon fa fa-arrow-circle-left"></i>
              <p><?php echo get_phrase('Terminar Sessao');?></p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Best$ells</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>Vendedor/Dashboard"><?php echo get_phrase('Dashboard');?></a></li>
              <li class="breadcrumb-item active"><?php echo get_phrase('Computadores de Mesa');?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Image Upload Modal Section Start-->

    <div class="modal fade" id="image_upload_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?php echo get_phrase('Uploader de Imagens');?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <h6 style="margin-left:15px; font-size: 12px;"><?php echo get_phrase('Id Produto:');?>&nbsp;<span id="show_product_id"></span></h6>
            <form method="post" id="image_upload_form" enctype="multipart/formdata">
              <input type="text" name="product_id" id="product_id" style="display: none;">
            <div class="modal-body">
              <div class="row">
                <div class="col l4 m5 s12">
                  <!--first image -->
                  <input type="file" name="image_one" id="image_one">
                  <!-- /.first image -->

                  <!--first image -->
                  <input type="file" name="image_two" id="image_two">
                  <!-- /.first image -->

                  <!--first image -->
                  <input type="file" name="image_three" id="image_three">
                  <!-- /.first image -->

                  <!--first image -->
                  <input type="file" name="image_four" id="image_four">
                  <!-- /.first image -->
                </div>
                <div class="col l8 m7 s12">
                  <!--Upload show image -->

                  <center>
                    <div id ="show_upload_images">
                    
                  </div>
                  </center>

                  <!--/. Upload show image -->
                </div>
              </div>
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              <button type="submit" id="btnUpload_image" name="btnUpload_image" class="btn btn-primary">Publicar</button>
            </div>
          </div>
          <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <!-- /.Image Upload Modal Section End-->

    <!-- Main content -->
    <!--Hidden input section start-->
    <input type="text" name="desk_id" id="desk_id" style="display: none;">
   
      <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo get_phrase('Dados de Inserção');?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <table class="table">
                <tr>
                  <td>
                  <div class="form-group">
                    <label for="desk_title"><?php echo get_phrase('Titulo do Produto');?></label>
                    <input type="text" class="form-control" name="desk_title" id="desk_title" placeholder="Titulo do Produto">
                  </div>
                  </td>
                  <td>
                     <div class="form-group">
                    <label for="marca"><?php echo get_phrase('Marca');?></label>
                    <!--show brand name section start-->
                    <div id="show_mobile_brand">
                    <!--<select class="form-control" name="mobile_brand" id="mobile_brand">
                      <option>Isuzu</option>
                      <option>Toyota</option>
                      <option>Renault</option>
                      <option>Nissan</option>
                    </select>-->
                    <!--show brand name section End-->
                    </div>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td style="border-top: none;">
                    <div class="form-group">
                    <label for="desk_so"><?php echo get_phrase('Sistema Operativo');?></label>
                    <input type="text" class="form-control" name="desk_so" id="desk_so" placeholder="Windows, MacOS, Ubuntu, ...">
                  </div>
                  </td>
                  <td style="border-top: none;">
                    <div class="form-group">
                    <label for="desk_monitor"><?php echo get_phrase('Monitor');?></label>
                     <select class="form-control" name="desk_monitor" id="desk_monitor" style="height:38px;width:50%; padding:5px;">
                      <option value="Sim">Sim</option>
                      <option value="Não">Não</option>
                     </select>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td style="border-top: none;">
                    <div class="form-group">
                    <label for="desk_processor"><?php echo get_phrase('Processador');?></label>
                    <input type="text" class="form-control" name="desk_processor" id="desk_processor" placeholder="Ex: Dual Core, Quad Core, Core 2 Du0, Core i3, Core i5, Core i7, ...">
                  </div>
                  </td>
                  <td style="border-top: none;">
                    <div class="form-group">
                    <label for="desk_ram"><?php echo get_phrase('Memória RAM');?></label>
                    <select class="form-control" name="desk_ram" id="desk_ram" style="height:38px;width:50%; padding:5px;">
                      <option value="2 GB">2 GB</option>
                      <option value="4 GB">4 GB</option>
                      <option value="8 GB">8 GB</option>
                      <option value="16 GB">16 GB</option>
                      <option value="32 GB">32 GB</option>
                    </select>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="border-top: none;">
                    <div class="form-group">
                    <label for="desk_hdd"><?php echo get_phrase('Capacidade do HDD');?></label>
                    <select class="form-control" name="desk_hdd" id="desk_hdd">
                      <option value="80 GB">80 GB</option>
                      <option value="120 GB">120 GB</option>
                      <option value="320 GB">320 GB</option>
                      <option value="500 GB">500 GB</option>
                      <option value="1 TB">1 TB</option>
                    </select>
                    </div>
                  </td>
                  <td style="border-top: none;">
                    <div class="form-group">
                    <label for="desk_descricao"><?php echo get_phrase('Descrição');?></label>
                    <textarea class="form-control" rows="3" name="desk_descricao" id="desk_descricao" placeholder="Informação adicional..."></textarea>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td style="border-top: none;">
                    <div class="form-group">
                      <label for="product_price"><?php echo get_phrase('Preço do Produto');?></label>
                      <input type="text" name="product_price" id="product_price" class="form-control" placeholder="50000">
                    </div>
                  </td>
                </tr>
              </table>
                <div class="card-footer">
                  <button type="submit" name="btnSave_Desk" id="btnSave_Desk" class="btn btn-primary"><?php echo get_phrase('Salvar & Continuar');?></button>
                  <button type="reset" class="btn btn-outline-danger" id="btnCancel_desk" name="btnCancel_desk"><?php echo get_phrase('Cancelar');?></button>
                </div>
            </div>
            <!-- /.card -->

    <!-- /. Main content -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://xit2s.co.mz">Xtreme IT & Software Solution</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/vendedor/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/vendedor/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>assets/vendedor/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/vendedor/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>assets/vendedor/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url();?>assets/vendedor/dist/js/pages/dashboard2.js"></script>

<!-- custom ajax script include-->
<script type="text/javascript">
    
  $(function(){

    //Modal Show Script Start

   /*$('.modal').modal({
      dismissible:false
    });
    $('image_upload_modal').modal('open');*/

    //Modal Show Script End


  GetComputerName()
      function GetComputerName()
      {
        $.ajax({
          type:'ajax',
          url:'../Admin/GetComputerName',
          success:function(data){
            $('#show_mobile_brand').html(data);
          },
          error:function(){
            alert('Brand Not Found!');
          }
        });
      }
      //GetBrand

      /* Insert Car Section Start */

      $('#btnSave_Desk').click(function(){
        var desk_title     = $('#desk_title').val();
        var mobile_brand  = $('#mobile_brand').val();
        var desk_monitor    = $('#desk_monitor').val();
        var desk_so       = $('#desk_so').val();
        var desk_processor     = $('#desk_processor').val();
        var desk_hdd = $('#desk_hdd').val();
        var desk_ram       = $('#desk_ram').val();
        var desk_descricao = $('#desk_descricao').val();
        var product_price = $('#product_price').val();

        if(desk_title == ""){
          $('#desk_title').focus();
          $('#desk_title').css({'border':'1px solid red'});
        }
        else if(desk_monitor == ""){
          $('#desk_monitor').focus();
          $('#desk_monitor').css({'border':'1px solid red'});
        }
        else if(desk_descricao == ""){
          $('#desk_descricao').focus();
          $('#desk_descricao').css({'border':'1px solid red'});
        }
        else if(product_price == ""){
          $('#product_price').focus();
          $('#product_price').css({'border':'1px solid red'});
        }
        else{
          $.ajax({
            type:'ajax',
            method:'POST',
            url:'InsertDeskInfo',
            data:{
              desk_title:desk_title,
              mobile_brand:mobile_brand,
              desk_monitor:desk_monitor,
              desk_so:desk_so,
              desk_processor:desk_processor,
              desk_hdd:desk_hdd,
              desk_ram:desk_ram,
              product_price:product_price,
              desk_descricao:desk_descricao},
            success:function(data){
              var id = data;
              $('#desk_id').val(id);
              $('#image_upload_modal').modal('show');
              $('#show_product_id').html(data);
              $('#product_id').val(data);
              $('#desk_title').val("");
              $('#desk_processor').val("");
              $('#desk_so').val("");
              $('#product_price').val("");
              $('#desk_descricao').val("");
              alert('Escolha 4 Imagens Para O Seu Produto');
            },
            error:function(){
              alert('Erro Introduzindo Dados.');
            }
          });
        }
      });

      /* Insert Car Section End */

      $('#btnCancel_desk').click(function(){
        $('#desk_title').val("");
        $('#desk_processor').val("");
        $('#desk_so').val("");
        $('#product_price').val("");
        $('#desk_descricao').val("");
      });

      /*image Upload Script Start */

      $('#image_upload_form').on('submit', function(e){
        e.preventDefault();
        var img_one = $('#image_one').val();
        var img_two = $('#image_two').val();
                
        if(img_one == "" || img_two ==""){
          alert('Escolha Pelomenos Duas(2) Imagens Do Seu Produto');
        }
        else{
          $.ajax({
            url:'InsertDeskImages',
            method:'POST',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){
              alert('Imagens Carregadas & Produto Publicado Com Sucesso.');
              /*$('#show_upload_images').html(data);
              /Num futuro proximo, colocar o congratulations Modal!*/
              location.reload();
            },
            error:function(){
              alert('Erro Carregando Imagens.');
            }
          });
        }
      });

      
      /*image Upload Script End */

  });


</script>

</body>
</html>