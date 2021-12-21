<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary[]|\Cake\Collection\CollectionInterface $beneficiary
 */
?>
<div class="beneficiary index content">
    <?//= $this->Html->link(__('Añadir Beneficiario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-users"></i> <?= __('Beneficiarios') ?></h3>
    <br><br>
    <div class="table-responsive">
        <table class="table table-bordered bg-dark">
            <thead class="thead-light">
                <tr>

                    <th class="text-center" ><?= $this->Paginator->sort('person_id', 'Afiliado') ?></th>
                    <th class="text-center" ><?= $this->Paginator->sort('nombre') ?></th>
                    <th class="text-center" ><?= $this->Paginator->sort('apellido') ?></th>
                    <th class="text-center" ><?= $this->Paginator->sort('cedula') ?></th>
                    <th class="text-center" ><?= $this->Paginator->sort('edad') ?></th>
                    <th class="text-center" ><?= $this->Paginator->sort('kin_id', 'Parentesco') ?></th>
                    <th class="text-center" ><?= $this->Paginator->sort('genero') ?></th>


                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($beneficiary as $beneficiary): ?>
                <tr>




                    <td class="text-center font-weight-bold"><?= h($beneficiary->person->nombre) ?> <?= h($beneficiary->person->apellido) ?></td>
                    <td class="text-center font-weight-bold"><?= h($beneficiary->nombre) ?></td>
                    <td class="text-center font-weight-bold"><?= h($beneficiary->apellido) ?></td>
                    <td class="text-center font-weight-bold">V- <?= h($beneficiary->cedula) ?></td>
                    <td class="text-center font-weight-bold"><?= $this->Number->format($beneficiary->edad) ?></td>
                    <td class="text-center font-weight-bold"><?=  h($beneficiary->kin->descripcion) ?></td>
                    <td class="text-center font-weight-bold"><?= h($beneficiary->gender->descripcion) ?></td>

                    <td class="actions">
                       <?= $this->Html->link(__(''), ['action' => 'view', $beneficiary->id], ['class'  => 'ml-2 fas fa-eye btn btn-warning']) ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <!-- <//?= $this->Paginator->first('<< ' . __('first')) ?> -->
            <?= $this->Paginator->prev('' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . '') ?>
            <!-- <//?= $this->Paginator->last(__('last') . ' >>') ?> -->
        </ul>

    </div>
</div>
