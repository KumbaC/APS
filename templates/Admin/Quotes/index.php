<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quotes
 */
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');

?>
<div class="quotes index content">

    <h3 class="text-uppercase font-weight-bold ml-2"><i class="fas fa-notes-medical"></i>  <?= __('Consultas') ?></h3>
    <br>

    <?= $this->Form->create(null,['type' => 'get']) ?>
    <div class="row">
        <div class="col-md-2">
        <?php echo $this->Form->control('key', ['label' => '',  'placeholder' => 'Buscar' ]); ?>

        </div>
        <?= $this->Form->submit(__('Buscar'), ['class' => 'btn btn-primary btn-md', 'style' => 'margin-top: 21px; margin-left: -12px;' ]) ?>
    </div>

    <?= $this->Form->end() ?>


    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead class="thead thead-light">
                <tr>

                    <th class="text-center"><?= h('Asunto') ?></th>
                    <th class="text-center"><?= h('Nota') ?></th>
                    <th class="text-center"><?= h('Paciente') ?></th>
                    <th class="text-center"><?= h('Especialidad') ?></th>
                    <th class="text-center"><?= h('Doctor') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="text-center"><?= h('hora') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('status_quote_id', 'Estatus') ?></th>



                    <th class="actions text-center"><?= __('Opciones') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($quotes as $quote): ?>
                <tr>

                    <td class="text-center font-weight-bold"><?= h($quote->asunto) ?></td>
                    <td class="text-center font-weight-bold"><?= h($quote->nota) ?></td>

                    <?php if (empty($quote->person->nombre)): ?>
                    <td class="text-center font-weight-bold"><?= $quote->has('beneficiary') ? $this->Html->link([$quote->beneficiary->nombre, '  ', $quote->beneficiary->apellido],  ['controller' => 'Beneficiary', 'action' => 'view', $quote->beneficiary->id]) : '' ?></td>

                    <?php else: ?>
                    <td class="text-center font-weight-bold"><?= $quote->has('person') ? $this->Html->link([ $quote->person->nombre, '   ', $quote->person->apellido], ['controller' => 'Persons', 'action' => 'view', $quote->person->id]) : '' ?></td>

                    <?php endif; ?>

                    <td class="text-center font-weight-bold"><?= h($quote->specialty->descripcion) ?></td>
                    <td class="text-center font-weight-bold"><?=  $quote->has('doctor') ? $this->Html->link(['Dr. ', $quote->doctor->nombre, '  ', $quote->doctor->apellido],  ['controller' => 'Doctors', 'action' => 'view', $quote->doctor->id]) : ''  ?></td>
                    <td class="text-center font-weight-bold"><?= h($quote->fecha) ?></td>
                    <td class="text-center font-weight-bold"><?= h($quote->hora) ?></td>


                    <!-- BOTONES DE ESTATUS -->
                    <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                    <td class="h5 font-weight-bold text-center text-uppercase"><span class="badge badge-success"><?= h($quote->status_quote->descripcion) ?></span></td>

                    <?php else: ?>
                        <td class="h5 font-weight-bold text-center text-uppercase"><span class="badge badge-danger"><?= h($quote->status_quote->descripcion) ?></span></td>
                    <?php endif; ?>

                        <!-- BENEFICIARIOS -->
                    <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                        <?php if (empty($quote->person->nombre)): ?>

                            <td class="pagination text-center">
                             <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-warning']) ?>
                             <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning']) ?>
                        <?php else: ?>
                            <td class="pagination text-center">
                             <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-warning']) ?>
                            <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning']) ?>
                        <?php endif; ?>


                            <?= $this->Html->link(__(''), ['action' => 'edit', $quote->id], ['class' => 'fas fa-edit btn btn-warning']) ?>

                        <?php if ($session->read('Auth.User.role_id') == 1): ?>
                             <?= $this->Form->postLink(__(''), ['action' => 'delete', $quote->id], ['confirm' => __('¿Quiere eliminar la consulta medica?', $quote->id),  'class' => 'fas fa-trash-alt btn btn-warning']) ?>
                        <?php endif; ?>

                        </td>
                    <?php else: ?>
                        <?php if (empty($quote->person->nombre)): ?>

                        <td class="pagination text-center">
                        <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-warning disabled']) ?>
                        <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning disabled']) ?>
                    <?php else: ?>
                        <td class="pagination text-center">
                       <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-warning disabled']) ?>
                       <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning disabled']) ?>
                    <?php endif; ?>


                       <!--  <//?= //$this->Html->link(__(''), ['action' => 'view', $quote->person->id], ['class' => 'fas fa-eye btn btn-warning']) ?> -->

                        <?= $this->Html->link(__(''), ['action' => 'edit', $quote->id], ['class' => 'fas fa-edit btn btn-warning']) ?>

                        <?php if ($session->read('Auth.User.role_id') == 1): ?>

                         <?= $this->Form->postLink(__(''), ['action' => 'delete', $quote->id], ['confirm' => __('¿Quiere eliminar la consulta medica?', $quote->id),  'class' => 'fas fa-trash-alt btn btn-warning']) ?>

                        <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . '') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div>
</div>
