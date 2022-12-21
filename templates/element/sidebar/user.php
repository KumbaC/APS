<?php

use Composer\Util\AuthHelper;

$session = $this->request->getSession();
$session = $this->request->getAttribute('session');
//$prefix = $this->request->getParam('prefix');

$userName = $session->read('Auth.User.full_name');
?>

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <!-- Imagen del usuario -->
  <div class="image">
    <?= $this->Html->image('perfil.png', ['class'=>'img-circle elevation-2', 'alt'=>'Avatar Perfil']) ?>
  </div>
 
  <div class="info">
    <a href="#" class="d-block font-weight-bold" style="font-size:12px;"> </i>  <?= $userName ?> </a>
  </div>
 
</div>