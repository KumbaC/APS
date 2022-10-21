<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DoctorsTurn $doctorsTurn
 * @var string[]|\Cake\Collection\CollectionInterface $doctors
 * @var string[]|\Cake\Collection\CollectionInterface $turns
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $doctorsTurn->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $doctorsTurn->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Doctors Turns'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="doctorsTurns form content">
            <?= $this->Form->create($doctorsTurn) ?>
            <fieldset>
                <legend><?= __('Edit Doctors Turn') ?></legend>
                <?php
                    echo $this->Form->control('doctor_id', ['options' => $doctors, 'empty' => true]);
                    echo $this->Form->control('turn_id', ['options' => $turns, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
