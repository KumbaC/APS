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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pathology->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pathology->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pathologies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pathologies form content">
            <?= $this->Form->create($pathology) ?>
            <fieldset>
                <legend><?= __('Edit Pathology') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
