<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor[]|\Cake\Collection\CollectionInterface $doctors
 */
?>
<div class="doctors index content">
    <?= $this->Html->link(__('New Doctor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Doctors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('apellido') ?></th>
                    <th><?= $this->Paginator->sort('cedula') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('specialty_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('firma') ?></th>
                    <th><?= $this->Paginator->sort('sello') ?></th>
                    <th><?= $this->Paginator->sort('telefono_secundario') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $doctor): ?>
                <tr>
                    <td><?= $this->Number->format($doctor->id) ?></td>
                    <td><?= h($doctor->nombre) ?></td>
                    <td><?= h($doctor->apellido) ?></td>
                    <td><?= h($doctor->cedula) ?></td>
                    <td><?= h($doctor->telefono) ?></td>
                    <td><?= h($doctor->email) ?></td>
                    <td><?= $doctor->has('specialty') ? $this->Html->link($doctor->specialty->descripcion, ['controller' => 'Specialties', 'action' => 'view', $doctor->specialty->id]) : '' ?></td>
                    <td><?= h($doctor->created) ?></td>
                    <td><?= h($doctor->modified) ?></td>
                    <td><?= $doctor->has('user') ? $this->Html->link($doctor->user->id, ['controller' => 'Users', 'action' => 'view', $doctor->user->id]) : '' ?></td>
                    <td><?= h($doctor->firma) ?></td>
                    <td><?= h($doctor->sello) ?></td>
                    <td><?= h($doctor->telefono_secundario) ?></td>
                    <td><?= h($doctor->username) ?></td>
                    <td><?= h($doctor->password) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $doctor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $doctor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $doctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctor->id)]) ?>
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
