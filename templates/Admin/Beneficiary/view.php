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
            <table class="table table-bordered bg-danger">
              <!--   <tr>
                    <th><//?= __('Afiliado') ?></th>
                    <td><//?= h($beneficiary->person->nombre) ?> <//?= h($beneficiary->person->apellido) ?></td>
                </tr> -->
                <tr>
                    <th class="h5 font-weight-bold"><?= __('Nombre') ?></th>
                    <td class="h5 font-weight-bold"><?= h($beneficiary->nombre) ?>  <?= h($beneficiary->apellido) ?></td>
                </tr>

                <tr>
                    <th class="h5 font-weight-bold"><?= __('Genero') ?></th>
                    <td class="h5 font-weight-bold"><?= h($beneficiary->gender->descripcion) ?></td>
                </tr>
                <tr>
                    <th class="h5 font-weight-bold"><?= __('Cedula') ?></th>
                    <td class="h5 font-weight-bold">V-<?= h($beneficiary->cedula) ?></td>
                </tr>
                <tr>
                    <th class="h5 font-weight-bold"><?= __('Parentesco') ?></th>
                    <td class="h5 font-weight-bold">&nbsp;&nbsp;<?= h($beneficiary->kin->descripcion)?></td>
                </tr>
                <tr>
                    <th class="h5 font-weight-bold"><?= __('Edad') ?></th>
                    <td class="h5 font-weight-bold"><?= $this->Number->format($beneficiary->edad) ?> años</td>
                </tr>
                <tr>
                    <th class="h5 font-weight-bold"><?= __('Registrado') ?></th>
                    <td class="h5"><?= h($beneficiary->created) ?></td>
                </tr>

            </table>
        </div>
    </div>
</div>
