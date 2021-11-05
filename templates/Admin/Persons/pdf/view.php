<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary $beneficiary
 */

$fechaActual = date('d/m/Y');
?>
<?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:70px;']);?>


<h2 class="text-center font-weight-bold">CARNET ATENCIÓN PRIMARIA DE SALUD </h2>




<div class="card rounded" style="max-width: 520px; border:dashed;">
<div class="row no-gutters">


    <div class="col-md-8">
     <?= $this->Html->image('fondo.jpeg', ['fullBase' => true, 'style' => 'height:252px; margin-top:2px;']);?>
      <div class="card-body card-img-overlay">
         <h3 class="text-center font-weight-bold ">ATENCIÓN PRIMARIA DE SALUD</h3><br>
     <h6 class="card-title text-center font-weight-bold"> AFILIADO </h6>

        <p class="card-text text-dark  h50 font-weight-bold"style="margin-top: -15px;" >Nombre: <?= h($person->nombre)?> <?= h($person->apellido) ?></p>

        <p class="card-text text-dark  h50 font-weight-bold"style="margin-top: -15px;" >Cedula: V- <?= h($person->cedula) ?> </p>
        <p class="card-text text-dark  h50 font-weight-bold"style="margin-top: -15px;" > Oficina: <?= h($person->department->descripcion) ?> </p>

        <p class="card-text text-dark  h50 font-weight-bold"style="margin-top: -15px;" >Correo Electronico: <?= h($person->email) ?></p>
        <p class="card-text"><small class="text-muted font-weight-bold"style="margin-top: -20px;" >Fecha de emisión: <?= h($fechaActual) ?></small></p>
      </div>

    </div>
  </div>
 </div>


 <?php if (!empty($person->beneficiary)) : ?>
    <div class="card rounded" style="max-width: 520px;  border:dashed; margin-left:32.8rem; margin-top:-16.3rem;">
    <div class="row no-gutters">
    <div class="col-md-8">
    <?= $this->Html->image('fondo.jpeg', ['fullBase' => true, 'style' => 'height:252px; margin-top:2px;']);?>
    <div class="card-body card-img-overlay">
    <h6 class="card-title text-center font-weight-bolder"> DATOS DE LOS BENEFICIARIOS </h6>
    <table class="mx-auto">
  <thead>
    <tr>
      <th class="h50 font-weight-bolder text-uppercase"  style=" width: 50%; ">Nombre</th>
      <th class="h50 font-weight-bolder text-uppercase"  style="width: 50%;  ">Apellido</th>
     <!--  <th class="h50 font-weight-bolder text-uppercase"style=" width: 50%; ">Cedula</th> -->
      <th class="h50 font-weight-bolder text-uppercase"style=" width: 50%; ">Parentesco</th>

    </tr>


  </thead>


 <?php foreach ($person->beneficiary as $beneficiary) : ?>


  <tbody>
    <tr>
        <td class="h50 font-weight-bolder" style="width:30%;"><?= $beneficiary->nombre ?> </td>
        <td class="h50 font-weight-bolder" style=" width: 30%;"><?=$beneficiary->apellido ?></td>
        <!-- <td class="h50 font-weight-bolder" style="width: 30%; ">V-<//?= $beneficiary->cedula ?></td> -->
        <td class="h50 font-weight-bolder" style="width: 30%; "><?= $beneficiary->kin->descripcion ?></td>

    </tr>

  </tbody>


<?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
  </div>

<?php else:  ?>
  <div class="card rounded" style="max-width: 520px;  border:dashed; margin-left:32.8rem; margin-top:-16.3rem;">
    <div class="row no-gutters">
    <div class="col-md-8">
    <?= $this->Html->image('fondo.jpeg', ['fullBase' => true, 'style' => 'height:252px; margin-top:2px;']);?>
    <div class="card-body card-img-overlay">
    <h6 class="card-title text-center font-weight-bolder">  </h6>
    <table class="mx-auto">
  <thead>
    <tr>
      <p class="h5 font-weight-bolder text-uppercase text-center"  style="margin-top:40px;">ESTE TITULAR NO POSEE BENEFICIARIOS</p>
    </tr>
    <?= $this->Html->image('logo.png', ['fullBase' => true, 'style' => 'height:70px; margin-left:120px;']);?>

  </thead>


  <tbody>


  </tbody>

         </div>
      </div>
    </div>
</div>





<?php endif; ?>

    </div>
