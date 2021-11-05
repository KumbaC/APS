<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor $doctor
 * @var string[]|\Cake\Collection\CollectionInterface $specialties
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">

            <!-- <//?= $this->Form->postLink(
                __(''),
                ['action' => 'Eliminar', $doctor->id],
                ['confirm' => __('¿Estas seguro de eliminar al Dr. {0}?', $doctor->nombre), 'class' => 'fas fa-trash-alt btn btn-danger side-nav-item']
            ) ?>
            <//?= $this->Html->link(__('Lista de Doctores'), ['action' => 'index'], ['class' => 'btn btn-success side-nav-item']) ?> -->
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="doctors form content card-body">
            <?= $this->Form->create($doctor) ?>
            <fieldset>
                <legend class="text-center font-weight-bold text-uppercase"><i class="fas fa-briefcase-medical"></i> <?= __('Editar Doctor') ?></legend>
                <div class="form-row">
                    <div class="form-group col-md-6"><?php  echo $this->Form->control('nombre', ['placeholder' => 'Introduzca el nombre','required']);?></div>
                    <div class="form-group col-md-6"><?php  echo $this->Form->control('apellido', ['placeholder' => 'Introduzca el apellido', 'required']);?></div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6"><?php  echo $this->Form->control('cedula', ['placeholder' => 'V-', 'required']);?></div>
                    <div class="form-group col-md-6"> <?php  echo $this->Form->control('telefono', ['placeholder' => '+58 0212-000-000', 'required']);?></div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6"><?php  echo $this->Form->control('email', ['label' => 'Correo Electronico', 'placeholder' => 'Ingrese su correo']);?></div>
                    <div class="form-group col-md-6"><?php  echo $this->Form->control('specialty_id', ['options' => $specialties, 'label' => 'Especialidad']);?></div>
                    </div>
            </fieldset>
            <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-success btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
