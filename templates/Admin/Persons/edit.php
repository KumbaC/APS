<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 * @var string[]|\Cake\Collection\CollectionInterface $departments
 * @var string[]|\Cake\Collection\CollectionInterface $status
 * @var string[]|\Cake\Collection\CollectionInterface $cargos
 */
?>
<div class="row">
    <aside class="column">

    </aside>
    <div class="column-responsive column-80 mx-auto card">
        <div class="card-body persons form content">
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend class="text-center font-weight-bold text-uppercase"><i class="fas fa-user-tie"></i> <?= __('Actualizar Persona') ?></legend>
             <div class="form-row">
              <div class="form-group col-md-6">
              <?php echo $this->Form->control('cedula', ['type' => 'number']);?>
              </div>
              <div class="form-group col-md-6">
              <?php echo $this->Form->control('nombre'); ?>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              <?php echo $this->Form->control('apellido'); ?>
              </div>
              <div class="form-group col-md-6">
              <?php echo $this->Form->control('email');?>
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
            <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
