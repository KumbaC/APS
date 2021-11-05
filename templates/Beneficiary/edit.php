<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary $beneficiary
 * @var string[]|\Cake\Collection\CollectionInterface $persons
 * @var string[]|\Cake\Collection\CollectionInterface $kins
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $beneficiary->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $beneficiary->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Beneficiary'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="beneficiary form content">
            <?= $this->Form->create($beneficiary) ?>
            <fieldset>
                <legend><?= __('Edit Beneficiary') ?></legend>
                <?php
                    echo $this->Form->control('person_id', ['options' => $persons]);
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('edad');
                    echo $this->Form->control('genero');
                    echo $this->Form->control('kin_id', ['options' => $kins]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
