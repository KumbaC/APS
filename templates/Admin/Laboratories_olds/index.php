<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory[]|\Cake\Collection\CollectionInterface $laboratories
 */
?>
<div class="laboratories index content">
    <?= $this->Html->link(__('New Laboratory'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Laboratories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('clinical_history_id') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laboratories as $laboratory): ?>
                <tr>
                    <td><?= $this->Number->format($laboratory->id) ?></td>
                    <td><?= $laboratory->has('clinical_history') ? $this->Html->link($laboratory->clinical_history->id, ['controller' => 'ClinicalHistories', 'action' => 'view', $laboratory->clinical_history->id]) : '' ?></td>
                    <td><?= h($laboratory->descripcion) ?></td>
                    <td><?= h($laboratory->created) ?></td>
                    <td><?= h($laboratory->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $laboratory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $laboratory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $laboratory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $laboratory->id)]) ?>
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
