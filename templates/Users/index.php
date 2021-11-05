<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
   <!--  <//?= $this->Html->link(__('Añadir usuarios'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center"><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('Afiliado') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('Correo Electronico') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('role') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('Registrado') ?></th>
                    <th class="actions text-center"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($user->id) ?></td>
                    <td class="text-center"><?= $user->has('person') ? $this->Html->link($user->person->nombre, ['controller' => 'Persons', 'action' => 'view', $user->person->id]) : '' ?></td>
                    <td class="text-center"><?= h($user->username) ?></td>
                    <td class="text-center"><?= $user->has('role') ? $this->Html->link($user->role->descripcion, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                    <td class="text-center"><?= h($user->created) ?></td>
                    <td class="pagination text-center">
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
            <?= $this->Paginator->prev('' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . '') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div>

</div>
