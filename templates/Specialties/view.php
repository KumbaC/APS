<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialty $specialty
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Specialty'), ['action' => 'edit', $specialty->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Specialty'), ['action' => 'delete', $specialty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialty->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Specialties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Specialty'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="specialties view content">
            <h3><?= h($specialty->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($specialty->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($specialty->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($specialty->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($specialty->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Doctors') ?></h4>
                <?php if (!empty($specialty->doctors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Apellido') ?></th>
                            <th><?= __('Cedula') ?></th>
                            <th><?= __('Telefono') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Specialty Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($specialty->doctors as $doctors) : ?>
                        <tr>
                            <td><?= h($doctors->id) ?></td>
                            <td><?= h($doctors->nombre) ?></td>
                            <td><?= h($doctors->apellido) ?></td>
                            <td><?= h($doctors->cedula) ?></td>
                            <td><?= h($doctors->telefono) ?></td>
                            <td><?= h($doctors->email) ?></td>
                            <td><?= h($doctors->specialty_id) ?></td>
                            <td><?= h($doctors->created) ?></td>
                            <td><?= h($doctors->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Doctors', 'action' => 'view', $doctors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Doctors', 'action' => 'edit', $doctors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Doctors', 'action' => 'delete', $doctors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctors->id)]) ?>
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
