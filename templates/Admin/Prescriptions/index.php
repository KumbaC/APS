<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription[]|\Cake\Collection\CollectionInterface $prescriptions
 */
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');
?>
<div class="prescriptions index content">
<br>
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-file-medical-alt"></i> <?= __('Recipes Medicos') ?></h3>
    <br>
    <!-- BUSCADOR -->
    <?= $this->Form->create(null,['type' => 'get']) ?>
    <div class="row">
        <div class="col-md-2">
        <?php echo $this->Form->control('key', ['class' => '', 'label' => '',  'placeholder' => 'Buscar' ]); ?>

        </div>
        <?= $this->Form->submit(__('Buscar'), ['class' => 'btn btn-primary btn-md', 'style' => 'margin-top: 21px; margin-left: -12px;' ]) ?>
    </div>

    <?= $this->Form->end() ?>
    <!-- BUSCADOR -->


    <div class="table-responsive">
        <table class="table table-dark table-bordered">
            <thead class="thead thead-light">
                <tr>

                    <th class="text-center"><?= $this->Paginator->sort('person_id', 'Paciente') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('descripcion', 'Receta') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('doctor_id') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="actions text-center"><?= __('Imprimir') ?></th>
                    <th class="actions text-center"><?= __('Editar') ?></th>
                    <?php if ($session->read('Auth.User.role_id') == 1): ?>
                    <th class="actions text-center"><?= __('Eliminar') ?></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prescriptions as $prescription): ?>
                <tr>


                    <?php  if ($prescription->person_id != null): ?>
                        <td class="text-center font-weight-bold"><?= h($prescription->person->nombre) ?>  <?= h($prescription->person->apellido) ?></td>
                    <?php else: ?>
                        <td class="text-center font-weight-bold"><?= h($prescription->beneficiary->nombre) ?> <?= h($prescription->beneficiary->apellido) ?></td>
                    <?php endif; ?>

                    <td class="text-center font-weight-bold"><?= h($prescription->descripcion) ?></td>

                    <td class="text-center font-weight-bold">Dr. <?= h($prescription->doctor->nombre) ?> <?= h($prescription->doctor->apellido) ?></td>

                    <td class="text-center font-weight-bold"><?= h($prescription->fecha) ?></td>
                    <td class="text-center font-weight-bold">
                        <?= $this->Html->link(__(''), ['action' => 'view', $prescription->id, '_ext' => 'pdf'], ['class' => 'far fa-file-pdf btn btn-warning']) ?>
                    </td>
                    <td class="text-center font-weight-bold"><?= $this->Html->link(__(''), ['action' => 'edit', $prescription->id], ['class' => 'far fa-edit btn btn-warning']) ?></td>

                    <?php if ($session->read('Auth.User.role_id') == 1): ?> <td class="text-center font-weight-bold">
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $prescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id), 'class' => 'fas fa-trash-alt btn btn-warning']) ?>

                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev(' ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' ') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div>
</div>
