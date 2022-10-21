<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary $beneficiary
 * @var string[]|\Cake\Collection\CollectionInterface $persons
 * @var string[]|\Cake\Collection\CollectionInterface $kins
 */
?>

<style>
    .error {
        color: red;
    }
</style>
<div class="row">
    <aside class="column">

    </aside>
    <div class="column-responsive column-80 form-group mx-auto">
        <div class="beneficiary form content form-group-lg card">
            <?= $this->Form->create($beneficiary, ['id' => 'form_beneficiario']) ?>
            <fieldset class="card-body">
                <legend class="text-center font-weight-bold text-uppercase"><i class="fas fa-address-card"></i> <?= __('Actualizar Beneficiario') ?></legend>

                <?php
                    echo $this->Form->control('person_id', ['type' => 'hidden']);
                ?>
                <div class="form-row">
                <div class="form-group col-md-6">
                <?php
                    echo $this->Form->control('nombre', ['placeholder' => 'Introducir nombre' ]);
                ?>
                </div>
            <div class="form-group col-md-6">
                <?php
                    echo $this->Form->control('apellido', ['placeholder' => 'Introducir apellido' ]);
                ?>
            </div>
            </div>
            <div class="form-group">
                <?php
                    echo $this->Form->control('edad', ['placeholder' => 'Introducir edad', 'type' => 'number' ]);
                ?>
                 <?php
                    echo $this->Form->control('cedula', ['placeholder' => 'Ingrese su cedula de identidad', 'type' => 'number' ]);
                ?>
                <small class="form-text text-muted ml-2" style="margin-top: -12px;">Ejemplo: &nbsp; V- 5812144 </small>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <?php
                    echo $this->Form->control('gender_id', ['label' => 'Genero', 'options' => $genders]);
                ?>
            </div>
            <div class="form-group col-md-6">
                <?php
                    echo $this->Form->control('kin_id', ['label' => 'Parentesco', 'options' => $kins ]);
                ?>
            </div>
        </div>
        <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-primary btn-block']) ?>
            </fieldset>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script>

/* METODO PARA SOLO CARACTERERS MAYUSUCULAS */
$.validator.addMethod("noCaps", function(value, element) {
   return this.optional(element) || /[A-Z]/.test(value);
}, "You are not permitted to input more than three uppercase letters in a row!");

$('#form_beneficiario').validate({

rules: {
    cedula: {
        required: true,
        number: true,
        minlength: 4,
        number:true,

    },
    nombre: {
        required: true,
        minlength: 3,
        maxlength: 50,
        noCaps: true,

    },
    apellido: {
        required: true,
        minlength: 3,
        maxlength: 50,
        noCaps: true,
    },

    gender_id: {
        required: true
    },

    kin_id: {
        required: true
    },

    edad:{
        required: true,
        min:0,
        max:105,
        number:true
    }

},

messages: {
        cedula: {
            required: "Por favor ingrese la cedula de identidad",
            number: "Por favor ingrese solo numeros",
            minlength: "Por favor ingrese una cedula valida",
            number: 'Ingrese solo numeros',

        },
        nombre: {
            required: "Por favor ingrese el nombre",
            minlength: "Por favor ingrese un nombre valido",
            maxlength: "Por favor ingrese un nombre valido",
            noCaps: "Solo caracteres en mayusculas"

        },
        apellido: {
            required: "Por favor ingrese el apellido",
            minlength: "Por favor ingrese un apellido valido",
            maxlength: "Por favor ingrese un apellido valido",
            noCaps: "Solo caracteres en mayusculas"
        },

        gender_id: {
            required: 'Por favor seleccione su genero',
        },

        kin_id: {
            required: 'Por favor seleccione el parantesco',
        },

        edad:{
            required: 'Ingrese la edad del titular',
            min: 'Por favor ingrese una edad valida',
            max: 'Por favor ingrese una edad valida',
            number: 'Ingrese solo numeros'
        }
    }

});






</script>

