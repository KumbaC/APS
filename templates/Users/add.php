<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $persons
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 */
?>
<div class="row">

    <div class="column-responsive column-80 mx-auto card">
        <div class="users form content card-body">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend class="text-center"><?= __('Añadir usuarios') ?></legend>
                    <div class="form-row">
                     <div class="form-group col-md-6">
                      <?php  echo $this->Form->control('person_id', ['options' => $persons, 'label' => 'Cedula']); ?>
                      </div>
                      <div class="form-group col-md-6">
                      <?php  echo $this->Form->control('username'); ?>
                      </div></div>
                      <?php  echo $this->Form->control('password'); ?>
                      <?php  echo $this->Form->control('role_id', ['options' => $roles]); ?>



            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $(document).ready(function(){
        if('#person_id'){
            $("#username").attr('disabled', false);
        }

    });


</script>
