<?php

use Composer\Util\AuthHelper;

$session = $this->request->getSession();
$session = $this->request->getAttribute('session');
//$prefix = $this->request->getParam('prefix');


$userDoctor = $session->read('Auth.User.full_name');
?>

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <!-- Imagen del usuario -->
  <div class="image">
    <?= $this->Html->image('perfil_medico.png', ['class'=>'img-circle elevation-2', 'alt'=>'Avatar Perfil']) ?>
  </div>
  
  <div class="info">
    <a href="#" class="d-block ml-2 text-uppercase font-weight-bold"> <?= $userDoctor ?> </a>
  </div>
 
</div>