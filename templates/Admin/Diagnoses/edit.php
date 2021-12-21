<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosis $diagnosis
 * @var string[]|\Cake\Collection\CollectionInterface $clinicalHistories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>

            <?= $this->Html->link(__('Lista de Diagnosticos'), ['action' => 'index'], ['class' => 'btn btn-danger side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto" style="width:400px; height:220px;">
        <div class="diagnoses form content card-body">
            <?= $this->Form->create($diagnosis) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold text-center"><?= __('Editar Diagnosticos') ?></legend>
                <br>
                <?php
                    echo $this->Form->control('descripcion');
                    //echo $this->Form->control('clinical_histories._ids', ['options' => $clinicalHistories]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Actualizar'),['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
