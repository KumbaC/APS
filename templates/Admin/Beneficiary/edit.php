<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary $beneficiary
 * @var string[]|\Cake\Collection\CollectionInterface $persons
 * @var string[]|\Cake\Collection\CollectionInterface $kins
 */
?>
<div class="row">
    <aside class="column">

    </aside>
    <div class="column-responsive column-80 form-group mx-auto">
        <div class="beneficiary form content form-group-lg card">
            <?= $this->Form->create($beneficiary) ?>
            <fieldset class="card-body">
                <legend class="text-center"><i class="fas fa-address-card"></i> <?= __('ACTUALIZAR BENEFICIARIO') ?></legend>

                <?php
                    echo $this->Form->control('person_id', ['type' => 'hidden']);
                ?>
                <div class="form-row">
                <div class="form-group col-md-6">
                <?php
                    echo $this->Form->control('nombre', ['placeholder' => 'Introducir nombre' ]);
                ?>
                </div>
            <div class="form-group col-md-6">
                <?php
                    echo $this->Form->control('apellido', ['placeholder' => 'Introducir apellido' ]);
                ?>
            </div>
            </div>
            <div class="form-group">
                <?php
                    echo $this->Form->control('edad', ['placeholder' => 'Introducir edad', 'type' => 'number' ]);
                ?>
                 <?php
                    echo $this->Form->control('cedula', ['placeholder' => 'Ingrese su cedula de identidad', 'type' => 'number' ]);
                ?>
                <small class="form-text text-muted ml-2" style="margin-top: -12px;">Ejemplo: &nbsp; V- 5812144 </small>
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
        <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-primary btn-block']) ?>
            </fieldset>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

