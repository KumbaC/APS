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
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de mis recipes'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-danger text-uppercase font-weight-bold']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="prescriptions form content card-body">
            <?= $this->Form->create($prescription) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold text-center"><?= __('Prescripción Medica') ?> </legend>



                   <?php echo $this->Form->control('descripcion', ['label' => 'Recipe' ]); ?>
                   <?php echo $this->Form->control('indicaciones', ['type' => 'textarea', 'label' => 'Indicaciones' ]); ?>
                   <?php //echo $this->Form->control('quote_id', ['options' => $quotes, 'empty' => true]); ?>
                   <?php //echo $this->Form->control('clinic_history_id', ['options' => $clinicalHistories, 'empty' => true]);  ?>
                   <?php echo $this->Form->control('fecha', ['label' => 'Fecha del recipe']); ?>

            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block' ]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
