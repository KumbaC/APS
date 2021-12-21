<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicalsAntecedent $medicalsAntecedent
 * @var \Cake\Collection\CollectionInterface|string[] $clinicalHistories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading font-weight-bold text-uppercase text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Antecedentes Medicos'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-danger']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="medicalsAntecedents form content card-body">
            <?= $this->Form->create($medicalsAntecedent) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold"><?= __('Antecedente Medico') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                   // echo $this->Form->control('clinical_histories._ids', ['options' => $clinicalHistories]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
