<!-- in /templates/Users/login.php -->
<?php $this->layout = "CakeLte.login" ?>
<?= $this->Flash->render() ?>

<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg font-weight-bold"><?= __('USUARIOS') ?></p>

    <?= $this->Form->create() ?>

    <?= $this->Form->control('username', [
      'required' => true,
      'label' => false,
      'placeholder' => __('username'),
      'append' => '<i class="fas fa-user"></i>'
    ]) ?>

    <?= $this->Form->control('password', [
      'required' => true,
      'label' => false,
      'placeholder' => __('Contraseña'),
      'append' => '<i class="fas fa-lock"></i>'
    ]) ?>

    <div class="row">
      <!-- /.col -->
      <div class="ml-2">
        <?= $this->Form->control(__('Iniciar Sesión'), ['type'=>'submit', 'class'=>'btn btn-primary btn-block']) ?>
      </div>
      <!-- /.col -->
    </div>

    <?= $this->Form->end() ?>


    <!-- /.social-auth-links -->

    <!-- <p class="mb-0 mt-3 ml-2">
      <//?= $this->Html->link(__('Registrarme'), ['action' => 'register']) ?>
    </p> -->

  </div>
  <!-- /.login-card-body -->
</div>
