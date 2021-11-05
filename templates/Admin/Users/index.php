<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
   <!--  <//?= $this->Html->link(__('Añadir usuario'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
   <br> <br>
    <h3><?= __('Usuarios') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered bg-dark">
            <thead class="thead-light">
                <tr>
                    <th class="text-center"><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('Titular') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('username') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('role', 'roles') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('Registrado') ?></th>
                    <th class="actions text-center"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td class="text-center font-weight-bold"><?= $this->Number->format($user->id) ?></td>
                    <td class="text-center font-weight-bold"><?= h($user->person->nombre) ?></td>
                    <td class="text-center font-weight-bold"><?= h($user->username) ?></td>
                    <td class="text-center font-weight-bold"><?= h($user->role->descripcion) ?></td>
                    <td class="text-center font-weight-bold"><?= h($user->created) ?></td>
                    <td class="pagination">
                        <button class="btn btn-warning"><?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?></button>
                        <button class="btn btn-warning"><?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?></button>
                        <button class="btn btn-warning"><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div>

</div>
