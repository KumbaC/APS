<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="persons view content">
            <h3><?= h($person->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cedula') ?></th>
                    <td><?= h($person->cedula) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($person->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido') ?></th>
                    <td><?= h($person->apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($person->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Department') ?></th>
                    <td><?= $person->has('department') ? $this->Html->link($person->department->descripcion, ['controller' => 'Departments', 'action' => 'view', $person->department->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $person->has('status') ? $this->Html->link($person->status->id, ['controller' => 'Status', 'action' => 'view', $person->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cargo') ?></th>
                    <td><?= $person->has('cargo') ? $this->Html->link($person->cargo->descripcion, ['controller' => 'Cargos', 'action' => 'view', $person->cargo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Unit') ?></th>
                    <td><?= $person->has('unit') ? $this->Html->link($person->unit->descripcion, ['controller' => 'Units', 'action' => 'view', $person->unit->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= $person->has('gender') ? $this->Html->link($person->gender->descripcion, ['controller' => 'Genders', 'action' => 'view', $person->gender->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($person->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $this->Number->format($person->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Edad') ?></th>
                    <td><?= $this->Number->format($person->edad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($person->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($person->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($person->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Identification Card') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Network User') ?></th>
                            <th><?= __('Full Name') ?></th>
                            <th><?= __('Public Worker Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Active') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->identification_card) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->network_user) ?></td>
                            <td><?= h($users->full_name) ?></td>
                            <td><?= h($users->public_worker_id) ?></td>
                            <td><?= h($users->role_id) ?></td>
                            <td><?= h($users->active) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Beneficiary') ?></h4>
                <?php if (!empty($person->beneficiary)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Apellido') ?></th>
                            <th><?= __('Edad') ?></th>
                            <th><?= __('Gender Id') ?></th>
                            <th><?= __('Kin Id') ?></th>
                            <th><?= __('Cedula') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->beneficiary as $beneficiary) : ?>
                        <tr>
                            <td><?= h($beneficiary->id) ?></td>
                            <td><?= h($beneficiary->person_id) ?></td>
                            <td><?= h($beneficiary->nombre) ?></td>
                            <td><?= h($beneficiary->apellido) ?></td>
                            <td><?= h($beneficiary->edad) ?></td>
                            <td><?= h($beneficiary->gender_id) ?></td>
                            <td><?= h($beneficiary->kin_id) ?></td>
                            <td><?= h($beneficiary->cedula) ?></td>
                            <td><?= h($beneficiary->created) ?></td>
                            <td><?= h($beneficiary->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Beneficiary', 'action' => 'view', $beneficiary->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Beneficiary', 'action' => 'edit', $beneficiary->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Beneficiary', 'action' => 'delete', $beneficiary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $beneficiary->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Clinical Histories') ?></h4>
                <?php if (!empty($person->clinical_histories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Beneficiary Id') ?></th>
                            <th><?= __('Blood Type Id') ?></th>
                            <th><?= __('Doctor Id') ?></th>
                            <th><?= __('Workplan') ?></th>
                            <th><?= __('Peso') ?></th>
                            <th><?= __('Altura') ?></th>
                            <th><?= __('Fr') ?></th>
                            <th><?= __('Fc') ?></th>
                            <th><?= __('Ta') ?></th>
                            <th><?= __('Reason Consultation') ?></th>
                            <th><?= __('Imc') ?></th>
                            <th><?= __('Tp') ?></th>
                            <th><?= __('Cms') ?></th>
                            <th><?= __('Saturacion') ?></th>
                            <th><?= __('Disease Current') ?></th>
                            <th><?= __('Physical Test') ?></th>
                            <th><?= __('Observations') ?></th>
                            <th><?= __('Diagnostic Impression') ?></th>
                            <th><?= __('Suggestions') ?></th>
                            <th><?= __('Laboratory Conclusions') ?></th>
                            <th><?= __('Radiographic Interpretation') ?></th>
                            <th><?= __('Treatment Sequence') ?></th>
                            <th><?= __('Dental Diagnosis') ?></th>
                            <th><?= __('Quote Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->clinical_histories as $clinicalHistories) : ?>
                        <tr>
                            <td><?= h($clinicalHistories->id) ?></td>
                            <td><?= h($clinicalHistories->person_id) ?></td>
                            <td><?= h($clinicalHistories->beneficiary_id) ?></td>
                            <td><?= h($clinicalHistories->blood_type_id) ?></td>
                            <td><?= h($clinicalHistories->doctor_id) ?></td>
                            <td><?= h($clinicalHistories->workplan) ?></td>
                            <td><?= h($clinicalHistories->peso) ?></td>
                            <td><?= h($clinicalHistories->altura) ?></td>
                            <td><?= h($clinicalHistories->fr) ?></td>
                            <td><?= h($clinicalHistories->fc) ?></td>
                            <td><?= h($clinicalHistories->ta) ?></td>
                            <td><?= h($clinicalHistories->reason_consultation) ?></td>
                            <td><?= h($clinicalHistories->imc) ?></td>
                            <td><?= h($clinicalHistories->tp) ?></td>
                            <td><?= h($clinicalHistories->cms) ?></td>
                            <td><?= h($clinicalHistories->saturacion) ?></td>
                            <td><?= h($clinicalHistories->disease_current) ?></td>
                            <td><?= h($clinicalHistories->physical_test) ?></td>
                            <td><?= h($clinicalHistories->observations) ?></td>
                            <td><?= h($clinicalHistories->diagnostic_impression) ?></td>
                            <td><?= h($clinicalHistories->suggestions) ?></td>
                            <td><?= h($clinicalHistories->laboratory_conclusions) ?></td>
                            <td><?= h($clinicalHistories->radiographic_interpretation) ?></td>
                            <td><?= h($clinicalHistories->treatment_sequence) ?></td>
                            <td><?= h($clinicalHistories->dental_diagnosis) ?></td>
                            <td><?= h($clinicalHistories->quote_id) ?></td>
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
            <div class="related">
                <h4><?= __('Related Public Workers') ?></h4>
                <?php if (!empty($person->public_workers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Identification Card') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Network User') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Identity Card') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Email Alternative') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->public_workers as $publicWorkers) : ?>
                        <tr>
                            <td><?= h($publicWorkers->id) ?></td>
                            <td><?= h($publicWorkers->identification_card) ?></td>
                            <td><?= h($publicWorkers->email) ?></td>
                            <td><?= h($publicWorkers->network_user) ?></td>
                            <td><?= h($publicWorkers->name) ?></td>
                            <td><?= h($publicWorkers->identity_card) ?></td>
                            <td><?= h($publicWorkers->person_id) ?></td>
                            <td><?= h($publicWorkers->code) ?></td>
                            <td><?= h($publicWorkers->email_alternative) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PublicWorkers', 'action' => 'view', $publicWorkers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PublicWorkers', 'action' => 'edit', $publicWorkers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PublicWorkers', 'action' => 'delete', $publicWorkers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publicWorkers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Quotes') ?></h4>
                <?php if (!empty($person->quotes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Asunto') ?></th>
                            <th><?= __('Nota') ?></th>
                            <th><?= __('Specialty Id') ?></th>
                            <th><?= __('Doctor Id') ?></th>
                            <th><?= __('Beneficiary Id') ?></th>
                            <th><?= __('Fecha') ?></th>
                            <th><?= __('Hora') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Status Quote Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->quotes as $quotes) : ?>
                        <tr>
                            <td><?= h($quotes->id) ?></td>
                            <td><?= h($quotes->asunto) ?></td>
                            <td><?= h($quotes->nota) ?></td>
                            <td><?= h($quotes->specialty_id) ?></td>
                            <td><?= h($quotes->doctor_id) ?></td>
                            <td><?= h($quotes->beneficiary_id) ?></td>
                            <td><?= h($quotes->fecha) ?></td>
                            <td><?= h($quotes->hora) ?></td>
                            <td><?= h($quotes->person_id) ?></td>
                            <td><?= h($quotes->status_quote_id) ?></td>
                            <td><?= h($quotes->created) ?></td>
                            <td><?= h($quotes->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Quotes', 'action' => 'view', $quotes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Quotes', 'action' => 'edit', $quotes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Quotes', 'action' => 'delete', $quotes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotes->id)]) ?>
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
