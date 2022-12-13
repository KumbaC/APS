<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory $laboratory
 */
?>

<?php
$this->assign('title', __('Laboratory') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Laboratories' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($laboratory->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Descripcion') ?></th>
            <td><?= h($laboratory->descripcion) ?></td>
        </tr>
        <tr>
            <th><?= __('Clinical History') ?></th>
            <td><?= $laboratory->has('clinical_history') ? $this->Html->link($laboratory->clinical_history->id, ['controller' => 'ClinicalHistories', 'action' => 'view', $laboratory->clinical_history->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($laboratory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($laboratory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($laboratory->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $laboratory->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $laboratory->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $laboratory->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-biochemistry view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Biochemistry') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Biochemistry' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Biochemistry' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($laboratory->biochemistry)) { ?>
        <tr>
            <td colspan="5" class="text-muted">
              Biochemistry record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($laboratory->biochemistry as $biochemistry) : ?>
        <tr>
            <td><?= h($biochemistry->id) ?></td>
            <td><?= h($biochemistry->descripcion) ?></td>
            <td><?= h($biochemistry->created) ?></td>
            <td><?= h($biochemistry->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Biochemistry', 'action' => 'view', $biochemistry->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Biochemistry', 'action' => 'edit', $biochemistry->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Biochemistry', 'action' => 'delete', $biochemistry->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $biochemistry->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-hematologies view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Hematologies') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Hematologies' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Hematologies' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($laboratory->hematologies)) { ?>
        <tr>
            <td colspan="5" class="text-muted">
              Hematologies record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($laboratory->hematologies as $hematologies) : ?>
        <tr>
            <td><?= h($hematologies->id) ?></td>
            <td><?= h($hematologies->descripcion) ?></td>
            <td><?= h($hematologies->created) ?></td>
            <td><?= h($hematologies->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Hematologies', 'action' => 'view', $hematologies->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Hematologies', 'action' => 'edit', $hematologies->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hematologies', 'action' => 'delete', $hematologies->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $hematologies->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-immunology view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Immunology') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Immunology' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Immunology' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($laboratory->immunology)) { ?>
        <tr>
            <td colspan="5" class="text-muted">
              Immunology record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($laboratory->immunology as $immunology) : ?>
        <tr>
            <td><?= h($immunology->id) ?></td>
            <td><?= h($immunology->descripcion) ?></td>
            <td><?= h($immunology->created) ?></td>
            <td><?= h($immunology->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Immunology', 'action' => 'view', $immunology->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Immunology', 'action' => 'edit', $immunology->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Immunology', 'action' => 'delete', $immunology->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $immunology->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-parasitologies view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Parasitologies') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Parasitologies' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Parasitologies' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($laboratory->parasitologies)) { ?>
        <tr>
            <td colspan="5" class="text-muted">
              Parasitologies record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($laboratory->parasitologies as $parasitologies) : ?>
        <tr>
            <td><?= h($parasitologies->id) ?></td>
            <td><?= h($parasitologies->descripcion) ?></td>
            <td><?= h($parasitologies->created) ?></td>
            <td><?= h($parasitologies->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Parasitologies', 'action' => 'view', $parasitologies->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Parasitologies', 'action' => 'edit', $parasitologies->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parasitologies', 'action' => 'delete', $parasitologies->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $parasitologies->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-specials view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Specials') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Specials' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Specials' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($laboratory->specials)) { ?>
        <tr>
            <td colspan="5" class="text-muted">
              Specials record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($laboratory->specials as $specials) : ?>
        <tr>
            <td><?= h($specials->id) ?></td>
            <td><?= h($specials->descripcion) ?></td>
            <td><?= h($specials->created) ?></td>
            <td><?= h($specials->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Specials', 'action' => 'view', $specials->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Specials', 'action' => 'edit', $specials->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Specials', 'action' => 'delete', $specials->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $specials->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-urinalysis view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Urinalysis') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Urinalysis' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Urinalysis' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Descripcion') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($laboratory->urinalysis)) { ?>
        <tr>
            <td colspan="5" class="text-muted">
              Urinalysis record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($laboratory->urinalysis as $urinalysis) : ?>
        <tr>
            <td><?= h($urinalysis->id) ?></td>
            <td><?= h($urinalysis->descripcion) ?></td>
            <td><?= h($urinalysis->created) ?></td>
            <td><?= h($urinalysis->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Urinalysis', 'action' => 'view', $urinalysis->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Urinalysis', 'action' => 'edit', $urinalysis->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Urinalysis', 'action' => 'delete', $urinalysis->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $urinalysis->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

