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
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold text-center"><?= __('Agregar un titular') ?></legend>
                <div class="form-row">
                    <div class="col">
                 <?php   echo $this->Form->control('cedula', ['type' => 'number', 'placeholder' => 'Introduzca la cedula del titular']);   ?>
                 </div>
                 <div class="col">
                 <?php   echo $this->Form->control('nombre', ['placeholder' => 'Introduzca el nombre del titular']);   ?>
                 </div></div>

                 <div class="form-row">
                 <div class="col">
                 <?php   echo $this->Form->control('apellido', ['placeholder' => 'Introduzca el nombre del titular']); ?>
                 </div>
                 <div class="col">
                 <?php   echo $this->Form->control('email', ['label' => 'Correo Electronico', 'placeholder' => 'ejemplo@sudeaseg.gob.ve']); ?>
                 </div></div>

                 <div class="form-row">
                    <div class="col">
                 <?php   echo $this->Form->control('department_id', ['id' => 'departamento', 'label' => 'Departamentos' ,'options' => $departments_list, 'empty' => 'SELECCIONA DEPARTAMENTO', 'style' => 'width: 270px;']); ?>

                </div>
                 <div class="">
                 <?php   echo $this->Form->control('unit_id', ['id' => 'unidad', 'label' => 'Unidades', 'options' => [], 'empty' => true, 'style' => 'width: 270px;']); ?>
                 </div></div>

                 <div class="form-row">
                    <div class="col">
                 <?php   echo $this->Form->control('cargo_id', ['options' => $cargos, 'empty' => 'SIN CARGO']); ?>
                 </div>
                 <div class="col">
                 <?php   echo $this->Form->control('gender_id', ['label' => 'Genero', 'options' => $genders, 'empty' => 'No identificado']); ?>
                 </div></div>

                 <div class="form-row">
                     <div class="col">
                 <?php   echo $this->Form->control('phone', ['label' => 'Telefono', 'placeholder' => '+58 000-000-0']); ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


var units = <?= json_encode($units_list);  ?>;

$(document).ready(function(){
         $('#departamento').change(function(){

  var departamentoId = $(this).val();

  var unitObject = units[departamentoId];

  $('#unidad option:gt(0)').remove();
  var departamentoSelect = $('#unidad');
  $('#unidad').empty();
  $('#unidad').append('<option value="">SELECCIONE LA UNIDAD</option>');
  $.each(unitObject, function(key,value) {
     departamentoSelect.append($("<option></option>").attr("value", key).text(value));
    });

  });

});

</script>
