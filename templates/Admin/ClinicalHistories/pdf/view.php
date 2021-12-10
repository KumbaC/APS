<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClinicalHistory $clinicalHistory
 */
$fechaActual = date('d/m/Y');

$session = $this->request->getSession();
$session = $this->request->getAttribute('session');

$doctor = $session->read('Auth.User.id');



?>

<!DOCTYPE html>

<div class="card">
    <div class="card-body rounded bg-white" style="border:solid;">


        <div class="">

        <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:70px;', 'class' => 'card']);?>

        </div>
                  <p class="font-weight-bold text-right"> Fecha: <?= $fechaActual ?> </p>
          <h3 class="text-uppercase font-weight-bold text-center card-title" style="margin-top: -45px;">HISTORIA CLINICA</h3>

        <hr class="bg-dark">
            <h4 class="font-weight-bold text-uppercase">Numero de expediente: <?= ($clinicalHistory->person) ? 'T-000'.$doctor .h($clinicalHistory->person->cedula) : 'B-000'.$doctor . h($clinicalHistory->beneficiary->cedula) ?> &nbsp;   </h4>

            <!-- <hr class="bg-dark"> -->
            <table style="width: 300px;">

                <tr>
                    <th><?= __('Paciente: ') ?></th>
                    <?php if (!empty($clinicalHistory->person)) : ?>
                    <td><?= h($clinicalHistory->person->nombre), ' ',  h($clinicalHistory->person->apellido) ?></td>

                    <?php else: ?>
                    <td><?= h($clinicalHistory->beneficiary->nombre), ' ',  h($clinicalHistory->beneficiary->apellido) ?></td>
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
                        <td> <?= h($clinicalHistory->person->gender->descripcion) ?></td>

                     <?php else: ?>

                        <th><?= __('Genero: ') ?></th>
                        <td> <?=  h($clinicalHistory->beneficiary->gender->descripcion) ?></td>

                     <?php endif; ?>



                </tr>

                <tr>
                    <th><?= __('Grupo Sanguineo: ') ?></th>
                    <td><?= h($clinicalHistory->blood_type->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Doctor: ') ?></th>
                    <td><?= h($clinicalHistory->doctor->nombre) ?> <?= h($clinicalHistory->doctor->apellido) ?></td>

                </tr>

            </table>
            <br>
            <hr class="bg-dark">

            <div class="related card" style="border:none; height:50px;">
                <h5 class="text-uppercase font-weight-bold"><?= __('Diagnostico') ?></h5>
                <?php if (!empty($clinicalHistory->diagnoses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>

                            <th><?= __('') ?></th>

                        </tr>
                        <?php foreach ($clinicalHistory->diagnoses as $diagnoses) : ?>
                        <tr>

                            <td><li><?= h($diagnoses->descripcion) ?></li></td>


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


            <div class="" style="max-width: 520px; height:250px; width:290px; border:none; margin-left:38.8rem; margin-top:-280px;">

                <table>
                <tr>
                    <th>
                      <h5 class="text-uppercase font-weight-bold"> Resultados fisicos </h5>
                    </th>
                </tr>


                <tr>
                    <th><?= __('Peso:') ?></th>
                    <td><?= h($clinicalHistory->peso) ?> kg</td>
                </tr>
                <tr>
                    <th><?= __('Altura:') ?></th>
                    <td> <?= h($clinicalHistory->altura) ?> mts</td>
                </tr>
                <tr>
                    <th><?= __('FR:') ?></th>
                    <td><?= h($clinicalHistory->fr) ?></td>
                </tr>
                <tr>
                    <th><?= __('FC:') ?></th>
                    <td><?= h($clinicalHistory->fc) ?></td>
                </tr>
                <tr>
                    <th><?= __('TA:') ?></th>
                    <td><?= h($clinicalHistory->ta) ?></td>

                </tr>
            </table>
            </div>

<br>
            <div class="card"  style="max-width: 520px; margin-left:38.8rem; margin-top: -3.0rem; border:none;">
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
               <div class="mx-auto" style="margin-top:240px; height:200px;">



                            <p class="font-weight-bold" style="margin-left: 14rem; margin-top:-200px;"><?= __('Firma del medico: ') ?></th>





                            <p class="text-center" style="max-width: 520px; margin-left: 1rem; margin-top:-100px;"><?= $this->Html->image($clinicalHistory->doctor->firma, ['fullBase' => true, 'style' => 'height:115px; width:140px;']); ?></p>






                            <p class="font-weight-bold" style="margin-left: 38rem; margin-top:-11rem;"><?= __('Sello: ') ?></p>





                             <p style="max-width: 520px; margin-left:35.8rem;"><?= $this->Html->image($clinicalHistory->doctor->sello, ['fullBase' => true, 'style' => 'height:105px; width:125px;']); ?></p>




                </div>
            </div>


    </div>
</div>

