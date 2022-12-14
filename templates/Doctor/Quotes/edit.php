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

?>
<style>
    .error{
        color:red;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet" />
<?= $this->Html->css('CakeLte./AdminLTE/plugins/select2/css/select2.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/summernote/summernote-bs4.css') ?>
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
                <legend class="text-uppercase font-weight-bold text-center"><i class="fas fa-notes-medical"></i> <?= __('Fecha de consulta medica') ?></legend>
                 
                <div class="row">
                  <div class="col">
                  <?php  echo $this->Form->control('fecha', ['empty' => true, 'label' => 'Fecha Tentativa', 'title' => 'Por favor ingrese la fecha',  'class' => 'required',  'type' => 'text', 'placeholder' => 'YYYY-MM-DD']); ?>
                  </div>

                   <div class="col">
                   <?php  echo $this->Form->control('hora', ['type'=> 'text', 'empty' => true, 'placeholder' => 'Ejemplo: 00:00']); ?>
                  </div> 
                </div>

              
                

            </fieldset>
            <?= $this->Form->button(__('Cambiar'), ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/select2/js/select2.min.js') ?>

<!-- TRADUCTOR A ESPAÑOL DE SELECT2  -->
<?= $this->Html->script('es.min.js') ?>
<!-- TRADUCTOR A ESPAÑOL DE SELECT2  -->

<?= $this->Html->script('CakeLte./AdminLTE/plugins/select2/js/i18n/es.js') ?>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js" integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?= $this->Html->script('bootstrap-datepicker.min') ?>
<?= $this->Html->script('bootstrap-datepicker.es') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script>

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
      //setEndDate: true,


    }),
    $('[name="hora"]').datetimepicker({
          datepicker: false,
          format: 'H:i',
          allowTimes:[
            '08:00', '08:30','09:00','9:30','10:00','10:30','11:00','11:30', '12:00', '13:00','14:00', '15:00',
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
