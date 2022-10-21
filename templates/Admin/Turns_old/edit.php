<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turn $turn
 */
?>
<style>
     .error{
        color: red;
    }
</style>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold"><i class="fas fa-tools"></i> <?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista Turnos'), ['action' => 'index'], ['class' => 'btn btn-danger side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="turns form content card-body">
            <?= $this->Form->create($turn, ['id' => 'form_turn']) ?>
            <fieldset>
                <legend class="text-center font-weight-bold text-uppercase"><?= __('Añadir Turnos') ?></legend>
                <br>
                <?php
                    echo $this->Form->control('descripcion', ['class' => 'form-control required', 'required']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.js"></script>

<script>
$('#form_turn').validate({
    rules: {
        descripcion: {
            required: true,
        },

    },
    messages: {
        descripcion: {
            required: "Por favor ingrese un turno",
        },

    }

});
</script>
