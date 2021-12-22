<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicalsAntecedent $medicalsAntecedent
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
            <h4 class="heading font-weight-bold text-uppercase text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Antecedentes Medicos'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-danger']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="medicalsAntecedents form content card-body">
            <?= $this->Form->create($medicalsAntecedent, ['id' => 'form_antecedente']) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold"><?= __('Antecedente Medico') ?></legend>
                <?php
                    echo $this->Form->control('descripcion', ['placeholder' => 'Ingrese un antecedente medico', 'class' => 'required']);
                   // echo $this->Form->control('clinical_histories._ids', ['options' => $clinicalHistories]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script>
$('#form_antecedente').validate({
    rules: {
        descripcion: {
            required: true,
            minlength: 3,
            maxlength: 25,
        },


    },

    messages: {
        descripcion: {
            required: "Por favor ingrese un antecedente medico",
            minlength: "El antecedente debe tener al menos 2 caracteres",
            maxlength: "El antecedente debe tener como máximo 25 caracteres",
        },
    }

});
</script>
