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
    

<!-- INFORME RADIOLOGIA -->
<?php if($clinical->specialty_id == 9): ?>

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
   
 <h5 class="text-uppercase font-weight-bold text-center card-title" style="margin-top: -45px;">ESTUDIOS ECOGRAFICOS  <!-- < ?= h($clinicalHistory->doctor->specialty->descripcion) ?> --></h5>
   <?php endif; ?>
   <!-- < ?php endforeach; ?> -->
<hr class="bg-dark">
   <h4 class="font-weight-bold text-uppercase" style="width:600px;">Número de expediente: <?= ($clinicalHistory->person) ? 'T-000'. h($clinicalHistory->id). h($clinicalHistory->person_id)  : 'B-000'. h($clinicalHistory->expediente) ?> &nbsp;   </h4>
<hr class="bg-dark">
   <!-- <hr class="bg-dark"> -->
   <table style="width:800px;">

       <tr>
           <th class="text-uppercase"><?= __('Paciente: ') ?></th>
           <?php if (!empty($clinicalHistory->person)) : ?>
           <td style="width:1800px;" class="text-uppercase"><?= h($clinicalHistory->person->nombre), ' ',  h($clinicalHistory->person->apellido) ?></td>

           <?php else: ?>
           <td style="width:1800px;" class="text-uppercase"><?= h($clinicalHistory->beneficiary->nombre), ' ',  h($clinicalHistory->beneficiary->apellido) ?></td>
           <?php endif; ?>


           <th class="text-uppercase"><?= __('Cedula: ') ?></th>
           <?php if (!empty($clinicalHistory->person)) : ?>
           <td style="width:200px;">V-<?= h($clinicalHistory->person->cedula) ?></td>

           <?php else: ?>
           <td style="width:200px;">V-<?= h($clinicalHistory->beneficiary->cedula) ?></td>
           <?php endif; ?>



       </tr>


       <tr>
           <?php if (!empty($clinicalHistory->person->gender->descripcion)) : ?>

               <th class="text-uppercase"><?= __('Genero: ') ?></th>
               <td> <?= h($clinicalHistory->person->gender->descripcion) ?></td>

            <?php else: ?>

               <th class="text-uppercase"><?= __('Genero: ') ?></th>
               <td class="font-weight-bold"> NO DEFINIDA<!-- <//?=  h($clinicalHistory->beneficiary->gender->descripcion) ?> --></td>

            <?php endif; ?>


            <th class="text-uppercase"><?= __('Tipo/sangre: ') ?></th>
           <?php if(!empty($clinicalHistory->blood_type->descripcion)): ?>
           <td style="width:400px;"><?= h($clinicalHistory->blood_type->descripcion) ?></td>
           <?php else: ?>
           <td class="font-weight-bold text-uppercase" style="width:400px;">Desconocido</td>
           <?php endif; ?>


       </tr>

       <tr>

           
       </tr>
       <tr>
           <th class="text-uppercase"><?= __('Doctor: ') ?></th>
           <td class="text-uppercase"><?= h($clinicalHistory->doctor->nombre) ?> <?= h($clinicalHistory->doctor->apellido) ?></td>


           <th class="text-uppercase"><?= __('Edad: ') ?></th>
           <?php if (!empty($clinicalHistory->person)) : ?>
           <td style="width:200px;"><?= h($clinicalHistory->person->edad) ?></td>

           <?php else: ?>
           <td style="width:200px;"><?= h($clinicalHistory->beneficiary->edad) ?></td>
           <?php endif; ?>


       </tr>

   </table>
   <hr class="bg-dark">
    
<table style="width: 900px; height:700px;">
    <thead>
           <h4 class="h3 text-uppercase font-weight-bold text-center">INDICADORES</h4> 
    </thead>
    <tr>
            <th class="text-uppercase" style="width:400px;">Observaciónes:</th>
            <td style="width: 1200px;" class="text-uppercase"><?= ($clinicalHistory->observations) ?></td>
    </tr>
          
    <tr>
            <th class="text-uppercase" style="width:400px;">Impresión Diagnostica:</th>
            <td style="width: 800px;" class="text-uppercase"><?= ($clinicalHistory->diagnostic_impression) ?></td>

    </tr>

    <tr>
            <th class="text-uppercase" style="width:400px;">Sugerencias:</th>
            <td style="" class="text-uppercase"><?= ($clinicalHistory->suggestions) ?></td>

    </tr>
</table>




<!-- FIRMA DEL MEDICO -->
<div class="mx-auto" style="margin-top:-10px; position:relatve;">


<table class="table-responsive" style="margin-left:220px; height:220px; width:600px;">
    <thead>
    <tr>
        <th class="text-center"> Firma del medico:  </th>
        <th class="text-center"> Sello humedo:  </th>
    </tr>
    </thead>
    <tbody>

          <td class="text-center" style="border: none;"> <?= $this->Html->image($clinicalHistory->doctor->firma, ['fullBase' => true, 'style' => 'height:270px; width:320px; margin-top:-95px;']); ?> </td>

    </tbody>



</table>

</div>

<!-- FIRMA DEL MEDICO -->

<!-- PIE DE PAGINA DEL INFORME -->
<div class="text-center" style="margin-top:100px;">

<p class="text-center font-weight-bold">Av. Venezuela, Torre del Desarrollo, El Rosal, Municipio Chacao, Zona Metropolitana de Caracas, Venezuela, Código Postal 1060 Teléfono: 0212-9051611 – Sitio Web: www.sudeaseg.gob.ve - Twitter: @SudeasegOficial </p>

</div>
<!-- PIE DE PAGINA DEL INFORME -->





    <!-- CIERRE INFORME RADIOLOGIA -->



<!-- INFORME ODONTOLOGIA -->
<?php elseif($clinical->specialty_id == 8): ?>

    <div class="">

<?= $this->Html->image('cintillo.png', ['fullBase' => true, 'style' => 'height:105px; width:990px; position:relative; margin-top:-20px; margin-left:-20px;']);?>
<hr class="bg-dark" style="color:black;">
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
   <h4 class="font-weight-bold text-uppercase" style="width:600px;">Número de expediente: <?= ($clinicalHistory->person) ? 'T-000'. h($clinicalHistory->id). h($clinicalHistory->person_id) : 'B-000'. h($clinicalHistory->expediente) ?> &nbsp;   </h4>

   <!-- <hr class="bg-dark"> -->
   <table style="width:850px;">

       <tr>
           <th class="text-uppercase"><?= __('Paciente: ') ?></th>
           <?php if (!empty($clinicalHistory->person)) : ?>
           <td style="width:400px;" class="text-uppercase"><?= h($clinicalHistory->person->nombre), ' ',  h($clinicalHistory->person->apellido) ?></td>

           <?php else: ?>
           <td class="text-uppercase"><?= h($clinicalHistory->beneficiary->nombre), ' ',  h($clinicalHistory->beneficiary->apellido) ?></td>
           <?php endif; ?>

           <th class="text-uppercase"><?= __('Odontologo(a): ') ?></th>
           <td class="text-uppercase"><?= h($clinicalHistory->doctor->nombre) ?> <?= h($clinicalHistory->doctor->apellido) ?></td>

       </tr>

       <tr>
           <th class="text-uppercase"><?= __('Cedula: ') ?></th>
           <?php if (!empty($clinicalHistory->person)) : ?>
           <td>V- <?= h($clinicalHistory->person->cedula) ?></td>

           <?php else: ?>
           <td>V- <?= h($clinicalHistory->beneficiary->cedula) ?></td>
           <?php endif; ?>

           <?php if (!empty($clinicalHistory->person)) : ?>

            <th class="text-uppercase"><?= __('Genero: ') ?></th>
            <td> <?= h($clinicalHistory->person->gender->descripcion) ?></td>

            <?php else: ?>

            <th class="text-uppercase"><?= __('Genero: ') ?></th>
            <td> <?=  h($clinicalHistory->beneficiary->gender->descripcion) ?></td>

            <?php endif; ?>

       </tr>


     

   </table>

<hr class="bg-dark">


<table style="width: 900px; height:700px;">
    <thead>
           <h4 class="h3 text-uppercase font-weight-bold text-center">INDICADORES</h4> 
    </thead>
    <tr>
            <th class="text-uppercase" style="width:400px;">Motivo de consulta:</th>
            <td style="width: 1200px;" class="text-uppercase"><?= ($clinicalHistory->reason_consultation) ?></td>
    </tr>
          
    <tr>
            <th class="text-uppercase" style="width:400px;">Diagnostico:</th>
            <td style="width: 800px;" class="text-uppercase"><?= ($clinicalHistory->dental_diagnosis) ?></td>

    </tr>

    <tr>
            <th class="text-uppercase" style="width:400px;">Plan de tratamiento:</th>
            <td style="" class="text-uppercase"><?= ($clinicalHistory->treatment_sequence) ?></td>

    </tr>
</table>




<!-- FIRMA DEL MEDICO -->
<div class="mx-auto" style="margin-top:2px; position:relative;">


<table class="table-responsive" style="margin-left:220px; height:220px; width:600px;">
    <thead>
    <tr>
        <th class="text-center"> Firma del medico:  </th>
        <th class="text-center"> Sello humedo:  </th>
    </tr>
    </thead>
    <tbody>

          <td class="text-center" style="border: none;"> <?= $this->Html->image($clinicalHistory->doctor->firma, ['fullBase' => true, 'style' => 'height:270px; width:320px; margin-top:-95px;']); ?> </td>

    </tbody>



</table>

</div>
<!-- CIERRE FIRMA DEL MEDICO -->


<!-- PIE DE PAGINA DEL INFORME -->
<div class="text-center">

<p class="text-center font-weight-bold">Av. Venezuela, Torre del Desarrollo, El Rosal, Municipio Chacao, Zona Metropolitana de Caracas, Venezuela, Código Postal 1060 Teléfono: 0212-9051611 – Sitio Web: www.sudeaseg.gob.ve - Twitter: @SudeasegOficial </p>

</div>
<!-- PIE DE PAGINA DEL INFORME -->










<!-- CIERRE INFORME ODONTOLOGIA -->








<!-- INFORME MEDICO MEDICINA GENERAL -->
<?php else: ?>

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
   <h4 class="font-weight-bold text-uppercase" style="width:600px;">Número de expediente: <?= ($clinicalHistory->person) ? 'T-000'. h($clinicalHistory->id). h($clinicalHistory->person_id) : 'B-000'. h($clinicalHistory->expediente) ?> &nbsp;   </h4>

   <!-- <hr class="bg-dark"> -->
   <table style="width:500px;">

       <tr>
           <th class="text-uppercase"><?= __('Paciente: ') ?></th>
           <?php if (!empty($clinicalHistory->person)) : ?>
           <td style="width:400px;" class="text-uppercase"><?= h($clinicalHistory->person->nombre), ' ',  h($clinicalHistory->person->apellido) ?></td>

           <?php else: ?>
           <td class="text-uppercase"><?= h($clinicalHistory->beneficiary->nombre), ' ',  h($clinicalHistory->beneficiary->apellido) ?></td>
           <?php endif; ?>

       </tr>

       <tr>
           <th class="text-uppercase"><?= __('Cedula: ') ?></th>
           <?php if (!empty($clinicalHistory->person)) : ?>
           <td>V- <?= h($clinicalHistory->person->cedula) ?></td>

           <?php else: ?>
           <td>V- <?= h($clinicalHistory->beneficiary->cedula) ?></td>
           <?php endif; ?>

       </tr>

       <tr>
           <?php if (!empty($clinicalHistory->person->gender->descripcion)) : ?>

               <th class="text-uppercase"><?= __('Genero: ') ?></th>
               <td> <?= h($clinicalHistory->person->gender->descripcion) ?></td>

            <?php else: ?>

               <th class="text-uppercase"><?= __('Genero: ') ?></th>
               <td class="text-uppercase font-weight-bold"> NO DEFINIDO<!-- < ?=  h($clinicalHistory->beneficiary->gender->descripcion) ?> --></td>

            <?php endif; ?>



       </tr>

       <tr>

           <th class="text-uppercase"><?= __('Tipo/sangre: ') ?></th>
           <?php if(!empty($clinicalHistory->blood_type->descripcion)): ?>
           <td><?= h($clinicalHistory->blood_type->descripcion) ?></td>
           <?php else: ?>
           <td class="font-weight-bold text-uppercase">Desconocido</td>
           <?php endif; ?>
       </tr>
       <tr>
           <th class="text-uppercase"><?= __('Doctor: ') ?></th>
           <td class="text-uppercase"><?= h($clinicalHistory->doctor->nombre) ?> <?= h($clinicalHistory->doctor->apellido) ?></td>

       </tr>

   </table>
   
  

  
   <br>

   
       <table class="table-responsive-sm" style="width: 380px; height:210px; margin-left:34.8rem; margin-top:-200px; position:fixed;">
      <thead>
     
       <tr>
           <th>
             <td class="text-uppercase font-weight-bold h5" style="width:1200px;" colspan="3"> Resultados fisicos </td>
           </th>
           
       </tr>
       </thead>

       <tr>
             <th class="text-uppercase"><?= __('Peso:') ?></th>
             <td style="width: 500px;"><?= h($clinicalHistory->peso) ?> kg</td>
             
             <th> <?= __('IMC:') ?> </th>
             <td style="width:40px;"><?= h($clinicalHistory->imc) ?></td>
              
           
       </tr>
       <tr>
           <th class="text-uppercase"><?= __('Altura:') ?></th>
           <td style="width: -800px;"> <?= h($clinicalHistory->altura) ?> mts</td>

             <th> <?= __('CMS:') ?> </th>
             <td style="width:40px;"><?= h($clinicalHistory->cms) ?></td>
       </tr>
       <tr>
           <th class="text-uppercase"><?= __('FR:') ?></th>
           <td style="width: -400px;"><?= h($clinicalHistory->fr) ?></td>
       </tr>
       <tr>
           <th class="text-uppercase"><?= __('FC:') ?></th>
           <td style="width: -400px;"><?= h($clinicalHistory->fc) ?></td>
       </tr>
       <tr>
           <th class="text-uppercase"><?= __('TA:') ?></th>
           <td style="width: -500px;"><?= h($clinicalHistory->ta) ?></td>

       </tr>

       <tr>
           <th class="text-uppercase"><?= __('TP:') ?></th>
           <td style="width: -500px;"><?= h($clinicalHistory->tp) ?></td>

       </tr>

       
          

   

   </table>
   
 <hr class="bg-dark">
   

<!-- MOTIVO DE CONSULTA -->
   <div class="related" style="border:none; position: fixed;">
       
       
       <?php if (!empty($clinicalHistory->reason_consultation)) : ?>
      <div class="table-responsive">
          <table class="table-responsive-sm">
           <thead><h5 class="text-uppercase font-weight-bold"><?= __('Motivo de consulta') ?></h5></thead>
             
             <tbody> 
              <tr>
                  <td style="width:400px;"><?= ($clinicalHistory->reason_consultation) ?></td>
              </tr>
             </tbody>

          </table>
      </div>
      <?php else: ?>
      <div class="table-responsive">
          <table class="table-responsive-sm">
          <thead><h5 class="text-uppercase font-weight-bold"><?= __('Motivo de consulta') ?></h5></thead>

          <tbody>
              <tr>
                  <td class="text-uppercase"> El medico decidio no colocar motivo de la consulta. </td>
              </tr>
          </tbody>

          </table>
        </div>
      <?php endif; ?>

   </div>
<!-- CIERRE MOTIVO DE CONSULTA -->








<!-- PLAN DE TRABAJO -->
   <div style="max-width: 550px; margin-left:38.8rem; height:200px; border:none;">
       
       <?php if (!empty($clinicalHistory->workplan)) : ?>
       <div class="table-responsive">
           <table class="table-responsive-sm">
            <thead><h5 class="font-weight-bold text-uppercase text-center" ><?= __('Plan de trabajo') ?></h5></thead>
               <tr>

                   <th><?= __('') ?></th>

               </tr>
               
               <tr>

                   <td><?= ($clinicalHistory->workplan) ?></td>
                   
               </tr>
               
           </table>
       </div>

       <?php else:  ?>
       <div class="table-responsive">
           <table class="table-responsive-sm">
           <thead><h5 class="font-weight-bold text-uppercase" ><?= __('Plan de trabajo') ?></h5></thead>
               
            <tbody>
               <tr>
                   <td class="text-uppercase"> EL MEDICO NO AÑADIO UN PLAN DE TRABAJO. </td>
               </tr>
            </tbody>

            </table>
           </div>
       <?php endif; ?>
       </div>
<!-- CIERRE PLAN DE TRABAJO -->

<!-- LINE DE DIVISORA -->
<hr class="bg-dark">
<!-- LINE DE DIVISORA -->


<!-- HABITOS -->       
       <?php if (!empty($clinicalHistory->habits)) : ?>
       <div class="table-responsive" style="border:none; width:300px; position: fixed;">
           <table class="table-responsive-sm" style="border:none; width:300px;">
            <thead><h5 class="text-uppercase font-weight-bold"><?= __('Hábitos') ?></h5></thead>
               <tr>
                   <th><?= __('') ?></th>
               </tr>

               <?php foreach ($clinicalHistory->habits as $habits) : ?>
                
               <tr>
                   <td style="width:400px;"><li><?= h($habits->descripcion) ?></li></td>
                    
               </tr>
               
               <?php endforeach; ?>

               </table>
        </div>

               <?php else : ?>
            <div class="table-responsive">
                 <table>
                 <thead><h5 class="text-uppercase font-weight-bold"><?= __('Hábitos') ?></h5></thead>

                 <tbody>
                   <tr>
                       <td style="width:400px;"> EL PACIENTE NO TIENE HÁBITOS.</td>
                   </tr>
                 </tbody>

                </table>
             </div>
       <?php endif; ?>
<!--  CIERRE HABITOS -->



<!-- ANTECEDENTES QUIRURGICOS -->
    <div style="max-width: 550px; margin-left:38.8rem; border:none;">
       
       <?php if (!empty($clinicalHistory->surgicals_antecedents)) : ?>
       <div class="table-responsive">
           <table class="table-responsive-sm">
           <thead><h5 class="text-uppercase font-weight-bold"><?= __('Antecedentes Quirurgicos') ?></h5></thead>
               
               <?php foreach ($clinicalHistory->surgicals_antecedents as $surgicalsAntecedents) : ?>
               <tbody>

                <tr>
                   <td style="width:400px;"><li><?= h($surgicalsAntecedents->descripcion) ?></li></td>
               </tr>

               </tbody>
               <?php endforeach; ?>

               </table>
        </div>
        <?php else : ?>
            <div class="table-responsive">
                 <table class="table-responsive-sm">
                 <thead><h5 class="text-uppercase font-weight-bold"><?= __('Antecedentes Quirurgicos') ?></h5></thead>
                 
                 <tbody> 
                    <tr>
                        <td style="width:400px;"> EL PACIENTE NO TIENE ANTECEDENTES QUIRURGICOS.</td>
                    </tr>
                 </tbody>

                 </table>
             </div>
        <?php endif; ?>
    </div>          
<!-- CIERRE ANTECEDENTES QUIRURGICOS -->

<br> <br> <br>
<hr class="bg-dark"> 
       
       
       <?php if (!empty($clinicalHistory->medicals_antecedents)) : ?>
       <div class="table-responsive" style="border:none; width:300px; position: fixed;">
           <table class="table-responsive-sm">
            <thead><h5 class="text-uppercase font-weight-bold"><?= __('Antecedentes Medicos') ?></h5></thead>
             
                <?php foreach ($clinicalHistory->medicals_antecedents as $medicalsAntecedents) : ?>
               
                <tr style="height:20px;">
                   <td style="width:400px;"><li><?= ($medicalsAntecedents->descripcion) ?></li></td>
                </tr>
            
                <?php endforeach; ?>

             </table>
        </div>
        <?php else : ?>
            <div class="table-responsive">
                 <table class="table-responsive-sm">
                 <thead><h5 class="text-uppercase font-weight-bold"><?= __('Antecedentes Medicos') ?></h5></thead>
              
                   <tr>
                     <td style="width:400px;"> EL PACIENTE ACOTO NO TENER ANTECEDENTES MEDICOS.</td>
                   </tr>

                 </table>
            </div>
       <?php endif; ?>
       <div class="row justify-content-end"  style="max-width:520px; margin-left:38.8rem; border:none;">
       
       
        <?php if (!empty($clinicalHistory->diagnoses)) : ?>
       <div class="table-responsive">
           <table class="table-responsive-sm">
            <thead><h5 class="text-uppercase font-weight-bold text-center"><?= __('Diagnosticos') ?></h5></thead>
               <tr>

                   <th><?= __('') ?></th>

               </tr>
              <!--  < ?php foreach ($clinicalHistory->surgicals_antecedents as $surgicalsAntecedents) : ?> -->
                <?php foreach ($clinicalHistory->diagnoses as $diagnoses) : ?>
               <tr>

                   <td style="width:500px;"><li><?= h($diagnoses->descripcion) ?></li></td>


               </tr>
               <?php endforeach; ?>
               <!-- < ?php endforeach; ?> -->
               </table>
               </div>
               <?php else : ?>
            <div class="table-responsive">
                 <table>
               <tr>

                   <th><?= __('') ?></th>

               </tr>
                   <tr>

                   <td style="width:400px;"> EL MEDICO NO ASIGNO UN DIAGNOSTICO AL PACIENTE</td>
                   </tr>
           </table>
       </div>
       <?php endif; ?>
   </div> 




      <br>
           <hr class="bg-dark">



       <!-- ENFERMEDAD ACTUAL -->
       <?php if (!empty($clinicalHistory->disease_current)) : ?>
       <div class="table-responsive" style="border:none; width:800px; position: fixed;">
           <table>
             <thead><h5 class="text-uppercase font-weight-bold"><?= __('Enfermedad Actual') ?></h5></thead>
              
              <tbody>

               <tr>
                   <td style="width:900px;"><?= ($clinicalHistory->disease_current) ?></td>
               </tr>

              </tbody>
            
            </table>
        </div>

        <?php else : ?>
        <div class="table-responsive">
            <table>
                 <thead><h5 class="text-uppercase font-weight-bold"><?= __('Enfermedad Actual') ?></h5></thead>
               <tbody>
                   <tr>
                      <td style="width:400px;"> EN ESTA OCASIÓN NO SE LLENO LA ENFERMEDAD ACTUAL</td>
                   </tr>
               </tbody>
            </table>
        </div>
       <?php endif; ?>
      <!-- CIERRE ENFERMEDAD ACTUAL -->





            <!-- FIRMA DE LOS MEDICOS -->
      <br><br><br><br><br><br>
      <div class="d-flex justify-content-center" style="max-width:520px; border:none; position: relative; margin-left:220px;">


           <table class="table-responsive-sm">
               <thead >
                <tr>
                    <th class="text-center">   </th>
                    <th class="text-center" style=" width:200px;"> Requiere sello humedo de la institución </th>
                </tr>
               </thead>

               <tbody>
                <tr>
                   <td class="text-center" style="border: none;"> <?= $this->Html->image($clinicalHistory->doctor->firma, ['fullBase' => true, 'style' => 'height:270px; width:320px; margin-top:-95px;']); ?> </td>
                </tr>
               </tbody>

            </table>

       </div>
   </div>
            <!-- CIERRE FIRMA DE LOS MEDICOS -->

<br>
<br>
</div>

<div class="text-center" style="margin-top:88rem;">


<p class="text-center font-weight-bold">Av. Venezuela, Torre del Desarrollo, El Rosal, Municipio Chacao, Zona Metropolitana de Caracas, Venezuela, Código Postal 1060 Teléfono: 0212-9051611 – Sitio Web: www.sudeaseg.gob.ve - Twitter: @SudeasegOficial </p>

</div>
 
<?php endif; ?>