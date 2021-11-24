<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 * @var string[]|\Cake\Collection\CollectionInterface $departments
 * @var string[]|\Cake\Collection\CollectionInterface $status
 * @var string[]|\Cake\Collection\CollectionInterface $cargos
 * @var string[]|\Cake\Collection\CollectionInterface $usersInternals
 * @var string[]|\Cake\Collection\CollectionInterface $units
 * @var string[]|\Cake\Collection\CollectionInterface $genders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $person->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="persons form content">
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend><?= __('Edit Person') ?></legend>
                <?php
                    echo $this->Form->control('cedula');
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('email');
                    echo $this->Form->control('department_id', ['options' => $departments, 'empty' => true]);
                    echo $this->Form->control('status_id', ['options' => $status]);
                    echo $this->Form->control('cargo_id', ['options' => $cargos, 'empty' => true]);
                    echo $this->Form->control('user_internal_id', ['options' => $usersInternals, 'empty' => true]);
                    echo $this->Form->control('unit_id', ['options' => $units, 'empty' => true]);
                    echo $this->Form->control('phone');
                    echo $this->Form->control('edad');
                    echo $this->Form->control('gender_id', ['options' => $genders, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
