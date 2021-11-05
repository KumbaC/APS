<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 * @var \Cake\Collection\CollectionInterface|string[] $departments
 * @var \Cake\Collection\CollectionInterface|string[] $status
 * @var \Cake\Collection\CollectionInterface|string[] $cargos
 */
?>
<div class="row">
    <aside class="column">

    </aside>
    <div class="column-responsive column-80 mx-auto card">
        <div class="card-body persons form content">
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend class="text-center font-weight-bold"><i class="fas fa-user-tie"></i> <?= __('Agregar Persona') ?></legend>
             <div class="form-row">
              <div class="form-group col-md-6">
              <?php echo $this->Form->control('cedula', ['type' =>  'number', 'placeholder' => 'Ingresar la cedula', 'min' => '1']);?>
              </div>
              <div class="form-group col-md-6">
              <?php echo $this->Form->control('nombre', ['placeholder' => 'Por favor ingresar el nombre']); ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              <?php echo $this->Form->control('apellido', ['placeholder' => 'Por favor ingresar el apellido']); ?>
              </div>
              <div class="form-group col-md-6">
              <?php echo $this->Form->control('email' , ['placeholder' => 'Ingresar el correo electronico']);?>
              </div>
            </div>

              <div class="form-row">
              <div class="form-group col-md-6">
              <?php echo $this->Form->control('department_id', ['options' => $departments, 'label' => 'Departamentos']); ?>
              </div>
              <div class="form-group col-md-6">
              <?php echo $this->Form->control('cargo_id', ['options' => $cargos, 'label' => 'Cargos']); ?>

              </div>
              <div class="form-group col-md-12">
              <?php echo $this->Form->control('status_id', ['options' => $status, 'label' => 'Estatus']);?>
              </div>
            </div>

            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
