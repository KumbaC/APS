<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 * @var \Cake\Collection\CollectionInterface|string[] $persons
 * @var \Cake\Collection\CollectionInterface|string[] $beneficiary
 * @var \Cake\Collection\CollectionInterface|string[] $doctors
 * @var \Cake\Collection\CollectionInterface|string[] $quotes
 * @var \Cake\Collection\CollectionInterface|string[] $clinicalHistories
 */
$fecha = date('Y-m-d');
?>

<style>
   .error{
    color:red;
   }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?= $this->Html->css('CakeLte./AdminLTE/plugins/summernote/summernote-bs4.css') ?>


<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de mis recipes'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-danger text-uppercase font-weight-bold']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="prescriptions form content card-body">
            <?= $this->Form->create($prescription, ['id' => 'form_recipe']) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold text-center"><?= __('Prescripción Medica') ?> </legend>



                   <?php echo $this->Form->control('descripcion', ['label' => 'Recipe', 'type' => 'textarea', 'id' => 'descripcion', 'placeholder' => 'Ejem: Atamel 50MG, Losartan 20MG' ]); ?>
                   <?php echo $this->Form->control('indicaciones', ['type' => 'textarea', 'id' => 'indiciaciones', 'label' => 'Indicaciones' ]); ?>

                   <?php //echo $this->Form->control('quote_id', ['options' => $quotes, 'empty' => true]); ?>
                   <?php //echo $this->Form->control('clinic_history_id', ['options' => $clinicalHistories, 'empty' => true]);  ?>
                   <?php echo $this->Form->control('fecha', ['label' => 'Fecha del recipe','type' => 'hidden', 'value' => $fecha]); ?>

            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block text-uppercase font-weight-bold' ]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery-validation/jquery.validate.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery-validation/additional-methods.min.js') ?>
<?= $this->Html->script("CakeLte./AdminLTE/plugins/summernote/summernote-bs4.js") ?>
<?= $this->Html->script("CakeLte./AdminLTE/plugins/summernote/lang/summernote-es-ES.js") ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

/* $('[name="fecha"]')
    .datepicker({
      format: "yyyy-mm-dd",

}), */


/* jQuery.validator.addMethod("dateVE", function(value, element) {
	return this.optional(element) || /^\d\d\d\d?[\.\/\-]\d\d?[\.\/\-]\d\d?$/.test(value);
}, "Vul hier een geldige datum in."); */

$(function () {
    // Summernote
    $('#descripcion').summernote({ lang: 'es-ES' })


    $(document).ready(function() {
  $('#descripcion').summernote({focus: true});
});

$('#indiciaciones').summernote({ lang: 'es-ES' })


$(document).ready(function() {
$('#indiciaciones').summernote();
});
  }),



$('#form_recipe').validate({
   rules: {
       descripcion: {
           required: true,
           minlength: 5
       },
       indicaciones: {
              required: true,
              minlength: 5,
              maxlength: 300
         },



       },

    messages: {
        descripcion: {
            required: "Por favor ingrese una descripcion",
            minlength: "La descripcion debe tener al menos 5 caracteres"
        },
        indicaciones: {
            required: "Por favor ingrese las indicaciones",
            minlength: "La indicacion debe tener al menos 5 caracteres",
            maxlength: "La indicacion debe tener maximo 300 caracteres"
        },


    },

});
</script>
