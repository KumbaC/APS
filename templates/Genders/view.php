<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gender $gender
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gender'), ['action' => 'edit', $gender->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gender'), ['action' => 'delete', $gender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gender->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Genders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gender'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="genders view content">
            <h3><?= h($gender->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($gender->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($gender->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Beneficiary') ?></h4>
                <?php if (!empty($gender->beneficiary)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Apellido') ?></th>
                            <th><?= __('Edad') ?></th>
                            <th><?= __('Gender Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Kin Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($gender->beneficiary as $beneficiary) : ?>
                        <tr>
                            <td><?= h($beneficiary->id) ?></td>
                            <td><?= h($beneficiary->person_id) ?></td>
                            <td><?= h($beneficiary->nombre) ?></td>
                            <td><?= h($beneficiary->apellido) ?></td>
                            <td><?= h($beneficiary->edad) ?></td>
                            <td><?= h($beneficiary->gender_id) ?></td>
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
        </div>
    </div>
</div>
