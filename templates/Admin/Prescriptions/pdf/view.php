<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>
<div class="card border border-dark" style="width: 65rem; height:50rem;">
<?= $this->Html->image('cintillo_azul.png', ['fullBase' => true, 'style' => 'width:65rem;']);?>


    <aside class="">
    <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:55px; margin-left:20px;']);?>

    </aside>
    <h4 class="text-center font-weight-bold">ATENCION PRIMARIA DE SALUD (APS)</h4>

    <div class="column-responsive column-80 ">
        <div class="prescriptions view content card-body">

                    <h5 class="font-weight-bold text-center">Fecha: <?= h($prescription->fecha) ?></h5>
                </tr>
            <table>
                <tr>
                    <th><?= __('Paciente:') ?></th>
                    <?php if (!empty($prescription->person)): ?>
                        <td style="text-decoration-line: underline;"><?= h($prescription->person->nombre) ?> <?= h($prescription->person->apellido) ?></td>

                    <?php else: ?>
                        <td style="text-decoration-line: underline;"><?= h($prescription->beneficiary->nombre) ?> <?= h($prescription->beneficiary->apellido) ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <th><?= __('Cedula:') ?></th>
                    <?php if (!empty($prescription->person)): ?>
                        <td style="text-decoration-line: underline;">V- <?= h($prescription->person->cedula) ?></td>

                    <?php else: ?>
                        <td style="text-decoration-line: underline;">V- <?= h($prescription->beneficiary->cedula) ?></td>
                    <?php endif; ?>
                </tr>

                <tr>
                    <th><?= __('Doctor:') ?></th>
                    <td style="text-decoration-line: underline;">Dr. <?= h($prescription->doctor->nombre) ?> <?= h($prescription->doctor->apellido) ?></td>
                </tr>

                <tr>
                    <th><?= __('Recipe: ') ?></th>
                    <td style="text-decoration-line: underline;"><?= h($prescription->descripcion) ?></td>
                </tr>

            </table>

                 <br> <br>
                    <p class="font-weight-bold text-center text-uppercase h4"><?= __('Indicaciones: ') ?></p>
                    <p style="" class="h4 text-center"><?= h($prescription->indicaciones) ?></p>

                        <br><br>

                    <p class="font-weight-bold text-center text-uppercase"><?= __('Firma del medico: ') ?></p>
                    <p  class="h4 text-center">_________________________</p>


                    <p class="font-weight-bold text-center text-uppercase"><?= __('Sello: ') ?></p>
                    <p  class="h4 text-center">_________________________</p>

        </div>
    </div>
</div>
