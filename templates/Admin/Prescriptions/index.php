<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription[]|\Cake\Collection\CollectionInterface $prescriptions
 */
?>
<div class="prescriptions index content">

    <h3 class="text-uppercase font-weight-bold"><?= __('Recipes Medicos') ?></h3>
    <div class="table-responsive">
        <table class="table table-dark">
            <thead class="thead thead-light">
                <tr>
                    <th class="text-center"><?= $this->Paginator->sort('id') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('person_id', 'Paciente') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('descripcion', 'Receta') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('doctor_id') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="text-center"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prescriptions as $prescription): ?>
                <tr>
                    <td class="text-center font-weight-bold"><?= $this->Number->format($prescription->id) ?></td>

                    <?php  if ($prescription->person_id != null): ?>
                        <td class="text-center font-weight-bold"><?= h($prescription->person->nombre) ?>  <?= h($prescription->person->apellido) ?></td>
                    <?php else: ?>
                        <td class="text-center font-weight-bold"><?= h($prescription->beneficiary->nombre) ?> <?= h($prescription->beneficiary->apellido) ?></td>
                    <?php endif; ?>

                    <td class="text-center font-weight-bold"><?= h($prescription->descripcion) ?></td>

                    <td class="text-center font-weight-bold">Dr. <?= h($prescription->doctor->nombre) ?> <?= h($prescription->doctor->apellido) ?></td>

                    <td class="text-center font-weight-bold"><?= h($prescription->fecha) ?></td>
                    <td class="text-center font-weight-bold">
                        <?= $this->Html->link(__('Imprimir'), ['action' => 'view', $prescription->id, '_ext' => 'pdf'], ['class' => 'btn btn-warning']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $prescription->id], ['class' => 'btn btn-warning']) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $prescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id), 'class' => 'btn btn-warning']) ?>
                    </td>
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
