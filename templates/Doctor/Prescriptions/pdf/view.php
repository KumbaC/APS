<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>

<?= $this->Html->image('recipe.png', ['fullBase' => true, 'style' => 'position: absolute; left: 0px; top: 0px; z-index: -1; opacity:1; height:750px;']);?>

<div class="" style="width:32.7rem; height:47.5rem; border:solid;">
  <div class="">
    <aside class="">
         <?= $this->Html->image('cintillo.png', ['fullBase' => true, 'style' => 'height:50px; width:510px; margin-top:-2px;']);?>
    </aside>
    <br>
    <h6 class="text-center font-weight-bold">SERVICIO MÉDICO DE LA SUPERINTENDENCIA DE LA ACTIVIDAD ASEGURADORA </h6>

                    <hr class="bg-dark">
            <table class="table-responsive">
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
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:90px;"><?= h($prescription->person->nombre) ?> <?= h($prescription->person->apellido) ?></p>

                    <?php else: ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:90px;"><?= h($prescription->beneficiary->nombre) ?> <?= h($prescription->beneficiary->apellido) ?></p>
                    <?php endif; ?>
                </tr>
            <!--TITULAR O BENEFICIARIO  -->

            <!-- DOCTOR -->
                    <p class="font-weight-bold text-center" style="margin-top:-5rem;"><!-- < ?= __('Doctor:') ?> --></p>
                    <p class="text-right" style="margin-top:-2.5rem; margin-right:28px;"><!-- < ?= h($prescription->doctor->nombre), ' ',  h($prescription->doctor->apellido) ?> --></p>
            <!-- DOCTOR -->
<br>
            <!-- FECHA -->

                <p class="font-weight-bold" style="margin-left:21em; margin-top:-1.5rem;"><?= __('Fecha:') ?></p>
                <p class="text-right" style="margin-top:-40px; margin-left:25rem; width:60px;"><?= h($prescription->fecha) ?></p>
            <!-- FECHA -->

            </table>
            <hr class="bg-dark">
            <br>

            <div style="border:solid; height:23rem; border-radius:30px;">
            <br>
                    <div style="height:100px;">
                    <p class="font-weight-bold text-center text-uppercase h5"><?= __('Recipe: ') ?></p>
                    <div style="font-size:12px;" class=""><?= ($prescription->descripcion) ?></div>
                    </div>



                            <!-- FIRMA -->
                        <?= $this->Html->image($prescription->doctor->firma, ['fullBase' => true, 'style' => 'margin-left:40px; height:110px; width:180px;  margin-top:4rem; background-attachment:fixed;']); ?>
                            <!-- FIRMA -->

                        <!-- < ?= $this->Html->image($prescription->doctor->sello, ['fullBase' => true, 'style' => 'height:120px; width:120px; margin-left:80px;  margin-top:4rem; background-attachment:fixed;']) ?> -->

                        </div>

  </div>
  <footer>
        <small style="font-size:8px; margin-top:-10px;" class="blockquote-footer font-weight-bold text-center">Av. Venezuela, Torre del Desarrollo, El Rosal, Municipio Chacao, Zona Metropolitana de Caracas, Venezuela, Código Postal 1060 Teléfono: 0212-9051611 – Sitio Web: www.sudeaseg.gob.ve - Twitter: SudeasegOficial</small>
</footer>
</div>



<!-- INDICACIONES -->

<div class="" style="width: 32.7rem; height:47.5rem; border:solid; margin-left:32.2em; margin-top:-49.1em;">
  <div class="">
    <aside class="">
        
        <?= $this->Html->image('cintillo.png', ['fullBase' => true, 'style' => 'height:50px; width:510px; position:relative; margin-top:25px;']);?>

    </aside>
    <br>
    <h6 class="text-center font-weight-bold">SERVICIO MÉDICO DE LA SUPERINTENDENCIA DE LA ACTIVIDAD ASEGURADORA </h6>

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
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:90px;"><?= h($prescription->person->nombre) ?> <?= h($prescription->person->apellido) ?></p>

                    <?php else: ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:90px;"><?= h($prescription->beneficiary->nombre) ?> <?= h($prescription->beneficiary->apellido) ?></p>
                    <?php endif; ?>
                </tr>
            <!--TITULAR O BENEFICIARIO  -->

            <!-- DOCTOR -->
                    <!-- <p class="font-weight-bold text-center" style="margin-top:-5rem;">< ?= __('Doctor:') ?></p>
                    <p class="text-right" style="margin-top:-2.5rem; margin-right:28px;">< ?= h($prescription->doctor->nombre), ' ',  h($prescription->doctor->apellido) ?></p> -->
            <!-- DOCTOR -->

            <!-- FECHA -->

                
                 <p class="font-weight-bold text-center" style="margin-left:15em; margin-top:-80px;"><?= __('Fecha:') ?></p>
                
                 <p class="text-right" style="margin-left:24.5rem; width:60px; margin-top:-40px;"><?= h($prescription->fecha) ?></p>
            <!-- FECHA -->

            </table>
            
            <hr class="bg-dark">
            <br>
                <div style="border:solid; height:23rem; border-radius:30px;">
                <br>
                    <p class="font-weight-bold text-center text-uppercase h5"><?= __('Indicaciones: ') ?></p>
                    <small style="font-size:12px;" class=""><?= ($prescription->indicaciones)  ?></small>

                        <br>
                </div>

                             
                    <!-- <picture  class="h4 text-center" style="margin-left: 300px;">< ?= $this->Html->image($prescription->doctor->sello, ['fullBase' => true, 'style' => 'height:120px; width:120px; margin-top:-15rem;']) ?> </picture> -->


<!-- <p class="font-weight-bold text-uppercase" style="margin-left:30px;"><?//= __('Firma del medico: ') ?></p> -->
                    <picture  class="h4 text-center"> <?= $this->Html->image($prescription->doctor->firma, ['fullBase' => true, 'style' => 'margin-left:50px; height:110px; width:180px; margin-top:-15rem;']); ?> </picture>

  </div>

                   
<footer>

        <small style="font-size:8px; margin-top:-42px;" class="blockquote-footer font-weight-bold text-center">Av. Venezuela, Torre del Desarrollo, El Rosal, Municipio Chacao, Zona Metropolitana de Caracas, Venezuela, Código Postal 1060 Teléfono: 0212-9051611 – Sitio Web: www.sudeaseg.gob.ve - Twitter: SudeasegOficial</small>
</footer>


    <p class=""></p>
    



</div>
