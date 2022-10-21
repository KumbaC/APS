<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DoctorsTurn $doctorsTurn
 * @var \Cake\Collection\CollectionInterface|string[] $doctors
 * @var \Cake\Collection\CollectionInterface|string[] $turns
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Doctors Turns'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="doctorsTurns form content">
            <?= $this->Form->create($doctorsTurn) ?>
            <fieldset>
                <legend><?= __('Add Doctors Turn') ?></legend>
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
