<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cargo $cargo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cargo'), ['action' => 'edit', $cargo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cargo'), ['action' => 'delete', $cargo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cargo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cargos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cargo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cargos view content">
            <h3><?= h($cargo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($cargo->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cargo->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Persons') ?></h4>
                <?php if (!empty($cargo->persons)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Cedula') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Apellido') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Department Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Cargo Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cargo->persons as $persons) : ?>
                        <tr>
                            <td><?= h($persons->id) ?></td>
                            <td><?= h($persons->cedula) ?></td>
                            <td><?= h($persons->nombre) ?></td>
                            <td><?= h($persons->apellido) ?></td>
                            <td><?= h($persons->email) ?></td>
                            <td><?= h($persons->created) ?></td>
                            <td><?= h($persons->modified) ?></td>
                            <td><?= h($persons->department_id) ?></td>
                            <td><?= h($persons->status_id) ?></td>
                            <td><?= h($persons->cargo_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Persons', 'action' => 'view', $persons->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Persons', 'action' => 'edit', $persons->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Persons', 'action' => 'delete', $persons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persons->id)]) ?>
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
