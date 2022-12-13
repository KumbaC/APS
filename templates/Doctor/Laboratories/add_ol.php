<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory $laboratory
 */
?>

<?php $this->assign('title', __('Add Laboratory') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Laboratories' => ['action'=>'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($laboratory) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('descripcion');
      echo $this->Form->control('clinical_history_id', ['options' => $clinicalHistories, 'empty' => true]);
        echo $this->Form->control('biochemistry._ids', ['options' => $biochemistry]);
        echo $this->Form->control('hematologies._ids', ['options' => $hematologies]);
        echo $this->Form->control('immunology._ids', ['options' => $immunology]);
        echo $this->Form->control('parasitologies._ids', ['options' => $parasitologies]);
        echo $this->Form->control('specials._ids', ['options' => $specials]);
        echo $this->Form->control('urinalysis._ids', ['options' => $urinalysis]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
