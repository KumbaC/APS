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
            <?= $this->Html->link(__('Lista de usuarios'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-danger text-uppercase font-weight-bold']) ?>
        </div>
    </aside>

    <div class="row d-flex justify-content-center">
    <div class="column-responsive  card row">
        <div class="usersDoctors form content card-body d-flex just-content-center">
            <?= $this->Form->create($usersDoctor) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold"><?= __('Registro de usuarios | doctores') ?></legend>
                <?php
                    echo $this->Form->control('username', ['label' => 'Usuario', 'placeholder' => 'nombre.apellido', 'required' => true]);
                    echo $this->Form->control('password', ['label' => 'Contraseña', 'placeholder' => 'Contraseña', 'required' => true]);
                    echo $this->Form->control('role_id', ['options' => $roles, 'value' => 3, 'type' => 'hidden']);
                    //echo $this->Form->control('doctor_id', ['options' => $roles]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary text-uppercase btn-block font-weight-bold']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
 </div>

