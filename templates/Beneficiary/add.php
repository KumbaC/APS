<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary $beneficiary
 * @var \Cake\Collection\CollectionInterface|string[] $persons
 * @var \Cake\Collection\CollectionInterface|string[] $kins
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Beneficiary'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="beneficiary form content">
            <?= $this->Form->create($beneficiary) ?>
            <fieldset>
                <legend><?= __('Add Beneficiary') ?></legend>
                <?php
                    echo $this->Form->control('person_id', ['options' => $persons]);
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('edad');
                    echo $this->Form->control('gender_id', ['label' => 'Genero', 'options' => $genders]);
                    echo $this->Form->control('kin_id', ['label' => 'Parentesco', 'options' => $kins]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
