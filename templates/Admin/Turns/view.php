<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turn $turn
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Turn'), ['action' => 'edit', $turn->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Turn'), ['action' => 'delete', $turn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turn->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Turns'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Turn'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="turns view content">
            <h3><?= h($turn->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($turn->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Meridiano') ?></th>
                    <td><?= h($turn->meridiano) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($turn->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Doctors') ?></h4>
                <?php if (!empty($turn->doctors)) : ?>
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
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Firma') ?></th>
                            <th><?= __('Sello') ?></th>
                            <th><?= __('Telefono Secundario') ?></th>
                            <th><?= __('Cupos') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($turn->doctors as $doctors) : ?>
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
                            <td><?= h($doctors->user_id) ?></td>
                            <td><?= h($doctors->firma) ?></td>
                            <td><?= h($doctors->sello) ?></td>
                            <td><?= h($doctors->telefono_secundario) ?></td>
                            <td><?= h($doctors->cupos) ?></td>
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
