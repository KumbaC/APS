<?php

use Composer\Util\AuthHelper;

$session = $this->request->getSession();
$session = $this->request->getAttribute('session');
$prefix = $this->request->getParam('prefix');

$userName = $session->read('Auth.User.full_name');
$userDoctor = $session->read('Auth.User.username');
?>

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <!-- Imagen del usuario -->
 <!--  <div class="image">
     //$this->Html->image('CakeLte./AdminLTE/dist/img/user2-160x160.jpg', ['class'=>'img-circle elevation-2', 'alt'=>'User Image'])
  </div> -->
  <?php if($prefix == 'Admin'): ?>
  <div class="info">
    <a href="#" class="d-block ml-2"> <i class="far fa-user-circle"></i>&nbsp; &nbsp;  <?= $userName ?> </a>
  </div>
  <?php elseif($prefix == 'Doctor' || $prefix == 'doctor'): ?>
    <div class="info">
    <a href="#" class="d-block ml-2 text-uppercase"> <i class="far fa-user-circle"></i>&nbsp; &nbsp;  <?= $userDoctor ?> </a>
  </div>
  <?php else: ?>
    <div class="info">
     <a href="#" class="d-block ml-2"> <i class="far fa-user-circle"></i>&nbsp; &nbsp;  <?= $userName ?> </a>
    </div>
  <?php endif; ?>
</div>