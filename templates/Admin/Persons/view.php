<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="persons view content">
            <h3><?= h($person->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cedula') ?></th>
                    <td><?= h($person->cedula) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($person->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido') ?></th>
                    <td><?= h($person->apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($person->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Department') ?></th>
                    <td><?= $person->has('department') ? $this->Html->link($person->department->id, ['controller' => 'Departments', 'action' => 'view', $person->department->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $person->has('status') ? $this->Html->link($person->status->id, ['controller' => 'Status', 'action' => 'view', $person->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cargo') ?></th>
                    <td><?= $person->has('cargo') ? $this->Html->link($person->cargo->id, ['controller' => 'Cargos', 'action' => 'view', $person->cargo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($person->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($person->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Beneficiary') ?></h4>
                <?php if (!empty($person->beneficiary)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Apellido') ?></th>
                            <th><?= __('Edad') ?></th>
                            <th><?= __('Genero') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Kin Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->beneficiary as $beneficiary) : ?>
                        <tr>
                            <td><?= h($beneficiary->id) ?></td>
                            <td><?= h($beneficiary->person_id) ?></td>
                            <td><?= h($beneficiary->nombre) ?></td>
                            <td><?= h($beneficiary->apellido) ?></td>
                            <td><?= h($beneficiary->edad) ?></td>
                            <td><?= h($beneficiary->genero) ?></td>
                            <td><?= h($beneficiary->created) ?></td>
                            <td><?= h($beneficiary->modified) ?></td>
                            <td><?= h($beneficiary->kin_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Beneficiary', 'action' => 'view', $beneficiary->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Beneficiary', 'action' => 'edit', $beneficiary->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Beneficiary', 'action' => 'delete', $beneficiary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $beneficiary->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($person->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->modified) ?></td>
                            <td><?= h($users->person_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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
