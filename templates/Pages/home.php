<?php
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');

$userName = $session->read('Auth.User.full_name');

?>

<div class="row">
  <div class="col-12 text-center">
<br>


  </div>

<br><br>
  <div class="card mb-3">
  <?= $this->Html->image('covid.jpg', ['fullBase' => true]) ?>
  <div class="card-body">

  <p class="h3 font-weight-bold text-center text-uppercase">Bienvenido  <?= $userName ?> <i class="fas fa-laptop-medical"></i>  </p>
    <!-- <p class="card-text"><small class="text-muted">..</small></p> -->
  </div>
</div>




  <div class="col-12">

      <//?php Debugger::checkSecurityKeys(); ?>
  </div>
</div>



<!------------------------------>



<style media="screen">
  ul {
    list-style-type: none;
  }
  .bullet::before {
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      font-size: 18px;
      display: inline-block;
      margin-left: -1.3em;
      width: 1.2em;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      vertical-align: -1px;
  }
  .success::before {
      color: #88c671;
      content: "\f058";
  }
  .problem::before {
    color: #d33d44;
    content: "\f057";
  }

</style>
