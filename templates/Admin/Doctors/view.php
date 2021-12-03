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
          <h3 class="text-center text-uppercase font-weight-bold"> <i class="fas fa-user-md"></i> Doctor </h3>
            <table class="table table-bordered" style="background: #8e0e00; /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #8e0e00, #1f1c18); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #8e0e00, #1f1c18); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
                <tr>
                    <th class="text-uppercase text-light"><?= __('Nombre') ?></th>
                    <td class="h5 font-weight-bold text-center text-light"><?= h($doctor->nombre) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase text-light"><?= __('Apellido') ?></th>
                    <td class="h5 font-weight-bold text-center text-light"><?= h($doctor->apellido) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase text-light"><?= __('Cedula') ?></th>
                    <td class="h5 font-weight-bold text-center text-light">V-<?= h($doctor->cedula) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase text-light"><?= __('Email') ?></th>
                    <td class="h5 font-weight-bold text-center text-light"><?= h($doctor->email) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase text-light"><?= __('Especialidad') ?></th>
                    <td class="h5 font-weight-bold text-center text-light"><?= h($doctor->specialty->descripcion) ?></td>
                </tr>
                <tr>
                    <th class="text-uppercase text-light"><?= __('Telefono') ?></th>
                    <td class="h5 font-weight-bold text-center text-light"><?= h($doctor->telefono) ?></td>
                </tr>

                <tr>
                    <th class="text-uppercase text-light"><?= __('Firma') ?></th>
                    <td class="h5 font-weight-bold text-center text-light"><?= $this->Html->image($doctor->firma, ['style' => 'height:91px; width:110px;  border-radius: 50%;']) ?></td>
                </tr>

                <tr>
                    <th class="text-uppercase text-light"><?= __('Sello') ?></th>
                    <td class="h5 font-weight-bold text-center text-light"><?= $this->Html->image($doctor->sello, ['style' => 'height:91px; width:110px;  border-radius: 50%;']) ?></td>
                </tr>

                <tr>
                    <th class="text-uppercase text-light"><?= __('Registrado') ?></th>
                    <td class="h5 font-weight-bold text-center text-light"><?= h($doctor->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
