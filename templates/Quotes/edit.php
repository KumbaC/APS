<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var string[]|\Cake\Collection\CollectionInterface $specialties
 * @var string[]|\Cake\Collection\CollectionInterface $doctors
 * @var string[]|\Cake\Collection\CollectionInterface $beneficiary
 * @var string[]|\Cake\Collection\CollectionInterface $persons
 * @var string[]|\Cake\Collection\CollectionInterface $statusQuotes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quote->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quotes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotes form content">
            <?= $this->Form->create($quote) ?>
            <fieldset>
                <legend><?= __('Edit Quote') ?></legend>
                <?php
                    echo $this->Form->control('asunto');
                    echo $this->Form->control('nota');
                    echo $this->Form->control('specialty_id', ['options' => $specialties, 'empty' => true]);
                    echo $this->Form->control('doctor_id', ['options' => $doctors, 'empty' => true]);
                    echo $this->Form->control('beneficiary_id', ['options' => $beneficiary, 'empty' => true]);
                    echo $this->Form->control('fecha', ['empty' => true]);
                    echo $this->Form->control('hora', ['empty' => true]);
                    echo $this->Form->control('person_id', ['options' => $persons, 'empty' => true]);
                    echo $this->Form->control('status_quote_id', ['options' => $statusQuotes, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
