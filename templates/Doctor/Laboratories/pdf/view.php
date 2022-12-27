<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription $prescription
 */
?>

<?= $this->Html->image('marca_de_agua_recipe.png', ['fullBase' => true, 'style' => 'position: absolute; left: 0px; top: 0px; z-index: -1; opacity:1; height:750px;']);?>

<div class="" style="width:32.7rem; height:47.5rem; border:solid;">
  <div class="">
    <aside class="">
         <?= $this->Html->image('cintillo.png', ['fullBase' => true, 'style' => 'height:50px; width:510px; margin-top:-2px; z-index: 0; opaciry: 0; position:relative;']);?>
    </aside>
    <br>
    <h6 class="text-center font-weight-bold">SERVICIO MÉDICO DE LA SUPERINTENDENCIA DE LA ACTIVIDAD ASEGURADORA </h6>

                    <hr class="bg-dark">
            <table class="table-responsive">
         <!-- CEDULA -->
                <tr>
                 <p class="font-weight-bold"><?= __('Cedula:') ?></p>
                    <?php if (!empty($laboratories->clinical_history->person)): ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;">V- <?= h($laboratories->clinical_history->person->cedula) ?></p>

                    <!-- < ?php else: ?> -->
                        <!-- <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;">V- < ?= h($prescription->beneficiary->cedula) ?></p> -->
                    <?php endif; ?>
                </tr>
            <!-- CEDULA -->

            <!--TITULAR O BENEFICIARIO  -->
                <tr>
                <p class="font-weight-bold"><?= __('Paciente:') ?></p>
                    <?php if (!empty($laboratories->clinical_history->person)): ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:90px;"><?= h($laboratories->clinical_history->person->nombre) ?> <?= h($laboratories->clinical_history->person->apellido) ?></p>

                    <!-- < ?php else: ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:90px;">< ?= h($prescription->beneficiary->nombre) ?> < ?= h($prescription->beneficiary->apellido) ?></p> -->
                    <?php endif; ?>
                </tr>
            <!--TITULAR O BENEFICIARIO  -->

            <!-- DOCTOR -->
                    <p class="font-weight-bold text-center" style="margin-top:-5rem;"><!-- < ?= __('Doctor:') ?> --></p>
                    <p class="text-right" style="margin-top:-2.5rem; margin-right:28px;"><!-- < ?= h($prescription->doctor->nombre), ' ',  h($prescription->doctor->apellido) ?> --></p>
            <!-- DOCTOR -->
<br>
            <!-- FECHA -->

                <p class="font-weight-bold text-center" style="margin-left:7em; margin-top:-1.5rem;"><?= __('Medico:') ?></p>
                <p class="text-right" style="margin-top:-40px; margin-left:22rem; width:150px;"><?= h($laboratories->clinical_history->doctor->nombre) ?> <?= h($laboratories->clinical_history->doctor->apellido) ?></p>
            <!-- FECHA -->

            </table>
            <hr class="bg-dark">
            <br>

            <div style=" height:23rem; border-radius:30px;">
            <br>
                    <div style="height:100px;">
                    <p class="font-weight-bold text-center text-uppercase h5"><?= __('Examenes Paraclinicos ') ?></p>
                    <hr class="bg-dark">
                    <div style="font-size:12px; width:500px;" class=""><?= ($laboratories->descripcion) ?></div>
                    </div>
                        
                            <br>
                                
                            <!-- FIRMA -->
                        <?= $this->Html->image($laboratories->clinical_history->doctor->firma, ['fullBase' => true, 'style' => 'margin-left:40px; height:170px; width:200px;  margin-top:5rem; background-attachment:fixed;']); ?>
                            <!-- FIRMA -->

                        <!-- < ?= $this->Html->image($prescription->doctor->sello, ['fullBase' => true, 'style' => 'height:120px; width:120px; margin-left:80px;  margin-top:4rem; background-attachment:fixed;']) ?> -->

                        </div>
                        
  </div>
  <br><br>
  <hr class="bg-dark">
  
  <footer>
        <small style="font-size:8px; margin-top:20px;" class="blockquote-footer font-weight-bold text-center">Av. Venezuela, Torre del Desarrollo, El Rosal, Municipio Chacao, Zona Metropolitana de Caracas, Venezuela, Código Postal 1060 Teléfono: 0212-9051611 – Sitio Web: www.sudeaseg.gob.ve - Twitter: SudeasegOficial</small>
</footer>
</div>



<!-- INDICACIONES -->

<div class="" style="width: 32.7rem; height:47.5rem; border:solid; margin-left:32.6em; margin-top:-48.5em;">
  <div class="">
    <aside class="">
        
        <?= $this->Html->image('cintillo.png', ['fullBase' => true, 'style' => 'height:50px; width:510px; position:relative; margin-top:-2px;']);?>

    </aside>
    <br>
    <h6 class="text-center font-weight-bold">SERVICIO MÉDICO DE LA SUPERINTENDENCIA DE LA ACTIVIDAD ASEGURADORA </h6>

                    <hr class="bg-dark">
            <table>
         <!-- CEDULA -->
         <tr>
                 <p class="font-weight-bold"><?= __('Cedula:') ?></p>
                    <?php if (!empty($laboratories->clinical_history->person)): ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;">V- <?= h($laboratories->clinical_history->person->cedula) ?></p>

                    <!-- < ?php else: ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:80px;">V-  < ?= h($prescription->beneficiary->cedula) ?></p> -->
                    <?php endif; ?>
                </tr>
            <!-- CEDULA -->

            <!--TITULAR O BENEFICIARIO  -->
                <tr>
                <p class="font-weight-bold"><?= __('Paciente:') ?></p>
                    <?php if (!empty($laboratories->clinical_history->person)): ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:90px;"><?= h($laboratories->clinical_history->person->nombre) ?> <?= h($laboratories->clinical_history->person->apellido) ?></p>

                    <!-- < ?php else: ?>
                        <p style="text-decoration-line: underline; margin-top:-40px; margin-left:90px;">< ?= h($prescription->beneficiary->nombre) ?> < ?= h($prescription->beneficiary->apellido) ?></p> -->
                    <?php endif; ?>
                </tr>
            <!--TITULAR O BENEFICIARIO  -->

            <!-- DOCTOR -->
                    <!-- <p class="font-weight-bold text-center" style="margin-top:-5rem;">< ?= __('Doctor:') ?></p>
                    <p class="text-right" style="margin-top:-2.5rem; margin-right:28px;">< ?= h($prescription->doctor->nombre), ' ',  h($prescription->doctor->apellido) ?></p> -->
            <!-- DOCTOR -->

            <!-- FECHA -->

                
                 <p class="font-weight-bold text-center" style="margin-left:5em; margin-top:-80px;"><?= __('Medico:') ?></p>
                
                 <p class="text-right" style="margin-left:12rem; margin-top:-40px; width:300px;"><?= h($laboratories->clinical_history->doctor->nombre), h($laboratories->clinical_history->doctor->apellido) ?></p>
            <!-- FECHA -->

            </table>
            
            <hr class="bg-dark">
            <br><br>
                <div style="height:23rem; border-radius:30px;">
                
                    <p class="font-weight-bold text-center text-uppercase h5"><?= __('Exámenes Ecográficos ') ?></p>
                    <hr class="bg-dark">
                    <div style="font-size:12px; width:500px;" class=""><?= ($laboratories->sonographic_exams)  ?></div>

                        <br>
                </div>

                             
                    <!-- <picture  class="h4 text-center" style="margin-left: 300px;">< ?= $this->Html->image($prescription->doctor->sello, ['fullBase' => true, 'style' => 'height:120px; width:120px; margin-top:-15rem;']) ?> </picture> -->


<!-- <p class="font-weight-bold text-uppercase" style="margin-left:30px;"><?//= __('Firma del medico: ') ?></p> -->
                    <picture  class="h4 text-center"> <?= $this->Html->image($laboratories->clinical_history->doctor->firma, ['fullBase' => true, 'style' => 'margin-left:50px; height:170px; width:200px; margin-top:-12rem;']); ?> </picture>
                    
  </div>
                        
  <hr class="bg-dark" style="margin-top:10px;">
                   <br>
<footer style="margin-top:-20px;">

        <small style="font-size:8px;" class="blockquote-footer font-weight-bold text-center">Av. Venezuela, Torre del Desarrollo, El Rosal, Municipio Chacao, Zona Metropolitana de Caracas, Venezuela, Código Postal 1060 Teléfono: 0212-9051611 – Sitio Web: www.sudeaseg.gob.ve - Twitter: SudeasegOficial</small>
</footer>


    
    



</div>























<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory $laboratories
 */
?>  

<div class="row">

    <div class="column-responsive column-80" style="margin-left:40px; border:solid; width:60rem; height:42rem;">
     < ?= $this->Html->image('cintillo.png', ['fullBase' => true, 'style' => 'height:65px; width:950px; position:fixed;']);?>
        <br><br>
        <div class="laboratories view content">
            <h3 class="font-weight-bold text-uppercase text-center"></h3> 
            <hr class="font-weight-bold" style="border:solid;">
            <table style="width:900px; border:none;">
                <thead><h5 class="font-weight-bold text-uppercase text-center">Examenes Paraclinicos</h5></thead>
                
                         
                <tr>
                    <th class="text-uppercase">< ?= __('Paciente: ') ?></th>
                    < ?php if (!empty($laboratories->clinical_history->person_id)): ?>
                        <td class="text-uppercase" style="width:1900px;">< ?= h($laboratories->clinical_history->person->nombre), h($laboratories->clinical_history->person->apellido) ?></td>
                    < ?php endif; ?>

                    <th class="text-uppercase">< ?= __('Medico: ') ?></th>

                    <td class="text-uppercase" style="width:800px;">Dr. < ?= h($laboratories->clinical_history->doctor->nombre) ?> <?= h($laboratories->clinical_history->doctor->apellido) ?></td>
                </tr>


                <tr>

                
                <th class="text-uppercase">< ?= __('Cedula: ') ?></th>
                    < ?php if (!empty($laboratories->clinical_history->person_id)): ?>
                       <td style="width:300px;">V-< ?= h($laboratories->clinical_history->person->cedula) ?></td>
                    < ?php endif; ?>


                    <th class="text-uppercase" style="width:600px;">< ?= __('Telefono ') ?> <sup>(Medico)</sup> :</th>

                    < ?php if (!empty($laboratories->clinical_history->doctor_id)): ?>

                     <td class="text-uppercase">+58< ?= h($laboratories->clinical_history->doctor->telefono)?></td>

                    < ?php else: ?>
                     <td class="font-weight-bold">NO DEFINIDO< ?= h($laboratories->clinical_history->person->gender->descripcion) ?></td> 
                    < ?php endif; ?>

                    


                </tr>

                <hr style="border:solid;">


            </table>

            

            <hr style="border:solid;">

        <table>

            <thead><h5 class="text-center font-weight-bold text-uppercase">< ?= __('Indicaciones') ?></h5></thead>
           

            <tbody>
                <tr>
                    <td class="text-center" style="width:950px; position: fixed; font-size:14px;">
                            < ?= ($laboratories->descripcion) ?>
                    </td>
                </tr>
            </tbody>
            
        </table>
        <hr class="font-weight-bold" style="border:solid;"> -->

            <!-- <div class="related">
                
                < ?php if (!empty($laboratories->biochemistry || $laboratories->hematologies)) : ?>
                <div class="table-responsive">
                    <table class="table table-responsive table-light" style="width:1020px;">
                        
                        <tr>

                            <th>< ?= __('Bioquimicas') ?></th>
                            < ?php foreach ($laboratories->biochemistry as $biochemistry) : ?>
                            <td><li>< ?= h($biochemistry->descripcion) ?>
                            <span class="badge badge-primary badge-pill">X</span>
                            </li></td>
                            < ?php endforeach; ?>
                            
                        
                            <th>< ?= __('Hematologicas') ?></th>
                            < ?php foreach ($laboratories->hematologies as $hematologies) : ?>
                            <td><li>< ?= h($hematologies->descripcion) ?>
                            <span class="badge badge-primary badge-pill">X</span>
                            </li></td>
                            < ?php endforeach; ?>
                        
                        </tr>
                        
                    </table>
                </div>
                < ?php elseif (empty($laboratories->biochemistry)) : ?>               
                    <div class="table-responsive">
                    <table class="table table-responsive table-light" style="width:1020px;">
                        
                        <tr>

                            <th>< ?= __('Hematologicas') ?></th>
                            < ?php foreach ($laboratories->hematologies as $hematologies) : ?>
                            <td><li>< ?= h($hematologies->descripcion) ?>
                            <span class="badge badge-primary badge-pill">X</span>
                            </li></td>
                            < ?php endforeach; ?>
                        
                        </tr>
                        
                    </table>
                </div>




                < ?php endif; ?>
            </div>



           
            <div class="related">
                
                < ?php if (!empty($laboratories->immunology || $laboratories->specials)) : ?>
                <div class="table-responsive">
                    <table class="table table-responsive table-light" style="width:1020px;">
                        
                        <tr>
                            <th>< ?= __('Inmunologicas') ?></th>
                            < ?php foreach ($laboratories->immunology as $immunology) : ?>
                            <td><li>< ?= h($immunology->descripcion) ?>
                            <span class="badge badge-primary badge-pill">X</span>
                            </li></td>
                            < ?php endforeach; ?>
                            
                            <th>< ?= __('Especiales') ?></th>
                            < ?php foreach ($laboratories->specials as $specials) : ?>
                            <td><li>< ?= h($specials->descripcion) ?>
                            <span class="badge badge-primary badge-pill">X</span>
                            </li></td>
                            < ?php endforeach; ?>
                        </tr>
                        
                    </table>
                </div>
                < ?php endif; ?>
            </div>



            <div class="related">
                
                < ?php if (!empty($laboratories->parasitologies || $laboratories->urinalysis)) : ?>
                <div class="table-responsive">
                    <table class="table table-responsive table-light" style="width:1020px; border:none;">
                    
                        <tr>
                        
                        
                        
                            <th>< ?= __('Parasitologicas') ?></th>
                            < ?php foreach ($laboratories->parasitologies as $parasitologies) : ?>
                            <td><li>< ?= h($parasitologies->descripcion) ?>
                            <span class="badge badge-primary badge-pill">X</span>
                            </li></td>
                            < ?php endforeach; ?>

                            
                            <th>< ?= __('Analisis de Orina') ?></th>                        
                            < ?php foreach ($laboratories->urinalysis as $urinalysis) : ?>
                            <td><li>< ?= h($urinalysis->descripcion) ?>
                            <span class="badge badge-primary badge-pill">X</span>
                            </li></td>
                            < ?php endforeach; ?>



                        </tr>
                        
                    </table>
                </div>
                < ?php endif; ?>
            </div> -->
            
          
          <!--   <table style="border:none; margin-left:200px; height:100px; position:fixed; margin-top:100px;" class="">
           
            <tr>
                
                <td>< ?= $this->Html->image($laboratories->clinical_history->doctor->firma, ['fullBase' => true, 'style' => 'height:250px; width:270px;']) ?></td>
                            
                <th class="font-weight-bold text-uppercase text-center">Requiere sello humedo institucional </th>
                
            </tr>
           </table>
            
            
            <div style="position:fixed; margin-top:300px;">    
            <hr class="bg-dark" style="border:solid; width: 950px; margin-right:60px;">        
               <ol style="font-size:13px; margin-top:-18px; margin-right:80px;" class='font-weight-bold text-center'>Av. Venezuela, Torre del Desarrollo, El Rosal, Municipio Chacao, Zona Metropolitana de Caracas, Venezuela, Código Postal 1060 Teléfono: 0212-9051611 – Sitio Web: www.sudeaseg.gob.ve - Twitter: @SudeasegOficial </ol>    
            </div>
                            
      
          </div>
    </div>
</div> -->
 