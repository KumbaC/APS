<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialty $specialty
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
            <h4 class="heading text-uppercase font-weight-bold text-center"> <i class="fas fa-tools"></i> <?= __('opciones') ?></h4>
            
            <?= $this->Html->link(__('Lista de Especialidades'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-danger text-uppercase font-weight-bold']) ?>
        </div>
    </aside>
    
      <div class="card mx-auto">
        <div class="card-body">
        
            <?= $this->Form->create($specialty, ['id' => 'form_especialidades']) ?>
            <fieldset class="card-body">
                <legend class="font-weight-bold text-uppercase"><?= __('Actualizar Especialidad') ?></legend>
                <?php
                    echo $this->Form->control('descripcion', ['id' => 'descripcion', 'class' => 'form-control']);
                ?>

            <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-primary btn-block text-uppercase font-weight-bold']) ?>
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

$('#form_especialidades').validate({
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
            required: "Por favor ingrese una especialidad",
            minlength: "La especialidad debe tener al menos 3 caracteres",
            maxlength: "La especialidad debe tener como máximo 35 caracteres",
            noC: "Solo caracteres en mayusculas"
        },
    }

});
</script>
