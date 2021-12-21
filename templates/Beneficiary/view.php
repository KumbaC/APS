<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary $beneficiary
 */
?>
<div class="row">

    <div class="column-responsive column-80 card mx-auto">
        <div class="beneficiary view content card-body">
            <h3>
                <p class="h4 text-center font-weight-bold text-uppercase"> <i class="fas fa-users"></i> Beneficiario</p>

            <table class="table table-hover bg-danger">
                 <tr>
                    <th><?= __('Titular') ?></th>
                    <td>&nbsp;<?= h($beneficiary->person->nombre) ?> <?=  h($beneficiary->person->apellido) ?></td>
                </tr>

                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td>&nbsp;<?= h($beneficiary->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido') ?></th>
                    <td>&nbsp;<?= h($beneficiary->apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Genero') ?></th>
                    <td>&nbsp;<?= h($beneficiary->gender->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Parentesco ') ?></th>
                    <td>&nbsp;<?= h($beneficiary->kin->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Edad') ?></th>
                    <td>&nbsp;<?= $this->Number->format($beneficiary->edad) ?> años</td>
                </tr>

            </table>
        </div>
    </div>
</div>
