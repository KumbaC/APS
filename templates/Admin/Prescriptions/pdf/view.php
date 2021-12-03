<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>


<div class="card" style="width: 32rem; height:50rem; border:dashed;">
  <div class="card-body">
    <aside class="">
    <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:65px;']);?>

    </aside>
    <br>
    <h4 class="text-center font-weight-bold">ATENCION PRIMARIA DE SALUD (APS)</h4>

    <div class="column-responsive column-80 ">
        <div class="prescriptions view content">

                    <h5 class="text-uppercase text-center">Fecha: <?= h($prescription->fecha) ?></h5>
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

                    <p class="font-weight-bold" style="margin-left:15em;"><?= __('Doctor:') ?></p>
                    <p style="margin-left:18.9em; margin-top:-40px;"> <?= h($prescription->doctor->nombre), h($prescription->doctor->apellido) ?></p>

            </table>


                    <p class="font-weight-bold text-center text-uppercase h6"><?= __('Recipe: ') ?></p>
                    <p style="" class="h6 text-center"><?= h($prescription->descripcion) ?></p>

                        <br><br>
                        <?php  ?>
                    <p class="font-weight-bold text-uppercase" style="margin-left: 300px; margin-top:250px;"><?= __('Sello: ') ?></p>
                    <p  class="h4 text-center" style="margin-left: 200px;"><?= $this->Html->image($prescription->doctor->sello, ['fullBase' => true, 'style' => 'height:80px; width:80px;']) ?> </p>


                    <p class="font-weight-bold text-uppercase" style="margin-top:-110px; margin-left:30px;"><?= __('Firma del medico: ') ?></p>
                    <p  class="h4" style="margin-top:-5px;"> <?= $this->Html->image($prescription->doctor->firma, ['fullBase' => true, 'style' => 'margin-left:50px; height:50px; width:120px;']); ?> </p>


        </div>
    </div>
  </div>
</div>



<!-- INDICACIONES -->


<div class="card" style="width: 32rem; height:50rem; border:dashed; margin-top:-50rem; margin-left:495px; ">
  <div class="card-body">
    <aside class="">
    <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:65px;']);?>

    </aside>
    <br>
    <h4 class="text-center font-weight-bold">ATENCION PRIMARIA DE SALUD (APS)</h4>

    <div class="column-responsive column-80 ">
        <div class="prescriptions view content">

                    <h5 class="text-center text-uppercase">Fecha: <?= h($prescription->fecha) ?></h5>
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


                    <p class="font-weight-bold" style="margin-left:15em;"><?= __('Doctor:') ?></p>
                    <p style="margin-left:18.9em; margin-top:-40px;"><?= h($prescription->doctor->nombre), h($prescription->doctor->apellido) ?></p>



            </table>

                            <br><br>
            <p class="font-weight-bold text-center text-uppercase h6"><?= __('Indicaciones: ') ?></p>
                    <p style="" class="h6 text-center"><?= h($prescription->indicaciones) ?></p>

                        <br><br>
                        <?php  ?>
                    <p class="font-weight-bold text-uppercase" style="margin-left: 300px; margin-top:150px;"><?= __('Sello: ') ?></p>
                    <p  class="h4 text-center" style="margin-left: 200px;"><?= $this->Html->image($prescription->doctor->sello, ['fullBase' => true, 'style' => 'height:80px; width:80px;']) ?> </p>


                    <p class="font-weight-bold text-uppercase" style="margin-top:-120px; margin-left:30px;"><?= __('Firma del medico: ') ?></p>
                    <p  class="h4" style="margin-top:-5px;"> <?= $this->Html->image($prescription->doctor->firma, ['fullBase' => true, 'style' => 'margin-left:50px; height:50px; width:120px;']); ?> </p>

        </div>
    </div>
  </div>
</div>
