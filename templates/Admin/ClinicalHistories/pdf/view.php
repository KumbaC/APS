<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClinicalHistory $clinicalHistory
 */
$fechaActual = date('d/m/Y');

?>

<!DOCTYPE html>

<div class="card">
    <div class="card-header mx-auto border border-dark rounded bg-white">


        <div class="img">

        <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:70px;', 'class' => 'card']);?>

        </div>
                  <p class="font-weight-bold text-right"> Fecha: <?= $fechaActual ?> </p>
          <h3 class="text-uppercase font-weight-bold text-center" style="margin-top: -45px;">HISTORIA CLINICA</h3>

        <hr class="bg-dark">
            <h4 class="font-weight-bold text-uppercase">Numero de expediente: <?= h($clinicalHistory->person->cedula ). '000000' ?> &nbsp;   </h4>

            <hr class="bg-dark">
            <table>

                <tr>
                    <th><?= __('Paciente: ') ?></th>
                    <?php if (!empty($clinicalHistory->person)) : ?>
                    <td><?= h($clinicalHistory->person->nombre), h($clinicalHistory->person->apellido) ?></td>

                    <?php else: ?>
                    <td><?= h($clinicalHistory->beneficiary->nombre), h($clinicalHistory->beneficiary->apellido) ?></td>
                    <?php endif; ?>

                </tr>

                <tr>
                    <th><?= __('Cedula: ') ?></th>
                    <?php if (!empty($clinicalHistory->person)) : ?>
                    <td>V- <?= h($clinicalHistory->person->cedula) ?></td>

                    <?php else: ?>
                    <td>V- <?= h($clinicalHistory->beneficiary->cedula) ?></td>
                    <?php endif; ?>

                </tr>

                <tr>
                    <?php if (!empty($clinicalHistory->person)) : ?>

                        <th><?= __('Genero: ') ?></th>
                        <td> <?= h($clinicalHistory->person->gender_id) ?></td>

                     <?php else: ?>

                        <th><?= __('Genero: ') ?></th>
                        <td> <?=  h($clinicalHistory->beneficiary->gender_id) ?></td>

                     <?php endif; ?>



                </tr>

                <tr>
                    <th><?= __('Grupo Sanguineo: ') ?></th>
                    <td><?= h($clinicalHistory->blood_type->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Doctor: ') ?></th>
                    <td> <?= h($clinicalHistory->doctor->nombre), h($clinicalHistory->doctor->apellido) ?></td>
                </tr>

            </table>
            <br>
            <hr class="bg-dark">

            <div class="related">
                <h5 class="text-uppercase font-weight-bold"><?= __('Diagnostico') ?></h5>
                <?php if (!empty($clinicalHistory->diagnoses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>

                            <th><?= __('') ?></th>

                        </tr>
                        <?php foreach ($clinicalHistory->diagnoses as $diagnoses) : ?>
                        <tr>

                            <td><?= h($diagnoses->descripcion) ?></td>


                        </tr>
                        <?php endforeach; ?>

                   <!--      <?php //else:  ?>
                                <tr>

                                <th><?= __('') ?></th>

                                </tr>


                                <td> h($clinicalHistory->type_of_diagnosis)</td> -->


                        <!-- <?php //elseif (empty($clinicalHistory->diagnoses || $clinicalHistory->type_of_diagnosis)):  ?>
                         <div class="table-responsive">
                            <table>
                                <tr>

                                <th><?= __('') ?></th>

                                </tr>

                                <tr>
                                <td class="text-uppercase font-weight-bold"> El doctor aún no le da un diagnostico a la historia. </td>
                                </tr> -->

                    </table>
                </div>
                <?php endif; ?>
            </div>



            <h5 class="text-uppercase font-weight-bold" style="max-width: 520px; margin-left:38.8rem; margin-top:-16.3rem;"> Resultados fisicos </h5>
                <table style="max-width: 520px; margin-left:38.8rem;">
                <tr>
                    <th><?= __('Peso') ?></th>
                    <td><?= h($clinicalHistory->peso) ?> kg</td>
                </tr>
                <tr>
                    <th><?= __('Altura') ?></th>
                    <td><?= h($clinicalHistory->altura) ?> mts</td>
                </tr>
                <tr>
                    <th><?= __('FR') ?></th>
                    <td><?= h($clinicalHistory->fr) ?></td>
                </tr>
                <tr>
                    <th><?= __('FC') ?></th>
                    <td><?= h($clinicalHistory->fc) ?></td>
                </tr>
                <tr>
                    <th><?= __('TA') ?></th>
                    <td><?= h($clinicalHistory->ta) ?></td>

                </tr>
            </table>
<br>
            <div class="related"  style="max-width: 520px; margin-left:38.8rem; margin-top: 0.4rem;">
                <h5 class="font-weight-bold text-uppercase" ><?= __('Antecedentes ') ?></h5>
                <?php if (!empty($clinicalHistory->medicals_antecedents)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>

                            <th><?= __('') ?></th>

                        </tr>
                        <?php foreach ($clinicalHistory->medicals_antecedents as $medicalsAntecedents) : ?>
                        <tr>

                            <td><?= h($medicalsAntecedents->descripcion) ?></td>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
<br><br>
<hr class="bg-dark">
<div class="related">
                <h5 class="text-uppercase font-weight-bold"><?= __('Habitos') ?></h5>
                <?php if (!empty($clinicalHistory->habits)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>

                            <th><?= __('') ?></th>

                        </tr>
                        <?php foreach ($clinicalHistory->habits as $habits) : ?>
                        <tr>

                            <td><?= h($habits->descripcion) ?></td>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
               </div>

               <br>
               <div class="table-responsive mx-auto">
               <table style="margin-left:18.8rem;">
                        <tr>

                            <th class="text-center"><?= __('Firma del medico: ') ?></th>

                        </tr>

                        <tr>

                            <td class="text-center">__________________________</td>

                        </tr>
                        </table>

                        <table style="max-width: 520px; margin-left:34.8rem; margin-top: -53px;">
                        <tr>

                        <th class="text-center"><?= __('Sello: ') ?></th>

                        </tr>

                        <tr>

                        <td class="text-center">__________________________</td>

                        </tr>

                        </table>
                </div>
            </div>


    </div>
</div>

