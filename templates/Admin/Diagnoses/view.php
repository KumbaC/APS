<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosis $diagnosis
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diagnosis'), ['action' => 'edit', $diagnosis->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diagnosis'), ['action' => 'delete', $diagnosis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosis->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diagnoses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diagnosis'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diagnoses view content">
            <h3><?= h($diagnosis->descripcion) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($diagnosis->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($diagnosis->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Clinical Histories') ?></h4>
                <?php if (!empty($diagnosis->clinical_histories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Beneficiary Id') ?></th>
                            <th><?= __('Blood Type Id') ?></th>
                            <th><?= __('Doctor Id') ?></th>
                            <th><?= __('Type Of Diagnosis') ?></th>
                            <th><?= __('Peso') ?></th>
                            <th><?= __('Altura') ?></th>
                            <th><?= __('Fr') ?></th>
                            <th><?= __('Fc') ?></th>
                            <th><?= __('Ta') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($diagnosis->clinical_histories as $clinicalHistories) : ?>
                        <tr>
                            <td><?= h($clinicalHistories->id) ?></td>
                            <td><?= h($clinicalHistories->person_id) ?></td>
                            <td><?= h($clinicalHistories->beneficiary_id) ?></td>
                            <td><?= h($clinicalHistories->blood_type_id) ?></td>
                            <td><?= h($clinicalHistories->doctor_id) ?></td>
                            <td><?= h($clinicalHistories->type_of_diagnosis) ?></td>
                            <td><?= h($clinicalHistories->peso) ?></td>
                            <td><?= h($clinicalHistories->altura) ?></td>
                            <td><?= h($clinicalHistories->fr) ?></td>
                            <td><?= h($clinicalHistories->fc) ?></td>
                            <td><?= h($clinicalHistories->ta) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ClinicalHistories', 'action' => 'view', $clinicalHistories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ClinicalHistories', 'action' => 'edit', $clinicalHistories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ClinicalHistories', 'action' => 'delete', $clinicalHistories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinicalHistories->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
