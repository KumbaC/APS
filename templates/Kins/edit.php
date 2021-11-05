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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $kin->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $kin->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Kins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="kins form content">
            <?= $this->Form->create($kin) ?>
            <fieldset>
                <legend><?= __('Edit Kin') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
