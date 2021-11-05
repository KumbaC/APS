<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pathology[]|\Cake\Collection\CollectionInterface $pathologies
 */
?>
<div class="pathologies index content">
    <?= $this->Html->link(__('New Pathology'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pathologies') ?></h3>
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
                <?php foreach ($pathologies as $pathology): ?>
                <tr>
                    <td><?= $this->Number->format($pathology->id) ?></td>
                    <td><?= h($pathology->descripcion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pathology->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pathology->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pathology->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pathology->id)]) ?>
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
