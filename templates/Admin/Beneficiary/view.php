<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary $beneficiary
 */
?>
<div class="row">

    <div class="column-responsive column-80 card mx-auto">
        <div class="beneficiary view content card-body">
        <h3 class="text-center font-weight-bold"><i class="fas fa-users"></i>  Beneficiario</h3>
            <table class="table table-bordered" style="background: #870000; /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #870000, #190a05); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #870000, #190a05); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
                 <tr>
                    <th class="h4 font-weight-bold text-light"><?= __('Titular') ?></th>
                    <td class="h5 font-weight-bold  text-light"><?= h($beneficiary->person->nombre) ?> <?= h($beneficiary->person->apellido) ?></td>
                </tr>
                <tr>
                    <th class="h5 font-weight-bold text-light"><?= __('Beneficiario') ?></th>
                    <td class="h5 font-weight-bold text-light"><?= h($beneficiary->nombre) ?>  <?= h($beneficiary->apellido) ?></td>
                </tr>


                <tr>
                    <th class="h5 font-weight-bold text-light"><?= __('Parentesco') ?></th>
                    <td class="h5 font-weight-bold text-light">&nbsp;&nbsp;<?= h($beneficiary->kin->descripcion)?></td>
                </tr>

                <tr>
                    <th class="h5 font-weight-bold text-light"><?= __('Genero') ?></th>
                    <td class="h5 font-weight-bold text-light"><?= h($beneficiary->gender->descripcion) ?></td>
                </tr>
                <tr>
                    <th class="h5 font-weight-bold text-light"><?= __('Cedula') ?></th>
                    <td class="h5 font-weight-bold text-light">V-<?= h($beneficiary->cedula) ?></td>
                </tr>

                <tr>
                    <th class="h5 font-weight-bold text-light"><?= __('Edad') ?></th>
                    <td class="h5 font-weight-bold text-light"><?= $this->Number->format($beneficiary->edad) ?> años</td>
                </tr>
                <tr>
                    <th class="h5 font-weight-bold text-light"><?= __('Registrado') ?></th>
                    <td class="h5 text-light"><?= h($beneficiary->created) ?></td>
                </tr>

            </table>
        </div>
    </div>
</div>
