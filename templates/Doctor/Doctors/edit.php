<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor $doctor
 * @var string[]|\Cake\Collection\CollectionInterface $specialties
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $doctor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $doctor->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Doctors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="doctors form content">
            <?= $this->Form->create($doctor) ?>
            <fieldset>
                <legend><?= __('Edit Doctor') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('cedula');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('email');
                    echo $this->Form->control('specialty_id', ['options' => $specialties, 'empty' => true]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('firma');
                    echo $this->Form->control('sello');
                    echo $this->Form->control('telefono_secundario');
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
