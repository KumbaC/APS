<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory $laboratories
 */
?>
<div class="row">

    <div class="column-responsive column-80" style="margin-left:60px; border:solid; width:60rem; height:60rem;">
    <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:65px; position:relative;']);?>

        <div class="laboratories view content">
            <h3 class="font-weight-bold text-uppercase text-center">Examenes Paraclinicios <i class="fas fa-microscope"></i> </h3> 
            <hr class="font-weight-bold" style="border:solid;">
            <table>
                <tr>
                    <h5 class="font-weight-bold text-uppercase text-center">Información de la Historia Clinica</h5>

                    <th><?= __('Paciente: ') ?></th>
                    <?php if (empty($laboratories->clinical_history->person_id)): ?>
                    <td class="text-uppercase" style="width:800px;"><?= h($laboratories->clinical_history->beneficiary->nombre),  h($laboratories->clinical_history->beneficiary->apellido) ?></td>
                    <?php elseif (empty($laboratories->clinical_history->beneficiary_id)): ?>
                    <td class="text-uppercase" style="width:800px;"><?= h($laboratories->clinical_history->person->nombre), h($laboratories->clinical_history->person->apellido) ?></td>
                    <?php endif; ?>

                    <th><?= __('Cedula: ') ?></th>
                    <?php if (empty($laboratories->clinical_history->person_id)): ?>
                    <td style="width:300px;">V-<?= h($laboratories->clinical_history->beneficiary->cedula) ?></td>
                    <?php elseif (empty($laboratories->clinical_history->beneficiary_id)): ?>
                    <td style="width:300px;">V-<?= h($laboratories->clinical_history->person->cedula) ?></td>
                    <?php endif; ?>

                    <th style=''><?= __('Genero: ') ?></th>

                    <?php if (empty($laboratories->clinical_history->person_id)): ?>

                     <td><?= h($laboratories->clinical_history->beneficiary->gender->descripcion) ?></td>

                    <?php elseif (empty($laboratories->clinical_history->beneficiary_id)): ?>
                    <td><?= h($laboratories->clinical_history->person->gender->descripcion) ?></td>
                    <?php endif; ?>

                    <th style=''><?= __('Medico: ') ?></th>

                    <td>Dr. <?= h($laboratories->clinical_history->doctor->nombre) ?></td>

                    <td><?= h($laboratories->clinical_history->doctor->apellido) ?></td>


                </tr>

                <hr style="border:solid;">



                <p class="text-uppercase h5 font-weight-bold" style="margin-left:600px; margin-top:-595px;"><?= __('Observaciones') ?></p>

            <p style="margin-left:450px;"><?= ($laboratories->descripcion) ?></p>

            </table>

            

            <hr style="border:solid;">
            <div class="related">
                <h5 class="font-weight-bold text-uppercase"><?= __('Bioquimicas') ?></h5>
                <?php if (!empty($laboratories->biochemistry)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>



                        </tr>
                        <?php foreach ($laboratories->biochemistry as $biochemistry) : ?>
                        <tr>

                            <li style="margin-left:30px;"><?= h($biochemistry->descripcion) ?></li>


                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h5 class="font-weight-bold text-uppercase"><?= __('Hematologicas') ?></h5>
                <?php if (!empty($laboratories->hematologies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>

                        </tr>
                        <?php foreach ($laboratories->hematologies as $hematologies) : ?>
                        <tr>

                            <li style="margin-left:30px;"><?= h($hematologies->descripcion) ?></li>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h5 class="font-weight-bold text-uppercase"><?= __('Inmunológica') ?></h5>
                <?php if (!empty($laboratories->immunology)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>

                        </tr>
                        <?php foreach ($laboratories->immunology as $immunology) : ?>
                        <tr>

                            <li style="margin-left:30px;"><?= h($immunology->descripcion) ?></li>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h5 class="font-weight-bold text-uppercase"><?= __('Parasitologias') ?></h5>
                <?php if (!empty($laboratories->parasitologies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>

                        </tr>
                        <?php foreach ($laboratories->parasitologies as $parasitologies) : ?>
                        <tr>

                            <li style="margin-left:30px;"><?= h($parasitologies->descripcion) ?></li>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h5 class="font-weight-bold text-uppercase"><?= __('Especiales') ?></h5>
                <?php if (!empty($laboratories->specials)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>


                        </tr>
                        <?php foreach ($laboratories->specials as $specials) : ?>
                        <tr>

                            <li style="margin-left:30px;"><?= h($specials->descripcion) ?></li>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h5 class="font-weight-bold text-uppercase"><?= __('Análisis de Orina') ?></h5>
                <?php if (!empty($laboratories->urinalysis)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>

                        </tr>
                        <?php foreach ($laboratories->urinalysis as $urinalysis) : ?>
                        <tr>

                            <li style="margin-left:30px;"><?= h($urinalysis->descripcion) ?></li>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>


            <table>
            <!-- <th style=''><?//= __('Firma: ') ?></th> -->

            <td class="text-uppercase"><?= $this->Html->image($laboratories->clinical_history->doctor->firma, ['fullBase' => true, 'style' => 'margin-left:200px; margin-top:60px; height:110px; width:180px;']) ?></td>

            <td class="text-uppercase">Sello Humedo</td>
            </table>


            


                            <hr class="font-weight-bold" style="margin-top:32rem; border:solid;">
                    <p style="margin-left:80px; width:60.3rem;" class='font-weight-bold'>Torre del Desarrollo, Av. Venezuela Urb. El Rosal, Chacao-Caracas. Teléfonos: (0212) 905.16.11 / 905.16.50 </p>
        </div>
    </div>
</div>
