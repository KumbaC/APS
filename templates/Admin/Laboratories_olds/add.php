<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory $laboratory
 * @var \Cake\Collection\CollectionInterface|string[] $clinicalHistories
 * @var \Cake\Collection\CollectionInterface|string[] $biochemistry
 * @var \Cake\Collection\CollectionInterface|string[] $hematologies
 * @var \Cake\Collection\CollectionInterface|string[] $immunology
 * @var \Cake\Collection\CollectionInterface|string[] $parasitologies
 * @var \Cake\Collection\CollectionInterface|string[] $specials
 * @var \Cake\Collection\CollectionInterface|string[] $urinalysis
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Laboratories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="laboratories form content">
            <?= $this->Form->create($laboratory) ?>
            <fieldset>
                <legend><?= __('Add Laboratory') ?></legend>
                <?php
                    echo $this->Form->control('clinical_history_id', ['options' => $clinicalHistories, 'empty' => true]);
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('biochemistry._ids', ['options' => $biochemistry]);
                    echo $this->Form->control('hematologies._ids', ['options' => $hematologies]);
                    echo $this->Form->control('immunology._ids', ['options' => $immunology]);
                    echo $this->Form->control('parasitologies._ids', ['options' => $parasitologies]);
                    echo $this->Form->control('specials._ids', ['options' => $specials]);
                    echo $this->Form->control('urinalysis._ids', ['options' => $urinalysis]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
