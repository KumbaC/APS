<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Habit $habit
 * @var \Cake\Collection\CollectionInterface|string[] $clinicalHistories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Habitos'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-danger']) ?>
        </div>
    </aside>
    <div class="card mx-auto">
        <div class="card-body">
            <?= $this->Form->create($habit) ?>
            <fieldset class="card-body">
                <legend class="font-weight-bold mx-auto text-uppercase"><?= __('Añadir Habitos') ?></legend>

                <?php echo $this->Form->control('descripcion', ['placeholder' => 'Introduzca un nuevo habito', 'id' => 'habitos']); ?>

                <?php //echo $this->Form->control('clinical_histories._ids', ['options' => $clinicalHistories]); ?>
                    <br>
                <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block']) ?>
            </fieldset>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
