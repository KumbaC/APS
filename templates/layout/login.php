<?php

/**
 * @var \App\View\AppView $this
 * @var \CakeLte\View\Helper\CakeLteHelper $this->CakeLte
 */

?>

<!DOCTYPE html>
<html lang="en">
<style>
body{
    background-size: 1500px;
    background-repeat: no-repeat;
    background-image: url('<?= $this->Url->image('fondo.jpeg') ?>');
}
@media screen and (min-width:300px) and (max-width:500px) {
  body{
    background-size: 1800px;
    background-repeat: no-repeat;
  }
}
@media screen and (min-width:800px) and (max-width:1000px) {
  body{
    background-size: 500%;
    background-repeat: no-repeat;
  }
}
@media screen and (min-width:1600px) and (max-width:1800px) {
  body{
    background-size: 1800px;
    background-repeat: no-repeat;
  }
}
@media screen and (min-width:1800px) and (max-width:2000px) {
  body{
    background-size: 2200px;
    background-repeat: no-repeat;
  }
}
@media screen and (min-width:2600px) and (max-width:2800px) {
  body{
    background-size: 3200px;
    background-repeat: no-repeat;
  }
}
@media screen and (min-width:4200px) and (max-width:4600px) {
  body{
    background-size: 6000px;
    background-repeat: no-repeat;
  }
}
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= 'Ingresar'. ' | ' . strip_tags($this->CakeLte->getConfig('app-name')) ?></title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
    <!-- Theme style -->
    <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
    <?= $this->Html->css('CakeLte.style') ?>
    <?= $this->element('layout/css') ?>
    <?= $this->fetch('css') ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
           <!--  < ?= $this->html->image('logo2.png', ['style'=>'height:200px; width:320px; margin-left:-30px;']) ?> -->
        </div>
        
        <!-- /.login-logo -->
        <?= $this->Flash->render() ?>
        
        <?= $this->fetch('content') ?>
        
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
    <!-- Bootstrap 4 -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
    <!-- AdminLTE App -->
    <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>

    <?= $this->fetch('script') ?>
</body>

</html>