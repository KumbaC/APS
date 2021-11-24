<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClinicalHistory $clinicalHistory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Clinical History'), ['action' => 'edit', $clinicalHistory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Clinical History'), ['action' => 'delete', $clinicalHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinicalHistory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clinical Histories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Clinical History'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clinicalHistories view content">
            <h3><?= h($clinicalHistory->id) ?></h3>
            <table>
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
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($clinicalHistory->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Diagnoses') ?></h4>
                <?php if (!empty($clinicalHistory->diagnoses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($clinicalHistory->diagnoses as $diagnoses) : ?>
                        <tr>
                            <td><?= h($diagnoses->id) ?></td>
                            <td><?= h($diagnoses->descripcion) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Diagnoses', 'action' => 'view', $diagnoses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Diagnoses', 'action' => 'edit', $diagnoses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Diagnoses', 'action' => 'delete', $diagnoses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnoses->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Habits') ?></h4>
                <?php if (!empty($clinicalHistory->habits)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($clinicalHistory->habits as $habits) : ?>
                        <tr>
                            <td><?= h($habits->id) ?></td>
                            <td><?= h($habits->descripcion) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Habits', 'action' => 'view', $habits->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Habits', 'action' => 'edit', $habits->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Habits', 'action' => 'delete', $habits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $habits->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Medicals Antecedents') ?></h4>
                <?php if (!empty($clinicalHistory->medicals_antecedents)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($clinicalHistory->medicals_antecedents as $medicalsAntecedents) : ?>
                        <tr>
                            <td><?= h($medicalsAntecedents->id) ?></td>
                            <td><?= h($medicalsAntecedents->descripcion) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MedicalsAntecedents', 'action' => 'view', $medicalsAntecedents->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MedicalsAntecedents', 'action' => 'edit', $medicalsAntecedents->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MedicalsAntecedents', 'action' => 'delete', $medicalsAntecedents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medicalsAntecedents->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <hr>
                <h4> Resultados fisicos </h4>
                <table>
                <tr>
                    <th><?= __('Peso') ?></th>
                    <td><?= h($clinicalHistory->peso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Altura') ?></th>
                    <td><?= h($clinicalHistory->altura) ?></td>
                </tr>
                <tr>
                    <th><?= __('FR') ?></th>
                    <td><?= h($clinicalHistory->fr) ?></td>
                </tr>
                <tr>
                    <th><?= __('FC') ?></th>
                    <td><?= h($clinicalHistory->fc) ?></td>
                </tr>
                <tr>
                    <th><?= __('TA') ?></th>
                    <td><?= h($clinicalHistory->ta) ?></td>

                </tr>
            </table>
            </div>


    </div>
</div>
