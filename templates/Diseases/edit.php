<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disease $disease
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $disease->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $disease->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Diseases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diseases form content">
            <?= $this->Form->create($disease) ?>
            <fieldset>
                <legend><?= __('Edit Disease') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
