<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 * @var \Cake\Collection\CollectionInterface|string[] $departments
 * @var \Cake\Collection\CollectionInterface|string[] $status
 * @var \Cake\Collection\CollectionInterface|string[] $cargos
 * @var \Cake\Collection\CollectionInterface|string[] $usersInternals
 * @var \Cake\Collection\CollectionInterface|string[] $units
 * @var \Cake\Collection\CollectionInterface|string[] $genders
 */


$departments_list = [];
$units_list = [];

foreach($departments as $department) {
    $departments_list[$department->id] = $department->descripcion;


   foreach($department->units as $unit){
       $units_list[$department->id][$unit->id] =  ' ' . $unit->descripcion . ' ';

   }
}


?>
<style>
   .error{
    color:red;
   }
</style>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.css') ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Titulares'), ['action' => 'index'], ['class' => 'btn btn-danger side-nav-item']) ?>
        </div>
    </aside>
    <br>
    <div class="card mx-auto" style="width: 600px;">
        <div class="card-body">
            <?= $this->Form->create($person, ['id' => 'form_person']) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold text-center"><?= __('Modificar titular') ?></legend>
                
                
               
                 <div class="col-md-14">
                     <?php   echo $this->Form->control('email', ['label' => 'Correo Electronico', 'placeholder' => 'titular@sudeaseg.gob.ve']); ?>
                 </div>

                 <div class="form-row">
                    <div class="col">
                 <?php   echo $this->Form->control('department_id', ['id' => 'departamento', 'label' => 'División' ,'options' => $departments_list, 'empty' => 'SELECCIONA DEPARTAMENTO', 'style' => 'width: 270px;']); ?>

                </div>
                 <div class="">
                 <?php   echo $this->Form->control('unit_id', ['id' => 'unidad', 'disabled', 'label' => 'Unidades', 'options' => $units_list, 'empty' => true, 'style' => 'width: 270px;']); ?>
                 </div></div>

                 <div class="form-row">
                    <div class="col">
                 <?php   echo $this->Form->control('cargo_id', ['id'=>'cargo', 'options' => $cargos, 'empty' => 'SIN CARGO']); ?>
                 </div>
                 <div class="col">
                 <?php   echo $this->Form->control('gender_id', ['id'=>'genero','label' => 'Genero', 'options' => $genders]); ?>
                 </div></div>

                 <div class="form-row">
                 <div class="col">
                  <?php   echo $this->Form->control('phone', ['label' => 'Telefono/Extensión', 'placeholder' => '0424/1000']); ?>
                 </div>
                 <div class="col">
                 <?php   echo $this->Form->control('edad', ['placeholder' => 'Por favor ingrese su edad']); ?>
                 </div></div>



            </fieldset>
            <br>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block' ]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.js') ?>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/select2/js/select2.full.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/select2/js/i18n/es.js') ?>
<script>


var units = <?= json_encode($units_list);  ?>;
var unidad = document.getElementById('unidad');

$(document).ready(function(){
         $('#departamento').change(function(){

  var departamentoId = $(this).val();

  var unitObject = units[departamentoId];

  $('#unidad option:gt(0)').remove();
  var departamentoSelect = $('#unidad');
  $('#unidad').empty();
  $('#unidad').append('<option value="">SELECCIONAR UNIDAD</option>');
  unidad.disabled = false;
  $.each(unitObject, function(key,value) {
     departamentoSelect.append($("<option></option>").attr("value", key).text(value));
    });

  });

});


/* METODO PARA SOLO CARACTERERS MAYUSUCULAS */
$.validator.addMethod("noC", function(value, element) {
   return this.optional(element) || /[A-Z]/.test(value); 
}, "You are not permitted to input more than three uppercase letters in a row!");


$('#departamento').select2({
    language: "es",
    theme: 'bootstrap4',
   
});
$('#unidad').select2({
    language: "es",
    theme: 'bootstrap4',
    
});
$('#cargo').select2({
    language: "es",
    theme: 'bootstrap4',
    
});
$('#genero').select2({    
    language: "es",
    theme: 'bootstrap4',
    minimumResultsForSearch: Infinity

});





$('#form_person').validate({

        rules: {
            cedula: {
                required: true,
                number: true,
                minlength: 6,
                maxlength: 8,
                number:true,

            },
            nombre: {
                required: true,
                minlength: 3,
                maxlength: 50,
                noC: true,

            },
            apellido: {
                required: true,
                minlength: 3,
                maxlength: 50,
                noC: true,
            },
            email: {
                required: true,
                email: true
            },
            department_id: {
                required: true
            },
            /* unit_id: {
                required: true
            }, */
            cargo_id: {
                required: true
            },
            gender_id: {
                required: true
            },
            phone:{
                required: true,
                number:true,
                min:11
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
                    required: "Por favor ingrese la cedula del titular",
                    number: "Por favor ingrese solo numeros",
                    minlength: "Por favor ingrese una cedula valida",
                    number: 'Ingrese solo numeros',

                },
                nombre: {
                    required: "Por favor ingrese el nombre del titular",
                    minlength: "Por favor ingrese un nombre valido",
                    maxlength: "Por favor ingrese un nombre valido",
                    noC: "Solo caracteres en mayusculas"

                },
                apellido: {
                    required: "Por favor ingrese el apellido del titular",
                    minlength: "Por favor ingrese un apellido valido",
                    maxlength: "Por favor ingrese un apellido valido",
                    noC: "Solo caracteres en mayusculas"
                },
                email: {
                    required: "Por favor ingrese el correo electronico",
                    email: "Por favor ingrese un correo electronico valido",
                },
                department_id: {
                    required: "Por favor seleccione un departamento",
                },
               /*  unit_id: {
                    required: "Por favor seleccione una unidad",
                }, */
                cargo_id: {
                    required: "Por favor seleccione un cargo",
                },
                gender_id: {
                    required: 'Por favor seleccione su genero',
                },
                phone:{
                    required: 'Ingrese el numero de telefono',
                    number: 'Ingrese solo numeros',
                    min: 'Ingrese un numero de telefono de valido'
                },
                edad:{
                    required: 'Ingrese la edad del titular',
                    min: 'Por favor ingrese una edad valida',
                    max: 'Por favor ingrese una edad valida',
                    number: 'Ingrese solo numeros'
                },
            }

        });





</script>
