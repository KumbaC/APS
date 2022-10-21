<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDoctor[]|\Cake\Collection\CollectionInterface $usersDoctors
 */
?>
<div class="usersDoctors index content">
    <?= $this->Html->link(__('New Users Doctor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users Doctors') ?></h3>
    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <!-- <th>< ?= h('id') ?></th> -->
                    <th><?= h('Usuario') ?></th>
                    <th><?= h('Contraseña') ?></th>
                    <th><?= h('Rol') ?></th>
                    <!-- <th>< ?= h('Creado') ?></th>
                    <th>< ?= h('Modificado') ?></th> -->
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersDoctors as $usersDoctor): ?>
                <tr>
                    <!-- <td>< ?= $this->Number->format($usersDoctor->id) ?></td> -->
                    <td><?= h($usersDoctor->username) ?></td>
                    <td><?= h($usersDoctor->password) ?></td>
                    <td><?= $usersDoctor->has('role') ? $this->Html->link($usersDoctor->role->descripcion, ['controller' => 'Roles', 'action' => 'view', $usersDoctor->role->id]) : '' ?></td>
                    <!-- <td>< ?= h($usersDoctor->created) ?></td>
                    <td>< ?= h($usersDoctor->modified) ?></td> -->
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usersDoctor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersDoctor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersDoctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDoctor->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
 
</div>
