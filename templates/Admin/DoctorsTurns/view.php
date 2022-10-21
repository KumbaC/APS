<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DoctorsTurn $doctorsTurn
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Doctors Turn'), ['action' => 'edit', $doctorsTurn->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Doctors Turn'), ['action' => 'delete', $doctorsTurn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $doctorsTurn->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Doctors Turns'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Doctors Turn'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="doctorsTurns view content">
            <h3><?= h($doctorsTurn->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Doctor') ?></th>
                    <td><?= $doctorsTurn->has('doctor') ? $this->Html->link($doctorsTurn->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $doctorsTurn->doctor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Turn') ?></th>
                    <td><?= $doctorsTurn->has('turn') ? $this->Html->link($doctorsTurn->turn->id, ['controller' => 'Turns', 'action' => 'view', $doctorsTurn->turn->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($doctorsTurn->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
