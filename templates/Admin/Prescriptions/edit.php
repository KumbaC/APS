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
            <?= $this->Html->link(__('Lista de mis recipes'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-danger text-uppercase font-weight-bold']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="prescriptions form content card-body">
            <?= $this->Form->create($prescription, ['id' => 'form_recipe']) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold text-center"><?= __('Prescripción Medica') ?> </legend>



                   <?php echo $this->Form->control('descripcion', ['label' => 'Recipe' ]); ?>
                   <?php echo $this->Form->control('indicaciones', ['type' => 'textarea', 'label' => 'Indicaciones' ]); ?>
                   <?php //echo $this->Form->control('quote_id', ['options' => $quotes, 'empty' => true]); ?>
                   <?php //echo $this->Form->control('clinic_history_id', ['options' => $clinicalHistories, 'empty' => true]);  ?>
                   <?php echo $this->Form->control('fecha', ['label' => 'Fecha del recipe', 'title' => 'Por favor llene el campo fecha']); ?>

            </fieldset>
            <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-primary btn-block' ]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script>
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


