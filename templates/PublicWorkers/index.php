<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PublicWorker[]|\Cake\Collection\CollectionInterface $publicWorkers
 */
?>
<div class="publicWorkers index content">
    <?= $this->Html->link(__('New Public Worker'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Public Workers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('identification_card') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('network_user') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('identity_card') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('email_alternative') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($publicWorkers as $publicWorker): ?>
                <tr>
                    <td><?= $this->Number->format($publicWorker->id) ?></td>
                    <td><?= h($publicWorker->identification_card) ?></td>
                    <td><?= h($publicWorker->email) ?></td>
                    <td><?= h($publicWorker->network_user) ?></td>
                    <td><?= h($publicWorker->name) ?></td>
                    <td><?= h($publicWorker->identity_card) ?></td>
                    <td><?= $this->Number->format($publicWorker->person_id) ?></td>
                    <td><?= h($publicWorker->code) ?></td>
                    <td><?= h($publicWorker->email_alternative) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $publicWorker->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $publicWorker->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $publicWorker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publicWorker->id)]) ?>
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
