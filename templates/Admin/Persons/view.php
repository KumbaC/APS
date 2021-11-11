<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">

    <div class="column-responsive column-80 mx-auto">
        <div class="persons view content card">
            <h3 class="font-weight-bold text-uppercase text-center"><i class="fas fa-user-tie"></i> <?= h('Titular') ?></h3>
            <table class="table card-body" style="
  background: #8e0e00;
  background: -webkit-linear-gradient(to right, #8e0e00, #1f1c18);
  background: linear-gradient(to right, #8e0e00, #1f1c18);
">
                <tr>
                    <th class="font-weight-bold  h5 text-light"><?= __('Cedula') ?></th>
                    <td class="font-weight-bold h5 text-light">V- <?= h($person->cedula) ?></td>
                </tr>
                <tr>
                    <th class="font-weight-bold  h5 text-light"><?= __('Nombre') ?></th>
                    <td class="font-weight-bold h5 text-light"><?= h($person->nombre) ?></td>
                </tr>
                <tr>
                    <th class="font-weight-bold  h5 text-light"><?= __('Apellido') ?></th>
                    <td class="font-weight-bold h5 text-light"><?= h($person->apellido) ?></td>
                </tr>
                <tr>
                    <th class="font-weight-bold h5 text-light"><?= __('Email') ?></th>
                    <td class="font-weight-bold h5 text-light"><?= h($person->email) ?></td>
                </tr>
                <tr>
                    <th class="font-weight-bold h5 text-light"><?= __('Departmento') ?></th>
                    <td class="font-weight-bold h5 text-light"><?= h($person->department->descripcion)?></td>
                </tr>
                <tr>
                    <th class="font-weight-bold h5 text-light"><?= __('Estatus') ?></th>
                    <td class="font-weight-bold h5 text-light"><?= h($person->status->descripcion) ?></td>
                </tr>
                <tr>
                    <th class="font-weight-bold h5 text-light"><?= __('Cargo') ?></th>
                    <td class="font-weight-bold h5 text-light"><?= h($person->cargo->descripcion)?></td>
                </tr>

            </table>
            <div class="related">
                <h4 class="text-uppercase font-weight-bold text-center"><i class="fas fa-users"></i> <?= __('Beneficiarios') ?></h4>
                <?php if (!empty($person->beneficiary)) : ?>
                <div class="table-responsive">
                    <table class="table table-dark rounded-lg" style="
  background: #8e0e00;
  background: -webkit-linear-gradient(to right, #8e0e00, #1f1c18);
  background: linear-gradient(to right, #8e0e00, #1f1c18);">


                        <?php foreach ($person->beneficiary as $beneficiary) : ?>

                        <tr>

                            <td class="text-center font-weight-bold h5"><?= h($beneficiary->nombre) ?></td>
                            <td class="text-center font-weight-bold h5"><?= h($beneficiary->apellido) ?></td>
                            <td class="text-center font-weight-bold h5"><?= h($beneficiary->edad) ?> años</td>
                            <td class="text-center font-weight-bold h5"><?= h($beneficiary->genero) ?></td>
                            <td class="text-center font-weight-bold h5"><?= h($beneficiary->kin->descripcion) ?></td>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>

            </div>

    </div>
</div>
