<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DoctorsTurn[]|\Cake\Collection\CollectionInterface $doctorsTurns
 */
?>
<div class="doctorsTurns index content">
    <?= $this->Html->link(__('New Doctors Turn'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Doctors Turns') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('doctor_id') ?></th>
                    <th><?= $this->Paginator->sort('turn_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctorsTurns as $doctorsTurn): ?>
                <tr>
                    <td><?= $this->Number->format($doctorsTurn->id) ?></td>
                    <td><?= $doctorsTurn->has('doctor') ? $this->Html->link($doctorsTurn->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $doctorsTurn->doctor->id]) : '' ?></td>
                    <td><?= $doctorsTurn->has('turn') ? $this->Html->link($doctorsTurn->turn->id, ['controller' => 'Turns', 'action' => 'view', $doctorsTurn->turn->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $doctorsTurn->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $doctorsTurn->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $doctorsTurn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorsTurn->id)]) ?>
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
