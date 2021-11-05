<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersInternal $usersInternal
 * @var string[]|\Cake\Collection\CollectionInterface $publicWorkers
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersInternal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersInternal->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users Internals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usersInternals form content">
            <?= $this->Form->create($usersInternal) ?>
            <fieldset>
                <legend><?= __('Edit Users Internal') ?></legend>
                <?php
                    echo $this->Form->control('identification_card');
                    echo $this->Form->control('email');
                    echo $this->Form->control('network_user');
                    echo $this->Form->control('full_name');
                    echo $this->Form->control('public_worker_id', ['options' => $publicWorkers]);
                    echo $this->Form->control('role_id', ['options' => $roles]);
                    echo $this->Form->control('active');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
