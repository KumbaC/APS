<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>

<?php
$this->assign('title', __('Prescription') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Prescriptions' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($prescription->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
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
            <th><?= __('Indicaciones') ?></th>
            <td><?= h($prescription->indicaciones) ?></td>
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
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $prescription->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $prescription->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $prescription->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


