<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialty[]|\Cake\Collection\CollectionInterface $specialties
 */
?>
<div class="specialties index content">
    <?= $this->Html->link(__('New Specialty'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Specialties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($specialties as $specialty): ?>
                <tr>
                    <td><?= $this->Number->format($specialty->id) ?></td>
                    <td><?= h($specialty->descripcion) ?></td>
                    <td><?= h($specialty->created) ?></td>
                    <td><?= h($specialty->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $specialty->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specialty->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specialty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialty->id)]) ?>
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
