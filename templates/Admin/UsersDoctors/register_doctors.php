<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDoctor $usersDoctor
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usersDoctors form content">
            <?= $this->Form->create($usersDoctor) ?>
            <fieldset>
                <legend class="text-uppercase"><?= __('Registro de usuarios para doctores') ?></legend>
                <?php
                    echo $this->Form->control('username', ['label' => 'Usuario']);
                    echo $this->Form->control('password', ['label' => 'Contraseña']);
                    echo $this->Form->control('role_id', ['options' => $roles, 'value' => 3, 'type' => 'hidden']);
                    //echo $this->Form->control('doctor_id', ['options' => $roles]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
