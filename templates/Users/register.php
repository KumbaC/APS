<?php

/**
 * @var \{{ namespace }}\View\AppView $this
 */
?>

<?php $this->layout = "CakeLte.login" ?>

<div class="card">
  <div class="card-body register-card-body">
    <p class="login-box-msg"><?= __('Registro de nuevos usuarios') ?></p>

    <?= $this->Form->create() ?>
    <?= $this->Form->control('person_id', [
      'options' => $persons,
      'placeholder' => __('Cedula'),
      'label' => false,
      'append' => '<i class="fas fa-address-card"></i>'
    ]) ?>

    <?= $this->Form->control('username', [
      'placeholder' => __('Correo electronico'),
      'label' => false,
      'append' => '<i class="fas fa-user"></i>',
      //'value' => $persons,
    ]) ?>

    <?= $this->Form->control('password', [
      'placeholder' => __('Contraseña'),
      'label' => false,
      'append' => '<i class="fas fa-lock"></i>'
    ]) ?>

    <?= $this->Form->control('password_confirm', [
      'type' => 'password',
      'placeholder' => __('Confirmar contraseña'),
      'label' => false,
      'append' => '<i class="fas fa-lock"></i>'
    ]) ?>

   <!--  <//?= $this->Form->control('role_id', [
      'options' => $roles,
      //'type' => 'hidden',
      'placeholder' => __('Roles'),
      'label' => false,
      'value' => $roles->id = 2,
      'append' => '<i class="fas fa-question-circle"></i>',
      //'disabled'

    ]) ?> -->



    <div class="row">
      <div class="col-8">
        <?= $this->Form->control('agree_terms', [
          'label' => 'Aceptar terminos.</a>',
          'type' => 'checkbox',
          'custom' => true,
          'escape' => false
        ]) ?>
      </div>
      <div class="col-4">
        <?= $this->Form->control(__('Registrarme'), [
          'type'=>'submit',
          'class'=>'btn btn-primary'
        ]) ?>
      </div>
    </div>

    <?= $this->Form->end() ?>


    <!-- /.social-auth-links -->

    <?= $this->Html->link(__('Ya estoy registrado'), ['action'=>'login']) ?>
  </div>
  <!-- /.register-card-body -->
</div>
