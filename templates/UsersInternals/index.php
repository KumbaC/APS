<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersInternal[]|\Cake\Collection\CollectionInterface $usersInternals
 */
?>
<div class="usersInternals index content">
    <?= $this->Html->link(__('New Users Internal'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users Internals') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('identification_card') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('network_user') ?></th>
                    <th><?= $this->Paginator->sort('full_name') ?></th>
                    <th><?= $this->Paginator->sort('public_worker_id') ?></th>
                    <th><?= $this->Paginator->sort('role_id') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersInternals as $usersInternal): ?>
                <tr>
                    <td><?= $this->Number->format($usersInternal->id) ?></td>
                    <td><?= h($usersInternal->identification_card) ?></td>
                    <td><?= h($usersInternal->email) ?></td>
                    <td><?= h($usersInternal->network_user) ?></td>
                    <td><?= h($usersInternal->full_name) ?></td>
                    <td><?= $usersInternal->has('public_worker') ? $this->Html->link($usersInternal->public_worker->name, ['controller' => 'PublicWorkers', 'action' => 'view', $usersInternal->public_worker->id]) : '' ?></td>
                    <td><?= $usersInternal->has('role') ? $this->Html->link($usersInternal->role->descripcion, ['controller' => 'Roles', 'action' => 'view', $usersInternal->role->id]) : '' ?></td>
                    <td><?= h($usersInternal->active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usersInternal->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersInternal->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersInternal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersInternal->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
