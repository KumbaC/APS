<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory $laboratories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Laboratory'), ['action' => 'edit', $laboratories->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Laboratory'), ['action' => 'delete', $laboratories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $laboratories->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Laboratories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Laboratory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="laboratories view content">
            <h3><?= h($laboratories->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Clinical History') ?></th>
                    <td><?= $laboratories->has('clinical_history') ? $this->Html->link($laboratories->clinical_history->id, ['controller' => 'ClinicalHistories', 'action' => 'view', $laboratories->clinical_history->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($laboratories->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($laboratories->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($laboratories->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($laboratories->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Biochemistry') ?></h4>
                <?php if (!empty($laboratories->biochemistry)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($laboratories->biochemistry as $biochemistry) : ?>
                        <tr>
                            <td><?= h($biochemistry->id) ?></td>
                            <td><?= h($biochemistry->descripcion) ?></td>
                            <td><?= h($biochemistry->created) ?></td>
                            <td><?= h($biochemistry->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Biochemistry', 'action' => 'view', $biochemistry->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Biochemistry', 'action' => 'edit', $biochemistry->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Biochemistry', 'action' => 'delete', $biochemistry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $biochemistry->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Hematologies') ?></h4>
                <?php if (!empty($laboratories->hematologies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($laboratories->hematologies as $hematologies) : ?>
                        <tr>
                            <td><?= h($hematologies->id) ?></td>
                            <td><?= h($hematologies->descripcion) ?></td>
                            <td><?= h($hematologies->created) ?></td>
                            <td><?= h($hematologies->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Hematologies', 'action' => 'view', $hematologies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Hematologies', 'action' => 'edit', $hematologies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hematologies', 'action' => 'delete', $hematologies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hematologies->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Immunology') ?></h4>
                <?php if (!empty($laboratories->immunology)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($laboratories->immunology as $immunology) : ?>
                        <tr>
                            <td><?= h($immunology->id) ?></td>
                            <td><?= h($immunology->descripcion) ?></td>
                            <td><?= h($immunology->created) ?></td>
                            <td><?= h($immunology->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Immunology', 'action' => 'view', $immunology->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Immunology', 'action' => 'edit', $immunology->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Immunology', 'action' => 'delete', $immunology->id], ['confirm' => __('Are you sure you want to delete # {0}?', $immunology->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Parasitologies') ?></h4>
                <?php if (!empty($laboratories->parasitologies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($laboratories->parasitologies as $parasitologies) : ?>
                        <tr>
                            <td><?= h($parasitologies->id) ?></td>
                            <td><?= h($parasitologies->descripcion) ?></td>
                            <td><?= h($parasitologies->created) ?></td>
                            <td><?= h($parasitologies->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Parasitologies', 'action' => 'view', $parasitologies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Parasitologies', 'action' => 'edit', $parasitologies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parasitologies', 'action' => 'delete', $parasitologies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parasitologies->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Specials') ?></h4>
                <?php if (!empty($laboratories->specials)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($laboratories->specials as $specials) : ?>
                        <tr>
                            <td><?= h($specials->id) ?></td>
                            <td><?= h($specials->descripcion) ?></td>
                            <td><?= h($specials->created) ?></td>
                            <td><?= h($specials->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Specials', 'action' => 'view', $specials->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Specials', 'action' => 'edit', $specials->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Specials', 'action' => 'delete', $specials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specials->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Urinalysis') ?></h4>
                <?php if (!empty($laboratories->urinalysis)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($laboratories->urinalysis as $urinalysis) : ?>
                        <tr>
                            <td><?= h($urinalysis->id) ?></td>
                            <td><?= h($urinalysis->descripcion) ?></td>
                            <td><?= h($urinalysis->created) ?></td>
                            <td><?= h($urinalysis->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Urinalysis', 'action' => 'view', $urinalysis->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Urinalysis', 'action' => 'edit', $urinalysis->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Urinalysis', 'action' => 'delete', $urinalysis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $urinalysis->id)]) ?>
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
