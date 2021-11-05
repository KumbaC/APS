<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cargo[]|\Cake\Collection\CollectionInterface $cargos
 */
?>
<div class="cargos index content">
    <?= $this->Html->link(__('New Cargo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cargos') ?></h3>
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
                <?php foreach ($cargos as $cargo): ?>
                <tr>
                    <td><?= $this->Number->format($cargo->id) ?></td>
                    <td><?= h($cargo->descripcion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cargo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cargo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cargo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cargo->id)]) ?>
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
