<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hour $hour
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Hour'), ['action' => 'edit', $hour->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Hour'), ['action' => 'delete', $hour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hour->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Hours'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Hour'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="hours view content">
            <h3><?= h($hour->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Turnos') ?></th>
                    <td><?= h($hour->turnos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($hour->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Doctors') ?></h4>
                <?php if (!empty($hour->doctors)) : ?>
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
                            <th><?= __('User Internal Id') ?></th>
                            <th><?= __('Firma') ?></th>
                            <th><?= __('Sello') ?></th>
                            <th><?= __('Telefono Secundario') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($hour->doctors as $doctors) : ?>
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
                            <td><?= h($doctors->user_internal_id) ?></td>
                            <td><?= h($doctors->firma) ?></td>
                            <td><?= h($doctors->sello) ?></td>
                            <td><?= h($doctors->telefono_secundario) ?></td>
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
