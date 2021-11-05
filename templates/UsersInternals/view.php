<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersInternal $usersInternal
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Users Internal'), ['action' => 'edit', $usersInternal->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Users Internal'), ['action' => 'delete', $usersInternal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersInternal->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users Internals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Users Internal'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usersInternals view content">
            <h3><?= h($usersInternal->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Identification Card') ?></th>
                    <td><?= h($usersInternal->identification_card) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($usersInternal->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Network User') ?></th>
                    <td><?= h($usersInternal->network_user) ?></td>
                </tr>
                <tr>
                    <th><?= __('Full Name') ?></th>
                    <td><?= h($usersInternal->full_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Public Worker') ?></th>
                    <td><?= $usersInternal->has('public_worker') ? $this->Html->link($usersInternal->public_worker->name, ['controller' => 'PublicWorkers', 'action' => 'view', $usersInternal->public_worker->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $usersInternal->has('role') ? $this->Html->link($usersInternal->role->descripcion, ['controller' => 'Roles', 'action' => 'view', $usersInternal->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($usersInternal->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $usersInternal->active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
