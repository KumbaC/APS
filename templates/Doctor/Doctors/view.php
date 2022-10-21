<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor $doctor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Doctor'), ['action' => 'edit', $doctor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Doctor'), ['action' => 'delete', $doctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Doctors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Doctor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="doctors view content">
            <h3><?= h($doctor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($doctor->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido') ?></th>
                    <td><?= h($doctor->apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cedula') ?></th>
                    <td><?= h($doctor->cedula) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= h($doctor->telefono) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($doctor->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Specialty') ?></th>
                    <td><?= $doctor->has('specialty') ? $this->Html->link($doctor->specialty->descripcion, ['controller' => 'Specialties', 'action' => 'view', $doctor->specialty->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $doctor->has('user') ? $this->Html->link($doctor->user->id, ['controller' => 'Users', 'action' => 'view', $doctor->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Firma') ?></th>
                    <td><?= h($doctor->firma) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sello') ?></th>
                    <td><?= h($doctor->sello) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono Secundario') ?></th>
                    <td><?= h($doctor->telefono_secundario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($doctor->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($doctor->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($doctor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($doctor->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($doctor->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Clinical Histories') ?></h4>
                <?php if (!empty($doctor->clinical_histories)) : ?>
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
                            <th><?= __('Expediente') ?></th>
                            <th><?= __('Lpm') ?></th>
                            <th><?= __('Imc') ?></th>
                            <th><?= __('Piel') ?></th>
                            <th><?= __('Cabeza') ?></th>
                            <th><?= __('Cuello') ?></th>
                            <th><?= __('Cardiopulmonar') ?></th>
                            <th><?= __('Mamas') ?></th>
                            <th><?= __('Eco Transvaginal') ?></th>
                            <th><?= __('Longitudinal') ?></th>
                            <th><?= __('Anteroposterior') ?></th>
                            <th><?= __('Transverso') ?></th>
                            <th><?= __('Endometrio') ?></th>
                            <th><?= __('Longitud Cuello Uterio') ?></th>
                            <th><?= __('Ovario Derecho') ?></th>
                            <th><?= __('Ovario Izquierdo') ?></th>
                            <th><?= __('Ovoides Aplanadas') ?></th>
                            <th><?= __('Ovoides Aplanadas Izquierda') ?></th>
                            <th><?= __('Transverso Izquierdo') ?></th>
                            <th><?= __('Logitudinal Izquierdo') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($doctor->clinical_histories as $clinicalHistories) : ?>
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
                            <td><?= h($clinicalHistories->expediente) ?></td>
                            <td><?= h($clinicalHistories->lpm) ?></td>
                            <td><?= h($clinicalHistories->imc) ?></td>
                            <td><?= h($clinicalHistories->piel) ?></td>
                            <td><?= h($clinicalHistories->cabeza) ?></td>
                            <td><?= h($clinicalHistories->cuello) ?></td>
                            <td><?= h($clinicalHistories->cardiopulmonar) ?></td>
                            <td><?= h($clinicalHistories->mamas) ?></td>
                            <td><?= h($clinicalHistories->eco_transvaginal) ?></td>
                            <td><?= h($clinicalHistories->longitudinal) ?></td>
                            <td><?= h($clinicalHistories->anteroposterior) ?></td>
                            <td><?= h($clinicalHistories->transverso) ?></td>
                            <td><?= h($clinicalHistories->endometrio) ?></td>
                            <td><?= h($clinicalHistories->longitud_cuello_uterio) ?></td>
                            <td><?= h($clinicalHistories->ovario_derecho) ?></td>
                            <td><?= h($clinicalHistories->ovario_izquierdo) ?></td>
                            <td><?= h($clinicalHistories->ovoides_aplanadas) ?></td>
                            <td><?= h($clinicalHistories->ovoides_aplanadas_izquierda) ?></td>
                            <td><?= h($clinicalHistories->transverso_izquierdo) ?></td>
                            <td><?= h($clinicalHistories->logitudinal_izquierdo) ?></td>
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
                <h4><?= __('Related Prescriptions') ?></h4>
                <?php if (!empty($doctor->prescriptions)) : ?>
                <div class="table-responsive">
                    <table>
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
                        <?php foreach ($doctor->prescriptions as $prescriptions) : ?>
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
                                <?= $this->Html->link(__('View'), ['controller' => 'Prescriptions', 'action' => 'view', $prescriptions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Prescriptions', 'action' => 'edit', $prescriptions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Prescriptions', 'action' => 'delete', $prescriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Quotes') ?></h4>
                <?php if (!empty($doctor->quotes)) : ?>
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
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Status Quote Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($doctor->quotes as $quotes) : ?>
                        <tr>
                            <td><?= h($quotes->id) ?></td>
                            <td><?= h($quotes->asunto) ?></td>
                            <td><?= h($quotes->nota) ?></td>
                            <td><?= h($quotes->specialty_id) ?></td>
                            <td><?= h($quotes->doctor_id) ?></td>
                            <td><?= h($quotes->beneficiary_id) ?></td>
                            <td><?= h($quotes->fecha) ?></td>
                            <td><?= h($quotes->hora) ?></td>
                            <td><?= h($quotes->created) ?></td>
                            <td><?= h($quotes->modified) ?></td>
                            <td><?= h($quotes->person_id) ?></td>
                            <td><?= h($quotes->status_quote_id) ?></td>
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
