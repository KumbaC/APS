<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $persons
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<div class="row">

    <div class="column-responsive column-80 mx-auto">
        <div class="users form content card">
            <?= $this->Form->create($user) ?>
            <fieldset class="card-body">
                <legend class="text-center mt-2"><i class="fas fa-user-circle"></i> &nbsp;<?= __('Actualizar Usuario') ?></legend>
                <?php
                    /* echo $this->Form->control('password');
                    echo $this->Form->control('person_id', ['options' => $persons]); */
                    echo $this->Form->control('username');
                    echo $this->Form->control('role_id', ['label'=> 'Roles', 'options' => $roles]);
                ?>
                <?= $this->Form->button(__('Actualizar' ) , ['class'=> 'btn btn-secondary btn-block']) ?>
            </fieldset>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
