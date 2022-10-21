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
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?=  ''. '  ' . $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

<!--     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lumen/bootstrap.min.css" integrity="sha384-GzaBcW6yPIfhF+6VpKMjxbTx6tvR/yRd/yJub90CqoIn2Tz4rRXlSpTFYMKHCifX" crossorigin="anonymous">
 -->
  <!-- Font Awesome Icons -->
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/3.2.1/css/animsition.css" integrity="sha512-JEslR3QY8qua/uihUh9OGYKdPpPEt4r0m0sZ1y2F9rJ6N3ITYApyDP1+rD+Rwy0nnk/qGjtZhmqB3+Hi6QP3Ug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

<style>
		@media only screen and (min-width : 768px) {
			.errors .panel {
				width: 900px;
		    }
		}

		@media only screen and (min-width : 992px) {
			.errors .panel {
				width: 600px;
		    }
		}
	</style>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/breakpoints-js@1.0.6/dist/breakpoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/3.2.1/js/animsition.min.js" integrity="sha512-A6ariLe+TnwXgF0FtGuOAZB4MuNxxS1W+NvJZxN3fcXYtcrxHu7Z8yJ2MBk7MwnZuG70ksTGdAUyUEbbXW6Imw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
		Breakpoints();
</script>
<body class="page-error layout-full site-menubar-fold">
	<!-- Page -->
	<div class="page animsition vertical-align text-center errors" data-animsition-in="fade-in" data-animsition-out="fade-out" style="animation-duration: 800ms; opacity: 1; margin-top:25rem;">
		<div class="page-content vertical-align-middle">
			<div class="panel panel-bordered animation-slide-top">
				<div class="panel-body">
					<?= $this->Html->image('logo.png'); ?>
					<div class="h2"><?= $this->fetch('content') ?></div>

					<div class="mt-4">
						<hr>
						<p class="error-advise text-justify h3"><?= __('SI EL PROBLEMA PERSISTE, POR FAVOR CONTACTE AL ADMINISTRADOR DEL SISTEMA A TRAVÉS DE LA SIGUIENTE DIRECCIÓN DE CORREO ELECTRÓNICO {0}.',    '<strong>email@domnio.com</strong>')?></p>
						<a class="btn btn-primary btn-round btn-lg" href="javascript:history.back()"><?= __('IR A LA PÁGINA PRINCIPAL'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page -->
</body>
<script type="text/javascript">
$(document).ready(function() {
  $(".animsition").animsition({
    inClass: 'fade-in',
    outClass: 'fade-out',
    inDuration: 1500,
    outDuration: 800,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: false,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 5000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : false,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
  });
});


</script>
</html>
