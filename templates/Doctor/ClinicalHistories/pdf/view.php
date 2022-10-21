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
<?= $this->Html->image('marca_de_agua_informe.png', ['fullBase' => true, 'style' => 'position:absolute; left: 0px; top: -760px; z-index: -1; margin-left:-300px;']);?>
<div class="card">

<div class="card-body rounded" style="border:solid; height:90rem; width:62rem; position:fixed;">
    

    <div class="">

    <?= $this->Html->image('cintillo.png', ['fullBase' => true, 'style' => 'height:88px; width:985px; position:relative; margin-top:-20px; margin-left:-20px;']);?>

    </div>
              <p class="font-weight-bold text-right"> Fecha: <?= $fechaActual ?> </p>
        <br>
      <h3 class="text-uppercase font-weight-bold text-center card-title" style="margin-top: -45px;">INFORME MÉDICO</h3>
        <br><br>
        <!-- < ?php //foreach($clinicalHistory->doctor as $doctores) : ?> -->
        <?php if (!empty($clinicalHistory->doctor)) : ?>
            <!-- < ?php debug($doctores->specialty->descripcion); ?> -->
        
      <h5 class="text-uppercase font-weight-bold text-center card-title" style="margin-top: -45px;"><?= h($clinicalHistory->doctor->specialty->descripcion) ?></h5>
        <?php endif; ?>
        <!-- < ?php endforeach; ?> -->
    <hr class="bg-dark">
        <h4 class="font-weight-bold text-uppercase" style="width:600px;">Número de expediente: <?= ($clinicalHistory->person) ? 'T-000'. h($clinicalHistory->expediente) : 'B-000'. h($clinicalHistory->expediente) ?> &nbsp;   </h4>

        <!-- <hr class="bg-dark"> -->
        <table style="width:500px;">

            <tr>
                <th><?= __('Paciente: ') ?></th>
                <?php if (!empty($clinicalHistory->person)) : ?>
                <td style="width:400px;"><?= h($clinicalHistory->person->nombre), ' ',  h($clinicalHistory->person->apellido) ?></td>

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
                <?php if(!empty($clinicalHistory->blood_type->descripcion)): ?>
                <td><?= h($clinicalHistory->blood_type->descripcion) ?></td>
                <?php else: ?>
                <td class="font-weight-bold">Desconocido</td>
                <?php endif; ?>
            </tr>
            <tr>
                <th><?= __('Doctor: ') ?></th>
                <td><?= h($clinicalHistory->doctor->nombre) ?> <?= h($clinicalHistory->doctor->apellido) ?></td>

            </tr>

        </table>
        <br>
        <hr class="bg-dark">

        <div class="related" style="border:none; height:50px;">
            <h5 class="text-uppercase font-weight-bold"><?= __('Diagnóstico') ?></h5>
            <?php if (!empty($clinicalHistory->diagnoses)) : ?>
            <div class="table-responsive">
                <table class="table-responsive">
                    <tr>

                        <th><?= __('') ?></th>

                    </tr>
                    <?php foreach ($clinicalHistory->diagnoses as $diagnoses) : ?>
                    <tr>

                        <td style="width:400px;"><li><?= h($diagnoses->descripcion) ?></li></td>


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
            <?php else: ?>
            <div class="table-responsive">
                <table class="table-responsive">
                    <tr>

                        <th><?= __('') ?></th>

                    </tr>
                    <tr>
                        <td class="text-uppercase"> El doctor aún no le da un diagnóstico a la historia. </td>
                    </tr>

                </table>
                </div>
            <?php endif; ?>

        </div>



            <table class="table-responsive-sm" style="width: 400px; height:250px; margin-left:34.8rem; margin-top:-280px;">
           <thead>
            <tr>
                <th>
                  <td class="text-uppercase font-weight-bold h5" style="width:500px;" colspan="2"> Resultados fisicos </td>
                </th>
            </tr>
            </thead>

            <tr>
                  <th><?= __('Peso:') ?></th>
                  <td style="width: 500px;"><?= h($clinicalHistory->peso) ?> kg</td>
            </tr>
            <tr>
                <th><?= __('Altura:') ?></th>
                <td style="width: -800px;"> <?= h($clinicalHistory->altura) ?> mts</td>
            </tr>
            <tr>
                <th><?= __('FR:') ?></th>
                <td style="width: -400px;"><?= h($clinicalHistory->fr) ?></td>
            </tr>
            <tr>
                <th><?= __('FC:') ?></th>
                <td style="width: -400px;"><?= h($clinicalHistory->fc) ?></td>
            </tr>
            <tr>
                <th><?= __('TA:') ?></th>
                <td style="width: -500px;"><?= h($clinicalHistory->ta) ?></td>

            </tr>

        </table>


<br>
        <div class=""  style="max-width: 520px; margin-left:38.8rem; margin-top: -3.0rem; border:none;">
            <h5 class="font-weight-bold text-uppercase" ><?= __('Antecedentes ') ?></h5>
            <?php if (!empty($clinicalHistory->medicals_antecedents)) : ?>
            <div class="table-responsive">
                <table class="table-responsive-sm">
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

            <?php else:  ?>
            <div class="table-responsive">
                <table>
                    <tr>

                        <th><?= __('') ?></th>

                    </tr>

                    <tr>
                        <td class="text-uppercase"> El paciente no posee antecedentes médicos. </td>
                    </tr>
                </table>
                </div>
            <?php endif; ?>
            </div>

<br><br>
<hr class="bg-dark">
<div class="related">
            <h5 class="text-uppercase font-weight-bold"><?= __('Hábitos') ?></h5>
            <?php if (!empty($clinicalHistory->habits)) : ?>
            <div class="table-responsive">
                <table>
                    <tr>

                        <th><?= __('') ?></th>

                    </tr>
                    <?php foreach ($clinicalHistory->habits as $habits) : ?>
                    <tr>


                        <td style="width:400px;"><?= h($habits->descripcion) ?></td>


                    </tr>
                    <?php endforeach; ?>
                    </table>
                    </div>
                    <?php else : ?>
                 <div class="table-responsive">
                      <table>
                    <tr>

                        <th><?= __('') ?></th>

                    </tr>
                        <tr>

                        <td style="width:400px;"> EL PACIENTE NO TIENE HÁBITOS.</td>
                        </tr>
                </table>
            </div>
            <?php endif; ?>

           <br>
                <hr class="bg-dark">

           <div class="mx-auto" style="margin-top:380px;">


                <table class="table-responsive" style="margin-left:220px;">
                    <thead >
                    <tr>

                            <th class="text-center"> Firma del medico:  </th>

                            <th class="text-center" style="margin-left:200px;"> Sello Humedo: </th>

                    </tr>






                    </thead>

                    <tbody >

                    <br><br><br><br>
                    <tr>

                            <td class="text-center" style="border: none;"> <?= $this->Html->image($clinicalHistory->doctor->firma, ['fullBase' => true, 'style' => 'height:160px; width:280px; margin-top:-37px;']); ?> </td>





                    <!-- <td class="text-center" style="border: none;"> < ?= $this->Html->image($clinicalHistory->doctor->sello, ['fullBase' => true, 'style' => 'height:105px; width:125px;']); ?> </td> -->

                    </tr>
                    </tbody>


                        <!-- <p class="text-center" style="max-widtposition:fixed;
                        <p class="font-weight-bold" style="margin-left: 38rem; margin-top:-11rem;"></p>





                         <p style="max-width: 520px; margin-left:35.8rem;"></p> -->


                </table>

            </div>
        </div>


</div>
</div>