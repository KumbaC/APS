<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClinicalHistory $clinicalHistory
 */
?>

<?php
$this->assign('title', __('Clinical History') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Clinical Histories' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($clinicalHistory->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Person') ?></th>
            <td><?= $clinicalHistory->has('person') ? $this->Html->link($clinicalHistory->person->id, ['controller' => 'Persons', 'action' => 'view', $clinicalHistory->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Beneficiary') ?></th>
            <td><?= $clinicalHistory->has('beneficiary') ? $this->Html->link($clinicalHistory->beneficiary->id, ['controller' => 'Beneficiary', 'action' => 'view', $clinicalHistory->beneficiary->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Blood Type') ?></th>
            <td><?= $clinicalHistory->has('blood_type') ? $this->Html->link($clinicalHistory->blood_type->descripcion, ['controller' => 'BloodTypes', 'action' => 'view', $clinicalHistory->blood_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Doctor') ?></th>
            <td><?= $clinicalHistory->has('doctor') ? $this->Html->link($clinicalHistory->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $clinicalHistory->doctor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Type Of Diagnosis') ?></th>
            <td><?= h($clinicalHistory->type_of_diagnosis) ?></td>
        </tr>
        <tr>
            <th><?= __('Altura') ?></th>
            <td><?= h($clinicalHistory->altura) ?></td>
        </tr>
        <tr>
            <th><?= __('Ta') ?></th>
            <td><?= h($clinicalHistory->ta) ?></td>
        </tr>
        <tr>
            <th><?= __('Lpm') ?></th>
            <td><?= h($clinicalHistory->lpm) ?></td>
        </tr>
        <tr>
            <th><?= __('Imc') ?></th>
            <td><?= h($clinicalHistory->imc) ?></td>
        </tr>
        <tr>
            <th><?= __('Piel') ?></th>
            <td><?= h($clinicalHistory->piel) ?></td>
        </tr>
        <tr>
            <th><?= __('Cabeza') ?></th>
            <td><?= h($clinicalHistory->cabeza) ?></td>
        </tr>
        <tr>
            <th><?= __('Cuello') ?></th>
            <td><?= h($clinicalHistory->cuello) ?></td>
        </tr>
        <tr>
            <th><?= __('Cardiopulmonar') ?></th>
            <td><?= h($clinicalHistory->cardiopulmonar) ?></td>
        </tr>
        <tr>
            <th><?= __('Mamas') ?></th>
            <td><?= h($clinicalHistory->mamas) ?></td>
        </tr>
        <tr>
            <th><?= __('Eco Transvaginal') ?></th>
            <td><?= h($clinicalHistory->eco_transvaginal) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitudinal') ?></th>
            <td><?= h($clinicalHistory->longitudinal) ?></td>
        </tr>
        <tr>
            <th><?= __('Anteroposterior') ?></th>
            <td><?= h($clinicalHistory->anteroposterior) ?></td>
        </tr>
        <tr>
            <th><?= __('Transverso') ?></th>
            <td><?= h($clinicalHistory->transverso) ?></td>
        </tr>
        <tr>
            <th><?= __('Endometrio') ?></th>
            <td><?= h($clinicalHistory->endometrio) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitud Cuello Uterio') ?></th>
            <td><?= h($clinicalHistory->longitud_cuello_uterio) ?></td>
        </tr>
        <tr>
            <th><?= __('Ovario Derecho') ?></th>
            <td><?= h($clinicalHistory->ovario_derecho) ?></td>
        </tr>
        <tr>
            <th><?= __('Ovario Izquierdo') ?></th>
            <td><?= h($clinicalHistory->ovario_izquierdo) ?></td>
        </tr>
        <tr>
            <th><?= __('Ovoides Aplanadas') ?></th>
            <td><?= h($clinicalHistory->ovoides_aplanadas) ?></td>
        </tr>
        <tr>
            <th><?= __('Ovoides Aplanadas Izquierda') ?></th>
            <td><?= h($clinicalHistory->ovoides_aplanadas_izquierda) ?></td>
        </tr>
        <tr>
            <th><?= __('Transverso Izquierdo') ?></th>
            <td><?= h($clinicalHistory->transverso_izquierdo) ?></td>
        </tr>
        <tr>
            <th><?= __('Logitudinal Izquierdo') ?></th>
            <td><?= h($clinicalHistory->logitudinal_izquierdo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($clinicalHistory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Peso') ?></th>
            <td><?= $this->Number->format($clinicalHistory->peso) ?></td>
        </tr>
        <tr>
            <th><?= __('Fr') ?></th>
            <td><?= $this->Number->format($clinicalHistory->fr) ?></td>
        </tr>
        <tr>
            <th><?= __('Fc') ?></th>
            <td><?= $this->Number->format($clinicalHistory->fc) ?></td>
        </tr>
        <tr>
            <th><?= __('Expediente') ?></th>
            <td><?= $this->Number->format($clinicalHistory->expediente) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $clinicalHistory->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $clinicalHistory->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $clinicalHistory->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-diagnoses view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Diagnoses') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Diagnoses' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Diagnoses' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($clinicalHistory->diagnoses)) { ?>
        <tr>
            <td colspan="3" class="text-muted">
              Diagnoses record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($clinicalHistory->diagnoses as $diagnoses) : ?>
        <tr>
            <td><?= h($diagnoses->id) ?></td>
            <td><?= h($diagnoses->descripcion) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Diagnoses', 'action' => 'view', $diagnoses->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Diagnoses', 'action' => 'edit', $diagnoses->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Diagnoses', 'action' => 'delete', $diagnoses->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $diagnoses->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-habits view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Habits') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Habits' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Habits' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($clinicalHistory->habits)) { ?>
        <tr>
            <td colspan="3" class="text-muted">
              Habits record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($clinicalHistory->habits as $habits) : ?>
        <tr>
            <td><?= h($habits->id) ?></td>
            <td><?= h($habits->descripcion) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Habits', 'action' => 'view', $habits->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Habits', 'action' => 'edit', $habits->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Habits', 'action' => 'delete', $habits->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $habits->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-medicalsAntecedents view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Medicals Antecedents') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'MedicalsAntecedents' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'MedicalsAntecedents' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($clinicalHistory->medicals_antecedents)) { ?>
        <tr>
            <td colspan="3" class="text-muted">
              Medicals Antecedents record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($clinicalHistory->medicals_antecedents as $medicalsAntecedents) : ?>
        <tr>
            <td><?= h($medicalsAntecedents->id) ?></td>
            <td><?= h($medicalsAntecedents->descripcion) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'MedicalsAntecedents', 'action' => 'view', $medicalsAntecedents->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'MedicalsAntecedents', 'action' => 'edit', $medicalsAntecedents->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'MedicalsAntecedents', 'action' => 'delete', $medicalsAntecedents->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $medicalsAntecedents->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-laboratories view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Laboratories') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Laboratories' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Laboratories' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th><?= __('Clinical History Id') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($clinicalHistory->laboratories)) { ?>
        <tr>
            <td colspan="6" class="text-muted">
              Laboratories record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($clinicalHistory->laboratories as $laboratories) : ?>
        <tr>
            <td><?= h($laboratories->id) ?></td>
            <td><?= h($laboratories->descripcion) ?></td>
            <td><?= h($laboratories->clinical_history_id) ?></td>
            <td><?= h($laboratories->created) ?></td>
            <td><?= h($laboratories->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Laboratories', 'action' => 'view', $laboratories->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Laboratories', 'action' => 'edit', $laboratories->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Laboratories', 'action' => 'delete', $laboratories->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $laboratories->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

