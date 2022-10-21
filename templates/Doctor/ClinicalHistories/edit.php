<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClinicalHistory $clinicalHistory
 */
?>

<?php $this->assign('title', __('Edit Clinical History') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Clinical Histories' => ['action'=>'index'],
      'View' => ['action'=>'view', $clinicalHistory->id],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($clinicalHistory) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('person_id', ['options' => $persons, 'empty' => true]);
      echo $this->Form->control('beneficiary_id', ['options' => $beneficiary, 'empty' => true]);
      echo $this->Form->control('blood_type_id', ['options' => $bloodTypes, 'empty' => true]);
      echo $this->Form->control('doctor_id', ['options' => $doctors, 'empty' => true]);
      echo $this->Form->control('type_of_diagnosis');
      echo $this->Form->control('peso');
      echo $this->Form->control('altura');
      echo $this->Form->control('fr');
      echo $this->Form->control('fc');
      echo $this->Form->control('ta');
      echo $this->Form->control('expediente');
      echo $this->Form->control('lpm');
      echo $this->Form->control('imc');
      echo $this->Form->control('piel');
      echo $this->Form->control('cabeza');
      echo $this->Form->control('cuello');
      echo $this->Form->control('cardiopulmonar');
      echo $this->Form->control('mamas');
      echo $this->Form->control('eco_transvaginal');
      echo $this->Form->control('longitudinal');
      echo $this->Form->control('anteroposterior');
      echo $this->Form->control('transverso');
      echo $this->Form->control('endometrio');
      echo $this->Form->control('longitud_cuello_uterio');
      echo $this->Form->control('ovario_derecho');
      echo $this->Form->control('ovario_izquierdo');
      echo $this->Form->control('ovoides_aplanadas');
      echo $this->Form->control('ovoides_aplanadas_izquierda');
      echo $this->Form->control('transverso_izquierdo');
      echo $this->Form->control('logitudinal_izquierdo');
        echo $this->Form->control('diagnoses._ids', ['options' => $diagnoses]);
        echo $this->Form->control('habits._ids', ['options' => $habits]);
        echo $this->Form->control('medicals_antecedents._ids', ['options' => $medicalsAntecedents]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $clinicalHistory->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $clinicalHistory->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
