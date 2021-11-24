<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClinicalHistory[]|\Cake\Collection\CollectionInterface $clinicalHistories
 */
?>
<div class="clinicalHistories index content">

    <br>
    <h3 class="font-weight-bold text-uppercase"> <i class="fas fa-book-medical"></i>  <?= __('Historia Clinicas') ?></h3>
    <div class="table-responsive">
        <table class="table table-dark table-bordered">
            <thead class="thead thead-light">
                <tr>
                    <th class="text-center"><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('person_id', 'Paciente') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('blood_type_id', 'Tipo de sangre') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('doctor_id', 'Doctor') ?></th>
                    <th class="actions text-center"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clinicalHistories as $clinicalHistory): ?>
                <tr>
                    <td class="text-center font-weight-bold"><?= $this->Number->format($clinicalHistory->id) ?></td>
                    <?php if (empty($clinicalHistory->person->nombre)): ?>
                        <td class="text-center font-weight-bold"><?= $clinicalHistory->has('beneficiary') ? h($clinicalHistory->beneficiary->nombre .' '. $clinicalHistory->beneficiary->apellido) : '' ?></td>
                    <?php else: ?>
                    <td class="text-center font-weight-bold"><?= $clinicalHistory->has('person') ? h($clinicalHistory->person->nombre .' '. $clinicalHistory->person->apellido) : '' ?></td>
                    <?php endif; ?>

                    <?php if (empty($clinicalHistory->blood_type->descripcion)): ?>
                        <td class="text-uppercase font-weight-bold text-center">Desconocido</td>
                    <?php else: ?>
                    <td class="text-uppercase font-weight-bold text-center"><?= $clinicalHistory->has('blood_type') ? h($clinicalHistory->blood_type->descripcion) : '' ?></td>
                    <?php endif; ?>

                    <td class="text-center font-weight-bold"><?= $clinicalHistory->has('doctor') ? h('Dr. '. ' ' . $clinicalHistory->doctor->nombre . $clinicalHistory->doctor->apellido ) : '' ?></td>
                    <td class="pagination text-center">
                        <?= $this->Html->link(__('Imprimir'), ['action' => 'view', $clinicalHistory->id, '_ext' => 'pdf'], ['class' => 'btn btn-warning']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $clinicalHistory->id], ['class' => 'btn btn-warning']) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $clinicalHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinicalHistory->id), 'class' => 'btn btn-warning']) ?>
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
