<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory $laboratories
 */
?>
<div class="row">

    <div class="column-responsive column-80" style="margin-left:40px; border:solid; width:60rem; height:42rem;">
     <?= $this->Html->image('cintillo.png', ['fullBase' => true, 'style' => 'height:65px; width:950px; position:fixed;']);?>
        <br><br>
        <div class="laboratories view content">
            <h3 class="font-weight-bold text-uppercase text-center"></h3> 
            <hr class="font-weight-bold" style="border:solid;">
            <table style="width:900px; border:none;">
                <thead><h5 class="font-weight-bold text-uppercase text-center">Examenes Paraclinicos</h5></thead>
                
                         
                <tr>
                    <th class="text-uppercase"><?= __('Paciente: ') ?></th>
                    <?php if (!empty($laboratories->clinical_history->person_id)): ?>
                        <td class="text-uppercase" style="width:1900px;"><?= h($laboratories->clinical_history->person->nombre), h($laboratories->clinical_history->person->apellido) ?></td>
                    <?php endif; ?>

                    <th class="text-uppercase"><?= __('Medico: ') ?></th>

                    <td class="text-uppercase" style="width:800px;">Dr. <?= h($laboratories->clinical_history->doctor->nombre) ?> <?= h($laboratories->clinical_history->doctor->apellido) ?></td>
                </tr>


                <tr>

                
                <th class="text-uppercase"><?= __('Cedula: ') ?></th>
                    <?php if (!empty($laboratories->clinical_history->person_id)): ?>
                       <td style="width:300px;">V-<?= h($laboratories->clinical_history->person->cedula) ?></td>
                    <?php endif; ?>


                    <th class="text-uppercase" style="width:600px;"><?= __('Telefono ') ?> <sup>(Medico)</sup> :</th>

                    <?php if (!empty($laboratories->clinical_history->doctor_id)): ?>

                     <td class="text-uppercase">+58<?= h($laboratories->clinical_history->doctor->telefono)?></td>

                    <?php else: ?>
                     <td class="font-weight-bold">NO DEFINIDO<!--< ?= h($laboratories->clinical_history->person->gender->descripcion) ?>--></td> 
                    <?php endif; ?>

                    


                </tr>

                <hr style="border:solid;">


            </table>

            

            <hr style="border:solid;">

        <table>

            <thead><h5 class="text-center font-weight-bold text-uppercase"><?= __('Indicaciones') ?></h5></thead>
           

            <tbody>
                <tr>
                    <td class="text-center" style="width:950px; position: fixed; font-size:14px;">
                            <?= ($laboratories->descripcion) ?>
                    </td>
                </tr>
            </tbody>
            
        </table>
        <!-- <hr class="font-weight-bold" style="border:solid;"> -->

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
            
          
            <table style="border:none; margin-left:200px; height:100px; position:fixed; margin-top:100px;" class="">
           
            <tr>
                
                <td><?= $this->Html->image($laboratories->clinical_history->doctor->firma, ['fullBase' => true, 'style' => 'height:250px; width:270px;']) ?></td>
                            
                <th class="font-weight-bold text-uppercase text-center">Requiere sello humedo institucional </th>
                
            </tr>
           </table>
            
            
            <div style="position:fixed; margin-top:300px;">    
            <hr class="bg-dark" style="border:solid; width: 950px; margin-right:60px;">        
               <ol style="font-size:13px; margin-top:-18px; margin-right:80px;" class='font-weight-bold text-center'>Av. Venezuela, Torre del Desarrollo, El Rosal, Municipio Chacao, Zona Metropolitana de Caracas, Venezuela, Código Postal 1060 Teléfono: 0212-9051611 – Sitio Web: www.sudeaseg.gob.ve - Twitter: @SudeasegOficial </ol>    
            </div>
                            
      
          </div>
    </div>
</div>
