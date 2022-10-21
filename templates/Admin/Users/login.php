<!-- in /templates/Users/login.php -->
<?php $this->layout = "CakeLte.login" ?>


<?= $this->Flash->render() ?>


<div class="card">
  <div class="card-body login-card-body">
  <p class="login-box-msg font-weight-bold"> <?= $this->html->image('logo2.png', ['style'=>'height:140px; width:280px; margin-left:-30px;']) ?></p>
    <p class="login-box-msg font-weight-bold"><?= __('ADMINISTRADOR') ?></p>

    <?= $this->Form->create() ?>

    <?= $this->Form->control('username', [
      'required' => true,
      'label' => false,
      'placeholder' => __('Usuario'),
      'append' => '<i class="fas fa-user-tie"></i>'
    ]) ?>

    <?= $this->Form->control('password', [
      'required' => true,
      'label' => false,
      'placeholder' => __('Contraseña'),
      'append' => '<i class="fas fa-lock"></i>'
    ]) ?>

<!-- /.col -->
<div class="social-auth-links text-center mb-3">
            
            <?= $this->Form->control(__('Iniciar Sesión'), ['type'=>'submit', 'class'=>'btn btn-primary btn-block font-weight-bolder']) ?>
                
            </div>
    
   
    <?= $this->Form->end() ?>

    <div class="row d-flex justify-content-center">
      <!-- /.col -->
      

      <button class="btn btn-secondary btn-sm disabled">
       <a class="fas fa-user-tie text-white" style="margin-left:8px; font-size:17px;" href="<?= $this->Url->build(['prefix' => 'Admin', 'controller'=>'Users', 'action'=>'login']) ?>">
        <small class="text-sm font-weight-bolder" style="font-family: Arial;">Administrador</small>
      </a>
       <!-- <p class="text-dark" style="font-size:12px; font-style:initial;">Doctores</p> -->
      </button>

      <button class="btn btn-primary btn-sm">
       <a class="fas fa-user-nurse text-white" style="margin-left:8px; font-size:17px;" href="<?= $this->Url->build(['prefix' => 'Doctor', 'controller'=>'UsersDoctors', 'action'=>'login']) ?>">
        <small class="text-sm font-weight-bolder" style="font-family: Arial;">Medicos</small>
      </a>
       <!-- <p class="text-dark" style="font-size:12px; font-style:initial;">Doctores</p> -->
      </button>

      <button class="btn btn-primary btn-sm">
       <a class="fas fa-user text-white" style="margin-left:8px; font-size:17px;" href="<?= $this->Url->build(['prefix' => false, 'controller'=>'Users', 'action'=>'login']) ?>">
        <small class="text-sm font-weight-bolder" style="font-family: Arial;">Titular</small>
       </a>
       <!-- <p class="text-dark" style="font-size:12px; font-style:initial;">Administrador</p> -->
      </button>

     
    </div>
  
  </div>
 
</div>
