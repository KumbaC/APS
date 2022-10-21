<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Habit $habit
 * @var \Cake\Collection\CollectionInterface|string[] $clinicalHistories
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
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Habitos'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-danger']) ?>
        </div>
    </aside>
    <div class="card mx-auto">
        <div class="card-body">
            <?= $this->Form->create($habit, ['id' => 'form_habitos']) ?>
            <fieldset class="card-body">
                <legend class="font-weight-bold mx-auto text-uppercase"><?= __('Añadir Habitos') ?></legend>

                <?php echo $this->Form->control('descripcion', ['placeholder' => 'Introduzca un nuevo habito', 'class' => 'required']); ?>

                    <br>
                <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block']) ?>
            </fieldset>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script>
/* METODO PARA SOLO CARACTERERS MAYUSUCULAS */
$.validator.addMethod("noC", function(value, element) {
   return this.optional(element) || /[A-Z]/.test(value); 
}, "You are not permitted to input more than three uppercase letters in a row!");

$('#form_habitos').validate({
    rules: {
        descripcion: {
            required: true,
            minlength: 3,
            maxlength: 35,
            noC: true
        },


    },

    messages: {
        descripcion: {
            required: "Por favor ingrese un habito",
            minlength: "El habito debe tener al menos 3 caracteres",
            maxlength: "El habito debe tener como máximo 35 caracteres",
            noC: "Solo caracteres en mayusculas"
        },
    }

});
</script>

