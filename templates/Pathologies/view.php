<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pathology $pathology
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pathology'), ['action' => 'edit', $pathology->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pathology'), ['action' => 'delete', $pathology->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pathology->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pathologies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pathology'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pathologies view content">
            <h3><?= h($pathology->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($pathology->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pathology->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
