<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turn[]|\Cake\Collection\CollectionInterface $turns
 */
?>
<div class="turns index content">
    <?= $this->Html->link(__('New Turn'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Turns') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('meridiano') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turns as $turn): ?>
                <tr>
                    <td><?= $this->Number->format($turn->id) ?></td>
                    <td><?= h($turn->descripcion) ?></td>
                    <td><?= h($turn->meridiano) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $turn->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $turn->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $turn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turn->id)]) ?>
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
