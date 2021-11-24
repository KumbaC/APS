<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Prescription'), ['action' => 'edit', $prescription->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Prescription'), ['action' => 'delete', $prescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Prescriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Prescription'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="prescriptions view content">
            <h3><?= h($prescription->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $prescription->has('person') ? $this->Html->link($prescription->person->id, ['controller' => 'Persons', 'action' => 'view', $prescription->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Beneficiary') ?></th>
                    <td><?= $prescription->has('beneficiary') ? $this->Html->link($prescription->beneficiary->id, ['controller' => 'Beneficiary', 'action' => 'view', $prescription->beneficiary->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Doctor') ?></th>
                    <td><?= $prescription->has('doctor') ? $this->Html->link($prescription->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $prescription->doctor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($prescription->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quote') ?></th>
                    <td><?= $prescription->has('quote') ? $this->Html->link($prescription->quote->id, ['controller' => 'Quotes', 'action' => 'view', $prescription->quote->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Clinical History') ?></th>
                    <td><?= $prescription->has('clinical_history') ? $this->Html->link($prescription->clinical_history->id, ['controller' => 'ClinicalHistories', 'action' => 'view', $prescription->clinical_history->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($prescription->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($prescription->fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
