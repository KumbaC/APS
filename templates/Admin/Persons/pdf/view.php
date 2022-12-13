<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */

  // Obteniendo la fecha actual del sistema con PHP
  $fechaActual = date('d/m/Y');


?>
<br><br><br><br><br><br><br>
<br><br><br>
<?= $this->Html->image('logo.png', ['fullBase' => true,'style' => 'margin-left: 30px; height:70px; margin-top:-400px;']);?>
<!-- ABRE |PARTE DELANTERA DEL CARNET AFILIADO| ABRE -->
<h2 class="font-weight-bold text-center" style="">CARNET ATENCIÓN PRIMARIA DE SALUD </h2>




<div class="card rounded" style="max-width: 520px; border:dashed; margin-left:15px; width:30rem; margin-top:-150px;">
<div class="row">


    <div class="col-md-8">
     <?= $this->Html->image('fondo.jpeg', ['fullBase' => true, 'style' => 'height:232px; margin-top:2px;']);?>
      <div class="card-body card-img-overlay">
         <h5 class="text-center font-weight-bold mx-auto">ATENCIÓN PRIMARIA DE SALUD</h5>
             <h6 class="card-title text-center font-weight-bold"> AFILIADO </h6><br>

        <p class="card-text text-dark  h50 font-weight-bold"style="margin-top: -15px;" >Nombre: <?= h($person->nombre)?> <?= h($person->apellido) ?></p>

        <p class="card-text text-dark  h50 font-weight-bold"style="margin-top: -15px;" >Cedula: V- <?= h($person->cedula) ?> </p>
        <?php if(!empty($person->email)): ?>
        <p class="card-text text-dark  h50 font-weight-bold"style="margin-top: -15px;" >Correo Electronico: <?= h($person->email) ?></p>
        <?php else:?>
          <p class="card-text text-dark  h50 font-weight-bold"style="margin-top: -15px;" >Correo Electronico: Sin correo electronico</p>
        <?php endif; ?>

        <?php if(!empty($person->department->descripcion)): ?>
        <p class="card-text h51 font-weight-bold"style="margin-top: -15px;" ><span class="badge badge-primary"><?= h($person->department->descripcion) ?> </span></p>
        <?php else:?>
          <p class="card-text h51 font-weight-bold"style="margin-top: -15px;" ><span class="badge badge-primary text-uppercase">Sin departamento asignado</span></p>
        <?php endif; ?>

        <p class="card-text text-center" style="margin-top: -2px;"><small class="font-weight-bold h51" >Fecha de emisión: <?= h($fechaActual) ?></small></p>
      </div>

    </div>
  </div>
 </div>
<!-- CIERRA |PARTE DELANTERA DEL CARNET AFILIADO| CIERRA -->


<!-- ABRE |SI PERSONA POSEE UN BENEFICIARIO MUESTRA ESTO| ABRE  -->
 <?php if (!empty($person->beneficiary)) : ?>
    <div class="card rounded" style="max-width: 520px;  border:dashed; margin-left:31.0rem; margin-top:-15.0rem; width:30rem;">
    <div class="row no-gutters">
    <div class="col-md-8">
    <?= $this->Html->image('fondo.jpeg', ['fullBase' => true, 'style' => 'height:232px; margin-top:2px;']);?>
    <div class="card-body card-img-overlay">
    <h6 class="card-title text-center font-weight-bolder"> DATOS DE LOS BENEFICIARIOS </h6>
    <table class="mx-auto">
  <thead>
    <tr>
      <th class="h50 font-weight-bolder text-uppercase"  style=" width: 50%; ">Nombre</th>
      <th class="h50 font-weight-bolder text-uppercase"  style="width: 50%;  ">Apellido</th>
      <th class="h50 font-weight-bolder text-uppercase"style=" width: 50%; ">Parentesco</th>
    </tr>
  </thead>
  <?php foreach ($person->beneficiary as $beneficiary) : ?>

  <tbody>
    <tr>
        <td class="h50 font-weight-bolder" style="width:30%;"><?= $beneficiary->nombre ?></td>
        <td class="h50 font-weight-bolder" style=" width: 30%;"><?=$beneficiary->apellido?></td>
        <td class="h50 font-weight-bolder" style="width: 30%; "><?= $beneficiary->kin->descripcion ?></td>
    </tr>

  </tbody>


<?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
  </div>
<!-- CIERRA|SI PERSONA POSEE UN BENEFICIARIO MUESTRA ESTO|CIERRA  -->


<!-- SI NO POSEE BENEFICIARIOS MUESTRA ESTA TARJETA -->
  <?php else:  ?>
  <div class="card rounded" style="max-width: 520px;  border:dashed; margin-left:31.0rem; margin-top:-15.0rem; width:30rem;">
    <div class="row no-gutters">
    <div class="col-md-8">
    <?= $this->Html->image('fondo.jpeg', ['fullBase' => true, 'style' => 'height:232px; margin-top:2px;']);?>
    <div class="card-body card-img-overlay">
    <h6 class="card-title text-center font-weight-bolder">  </h6>
    <table class="mx-auto">
  <thead>
    <tr>
      <p class="h5 font-weight-bolder text-uppercase text-center"  style="margin-top:40px;">ESTE TITULAR NO POSEE BENEFICIARIOS</p>
    </tr>
    <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:70px; margin-left:100px;']);?>

  </thead>


  <tbody>


  </tbody>

         </div>
      </div>
    </div>
</div>


<?php endif; ?>
    </div>
        <br><br>
   <!--  <p class="font-weight-bold text-center text-uppercase"  style="margin-left:-10rem;">Nota: Preferiblemente imprimir el carnet a color.</p> -->


