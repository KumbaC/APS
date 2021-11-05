<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kin $kin
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Kin'), ['action' => 'edit', $kin->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Kin'), ['action' => 'delete', $kin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kin->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Kins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Kin'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="kins view content">
            <h3><?= h($kin->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($kin->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($kin->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Beneficiary') ?></h4>
                <?php if (!empty($kin->beneficiary)) : ?>
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
                        <?php foreach ($kin->beneficiary as $beneficiary) : ?>
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
        </div>
    </div>
</div>
