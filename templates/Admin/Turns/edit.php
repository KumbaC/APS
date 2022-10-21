<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turn $turn
 * @var string[]|\Cake\Collection\CollectionInterface $doctors
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $turn->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $turn->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Turns'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="turns form content">
            <?= $this->Form->create($turn) ?>
            <fieldset>
                <legend><?= __('Edit Turn') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('meridiano');
                    echo $this->Form->control('doctors._ids', ['options' => $doctors]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
