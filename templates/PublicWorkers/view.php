<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PublicWorker $publicWorker
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Public Worker'), ['action' => 'edit', $publicWorker->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Public Worker'), ['action' => 'delete', $publicWorker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publicWorker->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Public Workers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Public Worker'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="publicWorkers view content">
            <h3><?= h($publicWorker->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Identification Card') ?></th>
                    <td><?= h($publicWorker->identification_card) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($publicWorker->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Network User') ?></th>
                    <td><?= h($publicWorker->network_user) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($publicWorker->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Identity Card') ?></th>
                    <td><?= h($publicWorker->identity_card) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($publicWorker->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Alternative') ?></th>
                    <td><?= h($publicWorker->email_alternative) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($publicWorker->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Person Id') ?></th>
                    <td><?= $this->Number->format($publicWorker->person_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users Internals') ?></h4>
                <?php if (!empty($publicWorker->users_internals)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Identification Card') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Network User') ?></th>
                            <th><?= __('Full Name') ?></th>
                            <th><?= __('Public Worker Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Active') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($publicWorker->users_internals as $usersInternals) : ?>
                        <tr>
                            <td><?= h($usersInternals->id) ?></td>
                            <td><?= h($usersInternals->identification_card) ?></td>
                            <td><?= h($usersInternals->email) ?></td>
                            <td><?= h($usersInternals->network_user) ?></td>
                            <td><?= h($usersInternals->full_name) ?></td>
                            <td><?= h($usersInternals->public_worker_id) ?></td>
                            <td><?= h($usersInternals->role_id) ?></td>
                            <td><?= h($usersInternals->active) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UsersInternals', 'action' => 'view', $usersInternals->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UsersInternals', 'action' => 'edit', $usersInternals->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UsersInternals', 'action' => 'delete', $usersInternals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersInternals->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
