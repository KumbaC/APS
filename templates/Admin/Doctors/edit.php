<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor $doctor
 * @var string[]|\Cake\Collection\CollectionInterface $specialties
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $turns
 */
?>
<?= $this->Html->css('select2.css') ?>
<style>
    .error{
        color: red;
    }
</style>


<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-center text-uppercase font-weight-bold"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista Doctores'), ['action' => 'index'], ['class' => 'btn btn-danger side-nav-item']) ?>
        </div>
    </aside>

    <div class="column-responsive column-80 card mx-auto" style="width: 500px;">
        <div class="doctors form content card-body">
            <?= $this->Form->create($doctor, ['type' => 'file', 'id' => 'form_doctor']) ?>
            <fieldset>
                <legend class="text-center font-weight-bold text-uppercase"><i class="fas fa-user-md"></i> <?= __('Añadir Doctor') ?></legend>
                    <div class="form-row">
                        <div class="form-group col-md-6"><?php  echo $this->Form->control('nombre', ['placeholder' => 'Introduzca el nombre','required']);?></div>
                        <div class="form-group col-md-6"><?php  echo $this->Form->control('apellido', ['placeholder' => 'Introduzca el apellido', 'required']);?></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6"><?php  echo $this->Form->control('cedula', ['placeholder' => 'Introduzca su cedula', 'required', 'type' => 'number' , 'min' => '1']);?></div>
                        <div class="form-group col-md-6"><?php  echo $this->Form->control('email', ['label' => 'Correo Electronico', 'placeholder' => 'Ingrese su correo', 'required', 'type' => 'email']);?></div>
                     </div>

                     <div class="form-row">
                        <div class="form-group col-md-6"> <?php  echo $this->Form->control('telefono', ['required', 'type' => 'number', 'min' => '1']);?></div>
                        <div class="form-group col-md-6"> <?php  echo $this->Form->control('telefono_secundario', ['type' => 'number', 'min' => '1']);?></div>
                    </div>

                    <div class="form-group"><?php  echo $this->Form->control('specialty_id', ['options' => $specialties, 'label' => 'Especialidad', 'id' => 'especialidad']);?></div>

                    <div class="form-group"><?php  //echo $this->Form->control('turns._ids', ['options' => $turns, 'id' => 'turno', 'label' => 'Turnos', 'required', 'title' => 'Por favor seleccione un turno.']); ?></div>
                    <div class="form-group"><?php //echo $this->Form->control('cupos', ['type' => 'hidden', 'value' => 5]);  ?></div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php  echo $this->Form->control('firma_file', ['label' => 'Firma Electronica', 'type' => 'file']);?>
                        </div>
                        <div class="form-group col-md-6">
                            <?php  echo $this->Form->control('sello_file', ['type' => 'file','label' => 'Sello:']);?>
                        </div>
                    </div>

            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>




<!--     <div class="column-responsive column-80">
        <div class="doctors form content">
            <?//= $this->Form->create($doctor) ?>
            <fieldset>
                <legend><?//= __('Add Doctor') ?></legend>
                <?php
                    /* echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('cedula');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('email');
                    echo $this->Form->control('specialty_id', ['options' => $specialties, 'empty' => true]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('firma');
                    echo $this->Form->control('sello');
                    echo $this->Form->control('telefono_secundario');
                    echo $this->Form->control('cupos');
 */
                ?>
            </fieldset>
            <?//= $this->Form->button(__('Submit')) ?>
            <?//= $this->Form->end() ?>
        </div>
    </div> -->
</div>

<?= $this->Html->script('jquery.js') ?>
<?= $this->Html->script('select2.js') ?>
<?= $this->Html->script('jquery.validate.js') ?>
<?= $this->Html->script('additional-methods.js') ?>
<script>
$("#especialidad").select2({
    width: 'resolve',
    theme: 'classic' // need to override the changed default
});
$("#turno").select2({
    width: 'resolve',
    theme: 'classic' // need to override the changed default
});

$('#form_doctor').validate({
    rules: {
        nombre: {
            required: true,
            minlength: 3
        },
        apellido: {
            required: true,
            minlength: 3
        },
        cedula: {
            required: true,
            minlength: 3,
            maxlength: 11
        },
        email: {
            required: true,
            email: true
        },
        telefono: {
            required: true,
            minlength: 3,
            maxlength: 11
        },
      /*   telefono_secundario: {
            required: true,
            minlength: 3,
            maxlength: 11
        }, */
         firma_file: {
            required: true,
            extension: "png|jpg|jpeg"
        },
        sello_file: {
            required: true,
            extension: "png|jpg|jpeg"
        }

    },

    messages: {
        nombre: {
            required: "Por favor ingrese su nombre",
            minlength: "Su nombre debe tener al menos 3 caracteres"
        },
        apellido: {
            required: "Por favor ingrese su apellido",
            minlength: "Su apellido debe tener al menos 3 caracteres"
        },
        cedula: {
            required: "Por favor ingrese su cedula",
            minlength: "Su cedula debe tener al menos 3 caracteres",
            maxlength: "Su cedula debe tener maximo 10 caracteres"
        },
        email: {
            required: "Por favor ingrese su correo",
            email: "Por favor ingrese un correo valido"
        },
        telefono: {
            required: "Por favor ingrese su telefono",
            minlength: "Su telefono debe tener al menos 3 caracteres",
            maxlength: "Su telefono debe tener maximo 10 caracteres"
        },
        /* telefono_secundario: {
            required: "Por favor ingrese su telefono secundario",
            minlength: "Su telefono secundario debe tener al menos 3 caracteres",
            maxlength: "Su telefono secundario debe tener maximo 10 caracteres"
        }, */
         firma_file: {
            required: "Por favor cargue su firma",
            extension: "Por favor cargue una imagen con formato png, jpg o jpeg"
        },
        sello_file: {
            required: "Por favor cargue su sello",
            extension: "Por favor cargue una imagen con formato png, jpg o jpeg"
        }

    }

});

</script>

