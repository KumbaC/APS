<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary[]|\Cake\Collection\CollectionInterface $beneficiary
 */
?>
<div class="beneficiary index content">
   <!--  <//?= $this->Html->link(__('Añadir Beneficiario'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-users"></i> <?= __('Beneficiarios') ?></h3>
    <br><br>
    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead class="thead-light">
                <tr>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('person_id', 'Afiliados') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('nombre') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('apellido') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('kin_id', 'Parentesco') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('cedula') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('edad') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('genero') ?></th>
                    <!-- <th class="text-center"><//?= $this->Paginator->sort('modified', 'Actualizado') ?></th> -->

                    <th class="actions text-center"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($beneficiary as $beneficiary): ?>
                <tr>
                    <td class="text-light text-center font-weight-bold"><?= $this->Number->format($beneficiary->id) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->person->nombre),  ' ',    h($beneficiary->person->apellido)?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->nombre) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->apellido) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->kin->descripcion) ?></td>
                    <td class="text-light text-center font-weight-bold">V-<?= h($beneficiary->cedula) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= $this->Number->format($beneficiary->edad) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->gender->descripcion) ?></td>
                   <!--  <td class="text-center"><//?= h($beneficiary->modified) ?></td> -->

                    <td class="pagination text-center">
                        <?= $this->Html->link(__(''), ['action' => 'view', $beneficiary->id], ['class' => 'fas fa-eye btn btn-warning']) ?>
                        <?= $this->Html->link(__('+'), ['controller' => 'quotes', 'action' => 'addb', $beneficiary->id],['class' => 'fas fa-hospital btn btn-warning']) ?>
                         <?= $this->Html->link(__(''), ['action' => 'edit', $beneficiary->id], ['class' => 'fas fa-edit btn btn-warning']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $beneficiary->id],['confirm' => __('¿Esta seguro que desea eliminar a {0} {1}?', $beneficiary->nombre, $beneficiary->apellido), 'class' => 'fas fa-trash-alt btn btn-warning']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>

        </table>
        <div class="paginator">
        <ul class="pagination">
        <li class="page-item"><!-- <//?= $this->Paginator->first('<< ' . __('first')) ?> -->
            <?= $this->Paginator->prev(' ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' ') ?>
            <!-- <//?= $this->Paginator->last(__('last') . ' >>') ?> --> </li>
        </ul>

      </div>
    </div>

</div>
