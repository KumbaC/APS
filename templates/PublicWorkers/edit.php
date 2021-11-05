<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PublicWorker $publicWorker
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $publicWorker->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $publicWorker->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Public Workers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="publicWorkers form content">
            <?= $this->Form->create($publicWorker) ?>
            <fieldset>
                <legend><?= __('Edit Public Worker') ?></legend>
                <?php
                    echo $this->Form->control('identification_card');
                    echo $this->Form->control('email');
                    echo $this->Form->control('network_user');
                    echo $this->Form->control('name');
                    echo $this->Form->control('identity_card');
                    echo $this->Form->control('person_id');
                    echo $this->Form->control('code');
                    echo $this->Form->control('email_alternative');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
