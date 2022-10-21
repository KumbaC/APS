<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory $laboratory
 * @var string[]|\Cake\Collection\CollectionInterface $clinicalHistories
 * @var string[]|\Cake\Collection\CollectionInterface $biochemistry
 * @var string[]|\Cake\Collection\CollectionInterface $hematologies
 * @var string[]|\Cake\Collection\CollectionInterface $immunology
 * @var string[]|\Cake\Collection\CollectionInterface $parasitologies
 * @var string[]|\Cake\Collection\CollectionInterface $specials
 * @var string[]|\Cake\Collection\CollectionInterface $urinalysis
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $laboratory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $laboratory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Laboratories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="laboratories form content">
            <?= $this->Form->create($laboratory) ?>
            <fieldset>
                <legend><?= __('Edit Laboratory') ?></legend>
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
