<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>


<div class="card" style="width: 32rem; height:58rem; border:solid;">
  <div class="card-body">
    <aside class="">
    <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:65px; position:relative;']);?>

    </aside>
    <br>
    <h4 class="text-center font-weight-bold">ATENCION PRIMARIA DE SALUD (APS)</h4>

                    <hr class="bg-dark">
            <table>
         <!-- CEDULA -->
         <tr>
                 <p class="font-weight-bold"><?= __('Cedula:') ?></p>
                    <?php if (!empty($prescription->person)): ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;">V- <?= h($prescription->person->cedula) ?></p>

                    <?php else: ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;">V- <?= h($prescription->beneficiary->cedula) ?></p>
                    <?php endif; ?>
                </tr>
            <!-- CEDULA -->

            <!--TITULAR O BENEFICIARIO  -->
                <tr>
                <p class="font-weight-bold"><?= __('Paciente:') ?></p>
                    <?php if (!empty($prescription->person)): ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;"><?= h($prescription->person->nombre) ?> <?= h($prescription->person->apellido) ?></p>

                    <?php else: ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;"><?= h($prescription->beneficiary->nombre) ?> <?= h($prescription->beneficiary->apellido) ?></p>
                    <?php endif; ?>
                </tr>
            <!--TITULAR O BENEFICIARIO  -->

            <!-- DOCTOR -->
                    <p class="font-weight-bold" style="margin-left:17em; margin-top:-4.9rem;"><?= __('Doctor:') ?></p>
                    <p class="text-right" style="margin-top:-2.5rem; margin-right:28px;"><?= h($prescription->doctor->nombre), h($prescription->doctor->apellido) ?></p>
            <!-- DOCTOR -->
<br>
            <!-- FECHA -->

                <p class="font-weight-bold" style="margin-left:17em; margin-top:-1.5rem;"><?= __('Fecha:') ?></p>
                <p class="text-right" style="margin-top:-40px; margin-right:80px;"><?= h($prescription->fecha) ?></p>
            <!-- FECHA -->

            </table>
            <hr class="bg-dark">
            <br>
                    <p class="font-weight-bold text-center text-uppercase h6"><?= __('Recipe: ') ?></p>
                    <p style="" class="h6 text-center"><?= h($prescription->descripcion) ?></p>

                        <br>
                        <?php  ?>
                    <p class="font-weight-bold text-uppercase" style="margin-left: 340px; margin-top:230px;"><?= __('Sello: ') ?></p>
                    <p  class="h4 text-center" style="margin-left: 280px;"><?= $this->Html->image($prescription->doctor->sello, ['fullBase' => true, 'style' => 'height:80px; width:80px;']) ?> </p>


                    <p class="font-weight-bold text-uppercase" style="margin-top:-126px; margin-left:30px;"><?= __('Firma del medico: ') ?></p>
                    <p  class="h4" style="margin-top:-5px;"> <?= $this->Html->image($prescription->doctor->firma, ['fullBase' => true, 'style' => 'margin-left:50px; height:50px; width:120px;']); ?> </p>



  </div>
</div>



<!-- INDICACIONES -->

<div class="card" style="width: 32rem; height:58rem; border:solid; margin-left:32.2em; margin-top:-60.8em;">
  <div class="card-body">
    <aside class="">
    <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:65px; position:relative;']);?>

    </aside>
    <br>
    <h4 class="text-center font-weight-bold">ATENCION PRIMARIA DE SALUD (APS)</h4>

                    <hr class="bg-dark">
            <table>
         <!-- CEDULA -->
         <tr>
                 <p class="font-weight-bold"><?= __('Cedula:') ?></p>
                    <?php if (!empty($prescription->person)): ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;">V- <?= h($prescription->person->cedula) ?></p>

                    <?php else: ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;">V- <?= h($prescription->beneficiary->cedula) ?></p>
                    <?php endif; ?>
                </tr>
            <!-- CEDULA -->

            <!--TITULAR O BENEFICIARIO  -->
                <tr>
                <p class="font-weight-bold"><?= __('Paciente:') ?></p>
                    <?php if (!empty($prescription->person)): ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;"><?= h($prescription->person->nombre) ?> <?= h($prescription->person->apellido) ?></p>

                    <?php else: ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;"><?= h($prescription->beneficiary->nombre) ?> <?= h($prescription->beneficiary->apellido) ?></p>
                    <?php endif; ?>
                </tr>
            <!--TITULAR O BENEFICIARIO  -->

            <!-- DOCTOR -->
                    <p class="font-weight-bold" style="margin-left:17em; margin-top:-4.9rem;"><?= __('Doctor:') ?></p>
                    <p class="text-right" style="margin-top:-2.5rem; margin-right:28px;"><?= h($prescription->doctor->nombre), h($prescription->doctor->apellido) ?></p>
            <!-- DOCTOR -->
<br>
            <!-- FECHA -->

                <p class="font-weight-bold" style="margin-left:17em; margin-top:-1.5rem;"><?= __('Fecha:') ?></p>
                <p class="text-right" style="margin-top:-40px; margin-right:80px;"><?= h($prescription->fecha) ?></p>
            <!-- FECHA -->

            </table>
            <hr class="bg-dark">
            <br>

                    <p class="font-weight-bold text-center text-uppercase h6"><?= __('Indicaciones: ') ?></p>
                    <p style="" class="h6 text-center"><?= h($prescription->indicaciones)  ?></p>

                        <br>




  </div>
                    <p class="font-weight-bold text-uppercase" style="margin-left: 360px; padding-top:200px;"><?= __('Sello: ') ?></p>
                    <picture  class="h4 text-center" style="margin-left: 350px;"><?= $this->Html->image($prescription->doctor->sello, ['fullBase' => true, 'style' => 'height:80px; width:80px;']) ?> </picture>


                    <p class="font-weight-bold text-uppercase" style="margin-top:-120px; margin-left:30px;"><?= __('Firma del medico: ') ?></p>
                    <p  class="h4" style="margin-top:-5px;"> <?= $this->Html->image($prescription->doctor->firma, ['fullBase' => true, 'style' => 'margin-left:50px; height:50px; width:120px;']); ?> </p>



</div>
