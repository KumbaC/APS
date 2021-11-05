<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialty $specialty
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $specialty->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $specialty->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Specialties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="specialties form content">
            <?= $this->Form->create($specialty) ?>
            <fieldset>
                <legend><?= __('Edit Specialty') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
