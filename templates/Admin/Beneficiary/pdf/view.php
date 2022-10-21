<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary $beneficiary
 */
?>







<div class="container">
<div class="card mb-3 rounded border border-dark" style="max-width: 540px;">
 <?= $this->Html->image('logo.png', ['fullBase' => true]);?>  <h1 style="margin-left: 25rem; margin-top: -60px;"></h1>
  <div class="row no-gutters">
    <div class="col-md-8">
      <div class="card-body">
     <h5 class="card-title text-center"> Titular: </h5>
        <p class="card-text text-dark font-weight-bold">Nombre: <?= $beneficiary->has('person') ? h($beneficiary->person->nombre) : '' ?></p>
        <p class="card-text text-dark font-weight-bold">Apellido: <?= $beneficiary->has('person') ? h($beneficiary->person->apellido) : '' ?></p>
        <p class="card-text text-dark font-weight-bold">Cedula: <?= $beneficiary->has('person') ? h($beneficiary->person->cedula) : '' ?></p>
        <p class="card-text text-dark font-weight-bold">Correo Electronico: <?= $beneficiary->has('person') ? h($beneficiary->person->email) : '' ?></p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
 </div>

<div class="card mb-3 rounded border border-dark" style="max-width: 540px;">
<?= $this->Html->image('carabobo(1).png', ['fullBase' => true]);?>  <h1 style="margin-left: 25rem; margin-top: -60px;"></h1>
  <div class="row no-gutters">
    <div class="col-md-8">
      <div class="card-body">
     <h5 class="card-title text-center"> Beneficiario: </h5>
     <h5 class="card-text text-dark font-weight-bold" style="margin-top: -60px; margin-left:60px;"><?=$beneficiary->kin->descripcion?></h5>
        <p class="card-text text-dark font-weight-bold" style="margin-top: -15px;">Nombre: <?= $beneficiary->nombre ?>  <?=$beneficiary->apellido?></p>
        <p class="card-text text-dark font-weight-bold" style="margin-top: -15px;">Cedula: <?= $beneficiary->cedula  ?></p>
        <p class="card-text text-dark font-weight-bold" style="margin-top: -15px;">Genero: <?= $beneficiary->genero ?></p>
        <p class="card-text text-dark font-weight-bold" style="margin-top: -15px;">Edad: <?= $beneficiary->edad  ?></p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>
</div>
