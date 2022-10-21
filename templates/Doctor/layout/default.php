<!DOCTYPE html>
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */


?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= strip_tags('APS') ?></title>

  <?= $this->Html->meta('icon') ?>
  <?= $this->fetch('meta') ?>
  <?=  $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));  ?>



  <!-- Font Awesome Icons -->
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.css') ?>
  <!-- icheck bootstrap -->
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Theme style -->
  <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css" integrity="sha384-GzaBcW6yPIfhF+6VpKMjxbTx6tvR/yRd/yJub90CqoIn2Tz4rRXlSpTFYMKHCifX" crossorigin="anonymous">

  <?= $this->Html->css('CakeLte.style') ?>

  <?= $this->element('layout/css') ?>

  <?= $this->fetch('css') ?>
  <?= $this->fetch('meta') ?>
  <?= $this->fetch('script') ?>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
      <?= $this->element('header/main') ?>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-danger elevation-4">
      <!-- Brand Logo -->
      <?php if ($this->request->getParam('prefix') == 'Admin'): ?>
      <a href="<?= $this->Url->build('/admin') ?>" class="brand-link">
      <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:50px;']);?>
        <span class="brand-text font-weight-light">APS</span>
      </a>
      <?php else: ?>
      <a href="<?= $this->Url->build('/') ?>" class="brand-link">
      <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:50px;']);?>
        <span class="brand-text font-weight-light">APS</span>
      </a>

      <?php endif; ?>
      <!-- Sidebar -->
      <div class="sidebar">
        <?= $this->element('sidebar/main') ?>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <?= $this->element('content/header') ?>
        </div><!-- /.container-fluid -->
      </div>

      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <?= $this->Flash->render() ?>
          <?= $this->fetch('content') ?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <?= $this->element('aside/main') ?>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <?= $this->element('footer/main') ?>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables/jquery.dataTables.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.all.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/select2/js/select2.min.js') ?>
  <!-- Bootstrap 4 -->
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
  <!-- AdminLTE App -->
  <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>

  <?= $this->element('layout/script') ?>

  <?= $this->fetch('script') ?>

  <script>
     var csrfToken = $('meta[name="csrfToken"]').attr('content');

  
$(".salir").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.salir', function () {
    let delete_form = $(this).parent().find('a');
    swal.fire({
        title: "¿Desea eliminar al titular?",
        text: "Una vez eliminado/a, no se podra recuperar a este titular.",
        icon: "warning",
        confirmButtonText: 'Si, eliminar',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',

    }).then((result) => {
            if (result.value) {

                /* swal.fire(
                    '¡Eliminado!',
                    'El recipe ha sido eliminado.',
                    'success'
                ) */
                delete_form.submit();

            }else{

                    swal.fire(
                    'Cancelado',
                    'La eliminación del titular ha sido cancelada.',
                    'error'
                )

            }
        });
});




  </script>


</body>

</html>
