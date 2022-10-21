<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>
<div class="persons index content">
    <!-- <//?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-user-tie"></i>  <?= __('Titular')  ?></h3>
    <br><br>
    <div class="table-responsive">
        <table class="table table-bordered bg-dark mt-4 rounded-top">
            <thead class="thead-light">
                <tr>

                    <th class="text-center"><?= h('Cedula') ?></th>
                    <th class="text-center"><?= h('Nombre') ?></th>
                    <th class="text-center"><?= h('Apellido') ?></th>
                    <th class="text-center"><?= h('Correo Electronico') ?></th>
                    <th class="text-center"><?= h('Departamento') ?></th>
                    <!-- <th class="text-center"><//?= h('Estatus') ?></th> -->
                    <th class="text-center"><?= h('Cargo') ?></th>
                    <th class="actions text-center"><?= __('Imprimir') ?></th>
                    <th class="actions text-center"><?= __('Consultas') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person): ?>
                <tr>

                    <td class="text-center font-weight-bold">V-<?= h($person->cedula) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->nombre) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->apellido) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->email) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->department->descripcion)?></td>
                    <!-- <td class="text-center"><//?= h($person->status->descripcion) ?></td> -->
                    <td class="text-center font-weight-bold"><?= h($person->cargo->descripcion) ?></td>
                    <td class="text-center">
                       <?= $this->Html->link(__(''), ['action' => 'view', $person->id, '_ext' => 'pdf'], ['class' => 'fas fa-file-pdf btn btn-warning']) ?>
                        <!-- <//?= $this->Html->link(__('Editar'), ['action' => 'edit', $person->id]) ?>
                        <//?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?> -->
                    </td>
                    <td class="text-center">
                        <?= $this->Html->link(__('+'), ['controller' => 'quotes', 'action' => 'add', $person->id], ['class' => 'fas fa-ticket-alt btn btn-warning']) ?> &nbsp;
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <!-- <//?= $this->Paginator->first('<< ' . __('first')) ?> -->
           <!--  <//?= $this->Paginator->prev('' . __('Anterior')) ?>
            <//?= $this->Paginator->numbers() ?>
            <//?= $this->Paginator->next(__('Siguiente') . '') ?> -->
            <!-- <//?= $this->Paginator->last(__('last') . ' >>') ?> -->
        </ul>
        <!-- <p><//?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, demostración {{current}} registro (s) de {{count}} total')) ?></p> -->
    </div>
</div>
