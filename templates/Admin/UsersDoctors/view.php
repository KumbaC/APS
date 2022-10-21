<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDoctor $usersDoctor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Users Doctor'), ['action' => 'edit', $usersDoctor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Users Doctor'), ['action' => 'delete', $usersDoctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDoctor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users Doctors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Users Doctor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usersDoctors view content">
            <h3><?= h($usersDoctor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($usersDoctor->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($usersDoctor->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $usersDoctor->has('role') ? $this->Html->link($usersDoctor->role->id, ['controller' => 'Roles', 'action' => 'view', $usersDoctor->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($usersDoctor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($usersDoctor->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($usersDoctor->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
