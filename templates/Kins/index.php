<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kin[]|\Cake\Collection\CollectionInterface $kins
 */
?>
<div class="kins index content">
    <?= $this->Html->link(__('New Kin'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Kins') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kins as $kin): ?>
                <tr>
                    <td><?= $this->Number->format($kin->id) ?></td>
                    <td><?= h($kin->descripcion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $kin->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $kin->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $kin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kin->id)]) ?>
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
