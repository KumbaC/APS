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


$hora = time();
$fecha = date('d-m-Y');


$specialties_list = [];
$doctors_list = [];

foreach($specialties as $specialty) {
    $specialties_list[$specialty->id] = $specialty->descripcion;


   foreach($specialty->doctors as $doctor){
       $doctors_list[$specialty->id][$doctor->id] =  'Dr.' . ' ' . $doctor->nombre . ' ' . $doctor->apellido;

   }
}


$person_list = [];
$beneficiary_list = [];

foreach($persons as $person) {
    $person_list[$person->id] = $person->nombre;


   foreach($person->beneficiary as $beneficiary){
       $beneficiary_list[$person->id][$beneficiary->id] = [$beneficiary->nombre];

   }
}



?>
<style>
    .error{
        color: red;
    }
</style>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"> <i class="fas fa-tools"></i> <?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de consultas'), ['action' => 'index'], ['class' => 'text-uppercase font-weight-bold btn btn-danger side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="quotes form content card-body">
            <?= $this->Form->create($quote, ['id' => 'form_consu']) ?>
            <fieldset>
                <legend class="text-center text-uppercase font-weight-bold"> <i class="fas fa-notes-medical"></i> <?= __('Añadir consulta') ?></legend>


                <div class="row">
                    <div class="col">
                  <?php  echo $this->Form->control('asunto', ['placeholder' => 'Agregar asunto']);  ?>
                  </div>

                  <div class="col">
                  <?php  echo $this->Form->control('nota', ['placeholder' => 'Agregar una nota']); ?>
                  </div>
                </div>

                   <?php  echo $this->Form->control('specialty_id', ['id' => 'especialidad', 'label' => 'Especialidad', 'options' => $specialties_list, 'empty' => 'Seleccione una especialidad', 'require' => true]); ?>
                   <?php  echo $this->Form->control('doctor_id', ['id'=>'doctor', 'label' => 'Doctores', 'options' => [], 'empty' => 'Seleccione una doctor', 'required' => true]); ?>
                    <?php  echo $this->Form->control('beneficiary_id', ['id'=>'beneficiary','type' => 'hidden', 'empty' => true, 'required' => true]); ?>


                   <div class="row">
                    <div class="col">
                  <?php  echo $this->Form->control('fecha', ['empty' => true, 'class' => 'required']); ?>
                  </div>
                  <div class="col">
                  <?php  echo $this->Form->control('hora', ['type'=> 'text', 'empty' => true, 'class' => 'required', 'placeholder' => 'Ejemplo: 12:00']); ?>
                  </div>
                </div>


                   <?php  echo $this->Form->control('status_quote_id', ['label'=>'Estatus', 'options' => $statusQuotes]); ?>

                <br> <br>
            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js" integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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




});

jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});



$('#form_consu').validate({
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
        hora:
        {
            required: true,
            time: true
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
            time: 'Este campo debe contener una hora válida'
        }

    }
  });



</script>
