<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary $beneficiary
 * @var \Cake\Collection\CollectionInterface|string[] $persons
 * @var \Cake\Collection\CollectionInterface|string[] $kins
 */

use function PHPSTORM_META\type;

?>
<div class="row">
    <aside class="column">

    </aside>
    <div class="column-responsive column-80 form-group mx-auto">
        <div class="beneficiary form content form-group-lg card">
            <?= $this->Form->create($beneficiary) ?>
            <fieldset class="card-body">
                <legend class="text-center font-weight-bold"><i class="fas fa-address-card"></i> <?= __('AGREGAR BENEFICIARIO') ?></legend>

                <?php
                    echo $this->Form->control('person_id', ['type' => 'hidden']);
                ?>
                <div class="form-row">
                <div class="form-group col-md-6">
                <?php
                    echo $this->Form->control('nombre', ['placeholder' => 'Introducir nombre', 'required']);
                ?>
                </div>
            <div class="form-group col-md-6">
                <?php
                    echo $this->Form->control('apellido', ['placeholder' => 'Introducir apellido', 'required']);
                ?>
            </div>
            </div>
            <div class="form-group">
                <?php
                    echo $this->Form->control('edad', ['placeholder' => 'Introducir edad', 'type' => 'number', 'min' => '1'  ]);
                ?>
                 <?php
                    echo $this->Form->control('cedula', ['placeholder' => 'Ingrese su cedula de identidad', 'type' => 'number', 'min' => '1']);
                ?>
                <small class="form-text text-muted ml-2" style="margin-top: -12px;">Ejemplo V- 5.812.144 </small>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <?php
                    echo $this->Form->control('gender_id', ['label' => 'Genero', 'options' => $genders]);
                ?>
            </div>
            <div class="form-group col-md-6">
                <?php
                    echo $this->Form->control('kin_id', ['label' => 'Parentesco', 'options' => $kins ]);
                ?>
            </div>
        </div>
        <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block']) ?>
            </fieldset>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
