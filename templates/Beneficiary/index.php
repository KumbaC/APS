<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary[]|\Cake\Collection\CollectionInterface $beneficiary
 */
?>
<div class="beneficiary index content">
    
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-users"></i> <?= __('Beneficiarios') ?></h3>
    <br><br>
    <div class="table-responsive">
        <table class="table table-bordered bg-dark">
            <thead class="thead-light">
                <tr>

                    <th class="text-center" ><?= h('Afiliado') ?></th>
                    <th class="text-center" ><?= h('Nombre') ?></th>
                    <th class="text-center" ><?= h('Apellido') ?></th>
                    <th class="text-center" ><?= h('Cedula') ?></th>
                    <th class="text-center" ><?= h('Edad') ?></th>
                    <th class="text-center" ><?= h('Parentesco') ?></th>
                    <th class="text-center" ><?= h('Genero') ?></th>


                    <!-- <th class="actions"><?//= __('Opciones') ?></th> -->
                    <th class="actions"><?= __('Consulta') ?></th>
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

                    <!-- <td class="actions">
                       <?//= $this->Html->link(__(''), ['action' => 'view', $beneficiary->id], ['class'  => 'ml-2 fas fa-eye btn btn-warning']) ?>

                    </td> -->
                    <td class="text-center">
                        <?= $this->Html->link(__('+'), ['controller' => 'Quotes', 'action' => 'addb', $beneficiary->id], ['class' => 'fas fa-ticket-alt btn btn-warning']) ?> &nbsp;
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
