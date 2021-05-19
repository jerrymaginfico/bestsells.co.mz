<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="shortcut icon" href="<?php echo base_url();?>bestsells/img/bestlogo.png">

  <title><?php echo get_phrase('Best$ells | Actualizar Dados do Produto');?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url('Vendedor/Dashboard');?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Vendedor/Adicionar');?>" class="nav-link">
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
            <h1 class="m-0 text-dark"><?php echo get_phrase('Best$ells');?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('Vendedor/Dashboard');?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Actualizar Dados</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
        <!-- SELECT2 EXAMPLE -->
        <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><?php echo get_phrase('Actualizar Estado do Produto Com ID:');?><?=$lap->lap_id;?></h3>
                <br>
                <br>
                <?=form_open('Vendedor/set_laptop_status/'.$lap->lap_id);?>
                <div class="form-group">
                  <select class="form-control" name="status" id="status" required>
                    <option selected> Selecione o novo estado</option>
                    <option value="Active">Activo</option>
                    <option value="Suspended">Suspenso</option>
                    <option value="Vendido">Vendido</option>
                  </select> 
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <table class="table">
                <tr>
                  <td>
                  <div class="form-group">
                    <label for="lap_title"><?php echo get_phrase('Titulo do Produto');?></label>
                    <input type="text" class="form-control" name="lap_title" id="lap_title" value="<?=$lap->lap_title;?>" readonly>
                  </div>
                  </td>
                  <td>
                    <div class="form-group">
                  <label><?php echo get_phrase('Marca');?></label>
                  <select class="form-control select2" name="update_marca" disabled id="update_marca" style="width: 100%;">
                    <?php if(count($brand)): ?>
                      <?php foreach($brand as $brand):?>
                          <?php if($brand->marca == $lap->mobile_brand) :?>
                        <option selected><?=$brand->marca;?></option>
                        <?php else: ?>
                          <option><?=$brand->marca;?></option>
                        <?php endif;?>
                      <?php endforeach;
                      else: ?>
                      <?php endif;?>
                  </select>
                </div>
                  </td>
                </tr>
                <tr>
                  <td style="border-top: none;">
                    <div class="form-group">
                    <label for="lap_so"><?php echo get_phrase('Sistema Operativo');?></label>
                    <input type="text" class="form-control" readonly name="lap_so" id="lap_so" value="<?=$lap->lap_so;?>">
                  </div>
                  </td>
                  <td style="border-top: none;">
                    <div class="form-group">
                    <label for="lap_ram"><?php echo get_phrase('Memória RAM');?></label>
                    <select class="form-control" name="lap_ram" disabled id="lap_ram" style="height:38px;width:50%; padding:5px;">
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
                    <label for="lap_processor"><?php echo get_phrase('Processador');?></label>
                    <input type="text" class="form-control" name="lap_processor" id="lap_processor" value="<?=$lap->lap_processor?>" readonly>
                  </div>
                  </td>
                  <td style="border-top: none;">
                    <div class="form-group">
                    <label for="lap_size"><?php echo get_phrase('Tamanho');?></label>
                     <input type="text" class="form-control" name="lap_size" readonly id="lap_size" value="<?=$lap->lap_size;?>">
                  </div>
                  </td>
                </tr>
                <tr>
                  <td style="border-top: none;">
                    <div class="form-group">
                    <label for="lap_hdd"><?php echo get_phrase('Capacidade do HDD');?></label>
                    <select class="form-control" name="lap_hdd" id="lap_hdd" disabled>
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
                    <label for="lap_descricao"><?php echo get_phrase('Descrição');?></label>
                    <textarea class="form-control" rows="3" name="lap_descricao"  readonly id="lap_descricao"><?=$lap->lap_descricao;?></textarea>
                  </div>
                  </td>
               </tr>   
                <tr>
                  <td style="border-top: none;">
                    <div class="form-group">
                      <label for="product_price"><?php echo get_phrase('Preço do Produto');?></label>
                      <input type="text" name="product_price" id="product_price" class="form-control" value="<?=$lap->product_price;?>" readonly>
                    </div>
                  </td>
                </tr>
              </table>
            <!-- /.card -->
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info" id="update_mobile" name="update_mobile"><?php echo get_phrase('Actualizar Estado');?></button>
          </div>
          <?=form_close();?>
        
        </div>
        <!-- /.card -->

     </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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

<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url();?>assets/vendedor/dist/js/pages/dashboard2.js"></script>


</body>
</html>