<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var \Cake\Collection\CollectionInterface|string[] $specialties
 * @var \Cake\Collection\CollectionInterface|string[] $doctors
 * @var \Cake\Collection\CollectionInterface|string[] $beneficiary
 * @var \Cake\Collection\CollectionInterface|string[] $persons
 * @var \Cake\Collection\CollectionInterface|string[] $statusQuotes
 * @var \Cake\Collection\CollectionInterface|string[] $status
 */

use function PHPSTORM_META\type;

$hora = time();
$fecha = date('d-m-Y');


$specialties_list = [];
$doctors_list = [];

foreach($specialties as $specialty) {
    $specialties_list[$specialty->id] = $specialty->descripcion;


   foreach($specialty->doctors as $doctor){
       $doctors_list[$specialty->id][$doctor->id] = 'Dr.' . ' ' . $doctor->nombre . ' ' . $doctor->apellido;

   }
}


 $person_list = [];
$beneficiary_list = [];

foreach($persons as $person) {
    $person_list[$person->id] = $person->nombre;


   foreach($person->beneficiary as $beneficiary){
       $beneficiary_list[$person->id][$beneficiary->id] = 'Dr.' . ' ' . $beneficiary->nombre . ' ' . $beneficiary->apellido;;

   }
}

?>
<style>
    .error{
        color:red;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet" />
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading font-weight-bold text-uppercase text-center"> <i class="fas fa-tools"></i>  <?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Consultas'), ['action' => 'index'], ['class' => 'btn btn-danger font-weight-bold text-uppercase side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="quotes form content card-body">
            <?= $this->Form->create($quote, ['id' => 'form_consu']) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold text-center"><i class="fas fa-notes-medical"></i> <?= __('Agregar una consulta') ?></legend>
                <div class="row">
                    <div class="col">
                  <?php  echo $this->Form->control('asunto', ['placeholder' => 'Agregar asunto', 'class' => 'required', 'type' => 'textarea']);  ?>
                  </div>

                 
                </div>


                  <?php  echo $this->Form->control('specialty_id', ['id' => 'especialidad', 'label' => 'Especialidades', 'options' => $specialties_list, 'empty' => 'Seleccione una especialidad', 'class' => 'required']); ?>



                  <?php  echo $this->Form->control('doctor_id', ['id'=>'doctor', 'options' => [], 'empty' => 'Seleccione una doctor', 'label' => 'Doctores']); ?>

                <div class="row">
                  <div class="col">
                  <?php  echo $this->Form->control('fecha', ['empty' => true, 'title' => 'Por favor ingrese la fecha',  'class' => 'required',  'type' => 'text', 'placeholder' => 'YYYY/MM/DD']); ?>
                  </div>

                  <div class="col">
                  <?php  echo $this->Form->control('hora', ['type'=> 'text', 'empty' => true, 'placeholder' => 'Ejemplo: 00:00']); ?>
                  </div>
                </div>

                <div class="col-md-14">
                  <?php  echo $this->Form->control('status_quote_id', ['type' => 'hidden', 'value'=> 2, 'options' => $statusQuotes, 'label' => 'Estatus']); ?>
                </div>
                  <br><br>

            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js" integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?= $this->Html->script('bootstrap-datepicker.min') ?>
<?= $this->Html->script('bootstrap-datepicker.es') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script>

var doctors = <?= json_encode($doctors_list);  ?>;
var beneficiary = <?= json_encode($beneficiary_list);  ?>;
$(document).ready(function(){
         $('#especialidad').change(function(){

  var especialidadId = $(this).val();

  var doctorsObject = doctors[especialidadId];

  $('#doctor option:gt(0)').remove();
  var doctorSelect = $('#doctor');
  $('#doctor').empty();
  $('#doctor').append('<option value="">Seleccione un doctor</option>');
  $.each(doctorsObject, function(key,value) {
     doctorSelect.append($("<option></option>").attr("value", key).text(value));
    });

  });
/* Persona a Beneficiario */
  $('#person').change(function(){

var personId = $(this).val();

var beneficiaryObject = beneficiary[personId];

$('#beneficiary option:gt(0)').remove();
var beneficiarySelect = $('#beneficiary');
$('#beneficiary').empty();
$('#beneficiary').append('<option value="">Seleccione un beneficiario</option>');
$.each(beneficiaryObject, function(key,value) {
   beneficiarySelect.append($("<option></option>").attr("value", key).text(value));
  });

});


});

    $('[name="fecha"]')
    .datepicker({
      format: "yyyy-mm-dd",
      language: 'es',
      daysOfWeekDisabled: [0, 6],
      startDate: '+0d',
      endDate:  '2030-12-31',
      todayBtn: 'linked',
      orientation: 'bottom',
      todayHighlight: true,
      clearBtn: true,
    }),
    $('[name="hora"]').datetimepicker({
          datepicker: false,
          format: 'H:i',
          allowTimes:[
            '08:00','09:00','10:00','11:00', '12:00', '13:00','14:00', '15:00',
            '16:00',
        ]
        });


    $('[data-action=save]').click(function(e){
        e.stopPropagation();
        $('form#form_consu').submit();

     });





jQuery.validator.setDefaults({
  debug: false,
  success: "valid",
  //onsubmit: false
});


jQuery.validator.addMethod("dateVE", function(value, element) {
	return this.optional(element) || /^\d\d\d\d?[\.\/\-]\d\d?[\.\/\-]\d\d?$/.test(value);
}, "Vul hier een geldige datum in.");




$('form#form_consu').validate({

     rules: {
      asunto: {
        required: true,
        minlength: 3
      },
      nota: {
        required: true,
        minlength: 3
      },
      specialty_id: {
        required: true
      },

      doctor_id: {
            required: true
        },
      status_quote_id: {
            required: true
        },
        hora:{
            required: true,
            time: true
        },
        fecha:{
            required: true,
            dateVE: true
        }



    },
    messages: {
        asunto: {
            required: 'Este campo es obligatorio',
            minlength: 'El mínimo de caracteres permitidos son 3'
        },

        status_quote_id: {
            required: 'Este campo es obligatorio'
        },
        nota: {
            required: 'Este campo es obligatorio',
            minlength: 'El mínimo de caracteres permitidos son 3'
        },
        specialty_id: {
            required: 'Este campo es obligatorio'
        },
        doctor_id: {
            required: 'Este campo es obligatorio'
        },
         hora:{
            required: 'Este campo es obligatorio',
            time: 'Este campo debe ser una hora válida'
        },
        fecha:{
            required: 'Este campo es obligatorio',
            dateVE: 'Introduzca una fecha válida'
        }


    }




  });
</script>
