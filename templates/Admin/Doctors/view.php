<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor $doctor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-center text-uppercase font-weight-bold"> <i class="fas fa-tools"></i> <?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Doctores'), ['action' => 'index'], ['class' => 'text-uppercase font-weight-bold btn btn-danger side-nav-item']) ?>
            <?= $this->Html->link(__('Modificar Doctor'), ['action' => 'edit', $doctor->id], ['class' => 'text-uppercase font-weight-bold btn btn-danger side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card" style="margin-left: 15em;">
        <div class="doctors view content card-header">
          <h3 class="text-center"> <i class="fas fa-user-md"></i> Doctor </h3>
            <table class="table table-bordered bg-danger">
                <tr>
                    <th class="text-uppercase"><?= __('Nombre') ?></th>
                    <td class="font-weight-bold text-center"><?= h($doctor->nombre) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase"><?= __('Apellido') ?></th>
                    <td class="font-weight-bold text-center"><?= h($doctor->apellido) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase"><?= __('Cedula') ?></th>
                    <td class="font-weight-bold text-center">V-<?= h($doctor->cedula) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase"><?= __('Email') ?></th>
                    <td class="font-weight-bold text-center"><?= h($doctor->email) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase"><?= __('Especialidad') ?></th>
                    <td class="font-weight-bold text-center"><?= h($doctor->specialty->descripcion) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase"><?= __('Telefono') ?></th>
                    <td class="font-weight-bold text-center">+58 <?= h($doctor->telefono) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase"><?= __('Registrado') ?></th>
                    <td class="font-weight-bold text-center"><?= h($doctor->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
