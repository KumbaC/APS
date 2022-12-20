<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDoctor $usersDoctor
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 */
?>

    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de usarios'), ['action' => 'index'], ['class' => 'side-nav-item text-uppercase font-weight-bold btn btn-danger']) ?>
        </div>
    </aside>
  <div class="row d-flex justify-content-center">
    <div class="column-responsive column-80 card">
        <div class="usersDoctors form content card-body">
            <?= $this->Form->create($usersDoctor) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold"><?= __('Registrar Apoyos Administrativos') ?></legend>
                <?php
                    echo $this->Form->control('username', ['label' => 'Usuario', 'placeholder' => 'usuario', 'required' => true]);
                    echo $this->Form->control('password', ['label' => 'Contraseña', 'placeholder' => 'Contraseña', 'required' => true]);
                    echo $this->Form->control('role_id', ['options' => $roles, 'value' => 4, 'type' => 'hidden']);
                 ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'text-uppercase font-weight-bold btn btn-danger btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
