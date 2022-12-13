<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 */
?>

<?php
$this->assign('title', __('Quote') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Quotes' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($quote->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Asunto') ?></th>
            <td><?= h($quote->asunto) ?></td>
        </tr>
        <tr>
            <th><?= __('Nota') ?></th>
            <td><?= h($quote->nota) ?></td>
        </tr>
        <tr>
            <th><?= __('Specialty') ?></th>
            <td><?= $quote->has('specialty') ? $this->Html->link($quote->specialty->descripcion, ['controller' => 'Specialties', 'action' => 'view', $quote->specialty->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Doctor') ?></th>
            <td><?= $quote->has('doctor') ? $this->Html->link($quote->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $quote->doctor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Beneficiary') ?></th>
            <td><?= $quote->has('beneficiary') ? $this->Html->link($quote->beneficiary->id, ['controller' => 'Beneficiary', 'action' => 'view', $quote->beneficiary->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $quote->has('person') ? $this->Html->link($quote->person->id, ['controller' => 'Persons', 'action' => 'view', $quote->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status Quote') ?></th>
            <td><?= $quote->has('status_quote') ? $this->Html->link($quote->status_quote->descripcion, ['controller' => 'StatusQuotes', 'action' => 'view', $quote->status_quote->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($quote->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha') ?></th>
            <td><?= h($quote->fecha) ?></td>
        </tr>
        <tr>
            <th><?= __('Hora') ?></th>
            <td><?= h($quote->hora) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($quote->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($quote->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $quote->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $quote->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $quote->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-prescriptions view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Prescriptions') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Prescriptions' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Prescriptions' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Person Id') ?></th>
          <th><?= __('Beneficiary Id') ?></th>
          <th><?= __('Doctor Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th><?= __('Quote Id') ?></th>
          <th><?= __('Clinic History Id') ?></th>
          <th><?= __('Fecha') ?></th>
          <th><?= __('Indicaciones') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($quote->prescriptions)) { ?>
        <tr>
            <td colspan="10" class="text-muted">
              Prescriptions record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($quote->prescriptions as $prescriptions) : ?>
        <tr>
            <td><?= h($prescriptions->id) ?></td>
            <td><?= h($prescriptions->person_id) ?></td>
            <td><?= h($prescriptions->beneficiary_id) ?></td>
            <td><?= h($prescriptions->doctor_id) ?></td>
            <td><?= h($prescriptions->descripcion) ?></td>
            <td><?= h($prescriptions->quote_id) ?></td>
            <td><?= h($prescriptions->clinic_history_id) ?></td>
            <td><?= h($prescriptions->fecha) ?></td>
            <td><?= h($prescriptions->indicaciones) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Prescriptions', 'action' => 'view', $prescriptions->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Prescriptions', 'action' => 'edit', $prescriptions->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Prescriptions', 'action' => 'delete', $prescriptions->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $prescriptions->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

