<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor $doctor
 * @var \Cake\Collection\CollectionInterface|string[] $specialties
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
        <h4 class="heading text-uppercase text-center font-weight-bold">  <i class="fas fa-tools"></i> <?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Doctores'), ['action' => 'index'], ['class' => 'text-uppercase font-weight-bold btn btn-danger']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="doctors form content card-body">
            <?= $this->Form->create($doctor) ?>
            <fieldset>
                <legend class="text-center font-weight-bold text-uppercase"><i class="fas fa-briefcase-medical"></i> <?= __('Agregar Doctor') ?></legend>
                    <div class="form-row">
                    <div class="form-group col-md-6"><?php  echo $this->Form->control('nombre', ['placeholder' => 'Introduzca el nombre','required']);?></div>
                    <div class="form-group col-md-6"><?php  echo $this->Form->control('apellido', ['placeholder' => 'Introduzca el apellido', 'required']);?></div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6"><?php  echo $this->Form->control('cedula', ['placeholder' => 'Introduzca su cedula', 'required', 'type' => 'number' , 'min' => '1']);?></div>
                    <div class="form-group col-md-6"> <?php  echo $this->Form->control('telefono', ['placeholder' => '+58 000-000', 'required', 'type' => 'number', 'min' => '1']);?></div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6"><?php  echo $this->Form->control('email', ['label' => 'Correo Electronico', 'placeholder' => 'Ingrese su correo', 'required', 'type' => 'email']);?></div>
                    <div class="form-group col-md-6"><?php  echo $this->Form->control('specialty_id', ['options' => $specialties, 'label' => 'Especialidad']);?></div>
                    </div>
            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
