<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hour $hour
 * @var string[]|\Cake\Collection\CollectionInterface $doctors
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hour->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hour->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Hours'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="hours form content">
            <?= $this->Form->create($hour) ?>
            <fieldset>
                <legend><?= __('Edit Hour') ?></legend>
                <?php
                    echo $this->Form->control('turnos');
                    echo $this->Form->control('doctors._ids', ['options' => $doctors]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
