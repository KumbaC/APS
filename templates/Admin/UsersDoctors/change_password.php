<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDoctor $usersDoctor
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<style>
    .error{
        color:red;
    }
</style>

    <div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            
            <?= $this->Html->link(__('Lista de usuarios'), ['action' => 'index'], ['class' => 'side-nav-item text-uppercase font-weight-bold btn btn-danger']) ?>
        </div>
    </aside>
    </div>
    <div class="row d-flex justify-content-center">
    <div class="column-responsive ">
        <div class="usersDoctors form content card">
            <?= $this->Form->create($usersDoctor, ['id' => 'formchange']) ?>
            <fieldset class="card-header">
                <legend class="text-uppercase font-weight-bold "><?= __('Cambiar contraseña') ?></legend>
                <?php
                    
                    //echo $this->Form->control('password', ['label' => 'Vieja contraseña', 'disabled' => true, 'id' => 'contraseña']);

                    echo $this->Form->control('password', ['label' => 'Contraseña', 'value' => '', 'placeholder' => 'Nueva contraseña', 'id' => 'contraseña']);

                    echo $this->Form->control('password_confirm', ['label' => 'Confirmar contraseña', 'value' => '', 'placeholder' => 'Confirma contraseña', 'type' => 'password']);
                
                ?>
            
            <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-block btn-primary text-uppercase font-weight-bold']) ?>
            <?= $this->Form->end() ?>
            </fieldset>
        </div>
    </div>
</div>


<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js" integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

$('form#formchange').validate({

    rules: {
        password: {
            required: true,
            minlength: 5
        },
        password_confirm: {
            required: true,
            minlength: 5,
            equalTo: "#contraseña"
        }
    },

    messages: {
        password: {
            required: 'Por favor, este campo es obligatorio',
            minlength: 'El mínimo de caracteres permitidos son 3'
        },

        password_confirm: {
            required: 'Por favor, este campo es obligatorio',
            minlength: 'El mínimo de caracteres permitidos son 3',
            equalTo: 'La contraseñas deben ser iguales'
        },
        
    }

  });




</script>