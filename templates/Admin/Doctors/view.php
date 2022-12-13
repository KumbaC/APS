<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor $doctor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista Doctores'), ['action' => 'index'], ['class' => 'side-nav-item text-uppercase font-weight-bold btn btn-danger']) ?>
            <!-- < ?= $this->Html->link(__('Edit Doctor'), ['action' => 'edit', $doctor->id], ['class' => 'side-nav-item']) ?>
            < ?= $this->Form->postLink(__('Delete Doctor'), ['action' => 'delete', $doctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctor->id), 'class' => 'side-nav-item']) ?>
            
            < ?= $this->Html->link(__('New Doctor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?> -->
        </div>
    </aside>
</div>


<div class="related">
                
                <h4 class="text-uppercase font-weight-bold text-center"><?= __($doctor->nombre) ?> <?= __($doctor->apellido) ?></h4>
  




            <div class="related">
                <h4 class="text-uppercase font-weight-bold"><?= __('Perfil del Medico') ?></h4>
                <?php if (!empty($doctor->user_doctor)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Username') ?></th>
                            <th><?= __('Role') ?></th>
                            <th class="actions"><?= __('Opciones') ?></th>
                        </tr>
                        <?php foreach ($doctor->user_doctor as $usuarios) : ?>
                        <tr>
                            <td><?= h($usuarios->id) ?></td>
                            <td><?= h($usuarios->username) ?></td>
                            <td><?= h($usuarios->role_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Turns', 'action' => 'view', $usuarios->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Turns', 'action' => 'edit', $usuarios->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Turns', 'action' => 'delete', $usuarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turns->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4 class="text-uppercase font-weight-bold"><?= __('Historico de Informes Medicos') ?></h4>
                <?php if (!empty($doctor->clinical_histories)) : ?>
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                    
                        <tr>
                            <th class="text-uppercase"><?= __('Identificador') ?></th>

                            <th class="text-uppercase"><?= __('Paciente') ?></th>
                            
                           <!--  <th>< ?= __('Beneficiary Id') ?></th> -->
                           
                            <th class="text-uppercase"><?= __('Grupo Sanguineo') ?></th>
                            
                            <?php if($doctor->specialty_id == 8): ?>
                            <th class="text-uppercase"><?= __('Odontologo(@)') ?></th>
                            <?php else : ?>
                            <th class="text-uppercase"><?= __('Medico') ?></th>
                            <?php endif; ?>

                            <?php if($doctor->specialty_id == 8): ?>
                            
                            
                            <?php else: ?>
                            <th class="text-uppercase"><?= __('Peso') ?></th>
                            <th class="text-uppercase"><?= __('Altura') ?></th>
                            <th class="text-uppercase"><?= __('FR') ?></th>
                            <th class="text-uppercase"><?= __('FC') ?></th>
                            <th class="text-uppercase"><?= __('TA') ?></th>

                            <?php endif; ?>
                        </tr>
                        

                        <?php foreach ($doctor->clinical_histories as $clinicalHistories) : ?>
                        <tr>
                            <td>#<?= h($clinicalHistories->id) ?></td>
                            <td><?= h($clinicalHistories->person->nombre) ?> <?= h($clinicalHistories->person->apellido) ?></td>
                                <?php if($clinicalHistories->blood_type_id): ?>
                            <td><?= h($clinicalHistories->blood_type->descripcion) ?></td>
                                <?php else: ?>
                            <td class="font-weight-bold text-uppercase"><?= h('No fue cargado en este informe') ?></td>
                                <?php endif; ?>
                            <td>Dr. <?= h($clinicalHistories->doctor->nombre) ?> <?= h($clinicalHistories->doctor->apellido) ?></td>
                            <?php if($clinicalHistories->doctor->specialty_id == 8): ?>
                           <!--   -->
                            <?php else: ?>
                            <td><?= h($clinicalHistories->peso) ?></td>
                            <td><?= h($clinicalHistories->altura) ?></td>
                            <td><?= h($clinicalHistories->fr) ?></td>
                            <td><?= h($clinicalHistories->fc) ?></td>
                            <td><?= h($clinicalHistories->ta) ?></td>
                           
                            <?php endif; ?>
                          <!--   <td class="actions">
                                < ?= $this->Html->link(__('View'), ['controller' => 'ClinicalHistories', 'action' => 'view', $clinicalHistories->id]) ?>
                                < ?= $this->Html->link(__('Edit'), ['controller' => 'ClinicalHistories', 'action' => 'edit', $clinicalHistories->id]) ?>
                                < ?= $this->Form->postLink(__('Delete'), ['controller' => 'ClinicalHistories', 'action' => 'delete', $clinicalHistories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinicalHistories->id)]) ?>
                            </td> -->
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4 class="text-uppercase font-weight-bold"><?= __('Historico de Prescripciónes Medicas') ?></h4>
                <?php if (!empty($doctor->prescriptions)) : ?>
                <div class="table-responsive">
                    <table class="table table-hover table-light">
                        <tr>
                            <th class="text-uppercase"><?= __('Identificador') ?></th>
                            <th class="text-uppercase"><?= __('Paciente') ?></th>
                            <th class="text-uppercase"><?= __('Medico tratante') ?></th>
                            <th class="text-uppercase"><?= __('Descripcion') ?></th>
                            <th class="text-uppercase"><?= __('Numero de consulta') ?></th>
                            <th class="text-uppercase"><?= __('Numero de informe medico') ?></th>
                            <th class="text-uppercase"><?= __('Fecha') ?></th>
                            <!-- <th>< ?= __('Indicaciones') ?></th> -->
                            <!-- <th class="actions">< ?= __('Actions') ?></th> -->
                        </tr>
                        <?php foreach ($doctor->prescriptions as $prescriptions) : ?>
                        <tr>
                            <td>#<?= h($prescriptions->id) ?></td>
                            <td><?= h($prescriptions->person->nombre) ?> <?= h($prescriptions->person->apellido) ?></td>
                            <td><?= h($prescriptions->doctor->nombre) ?> <?= h($prescriptions->doctor->apellido) ?></td>
                            <td><?= ($prescriptions->descripcion) ?></td>
                            <td class="text-center font-weight-bold"><?= $this->Html->link(h($prescriptions->quote_id),['controller' => 'Quotes', 'action' => 'view', $prescriptions->quote_id])  ?></td>
                            <td><?= h($prescriptions->clinic_history_id) ?></td>
                            <td><?= h($prescriptions->fecha) ?></td>
                           <!--  <td>< ?= h($prescriptions->indicaciones) ?></td> -->
                            <!-- <td class="actions">
                                < ?= $this->Html->link(__('View'), ['controller' => 'Prescriptions', 'action' => 'view', $prescriptions->id]) ?>
                                < ?= $this->Html->link(__('Edit'), ['controller' => 'Prescriptions', 'action' => 'edit', $prescriptions->id]) ?>
                                < ?= $this->Form->postLink(__('Delete'), ['controller' => 'Prescriptions', 'action' => 'delete', $prescriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptions->id)]) ?>
                            </td> -->
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4 class="text-uppercase font-weight-bold"><?= __('Historico de Consultas') ?></h4>
                <?php if (!empty($doctor->quotes)) : ?>
                <div class="table-responsive">
                    <table class="table table-hover table-light">
                        <tr>
                            <th class="text-uppercase"><?= __('Identificador') ?></th>
                            <th class="text-uppercase"><?= __('Paciente') ?></th>
                            
                            <th class="text-uppercase"><?= __('Especialidad') ?></th>
                            <th class="text-uppercase"><?= __('Medico Tratante') ?></th>
                            <th class="text-uppercase"><?= __('Fecha') ?></th>
                            
                            
                            <th class="text-uppercase"><?= __('Estatus') ?></th>
                            <!-- <th class="actions">< ?= __('Actions') ?></th> -->
                        </tr>
                        <?php foreach ($doctor->quotes as $quotes) : ?>
                        <tr>
                            <td>#<?= h($quotes->id) ?></td>
                            <td><?= h($quotes->person->nombre) ?> <?= h($quotes->person->apellido) ?></td>
                            
                            <td><?= h($quotes->specialty->descripcion) ?></td>
                            <td><?= h($quotes->doctor->nombre) ?> <?= h($quotes->doctor->apellido) ?></td>
                            <td><?= h($quotes->created) ?></td> 

                            <?php if($quotes->status_quote_id == 1): ?>     
                            <td class="badge badge-success"><?= h($quotes->status_quote->descripcion) ?></td>
                            <?php elseif ($quotes->status_quote_id == 2): ?> 
                            <td class="badge badge-danger"><?= h($quotes->status_quote->descripcion) ?></td>
                            <?php elseif ($quotes->status_quote_id == 3): ?> 
                            <td class="badge badge-primary"><?= h($quotes->status_quote->descripcion) ?></td>
                            <?php endif; ?>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
