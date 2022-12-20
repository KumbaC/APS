<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
     <?php
    $c_name = $this->request->getParam('controller');
    $a_name = $this->request->getParam('action');
    $clase = $this->request->getParam('class');
    $prefix = $this->request->getParam('prefix');


$session = $this->request->getSession();
$session = $this->request->getAttribute('session');

//$userName = $session->read('Auth.User.full_name');
?>
<li class="nav-item has-treeview menu-open">
  <a href="" class="nav-link active">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <?php if ($session->read('Auth.User.role_id') == 1):?>
    <p class="font-weight-bold">
      Panel de Administrador
      <i class="right fas fa-angle-left"></i>
    </p>
    <?php elseif ($session->read('Auth.User.role_id') == 2):?>
       <p class="font-weight-bold">
      Panel de Usuarios
      <i class="right fas fa-angle-left"></i>
     </p>
    <?php elseif ($session->read('Auth.User.role_id') == 3):?>

      <p class="font-weight-bold">
      Panel de Medicos
        <i class="right fas fa-angle-left"></i>
      </p>

     <?php elseif ($session->read('Auth.User.role_id') == 4):?>

      <p class="font-weight-bold">
       Apoyo Administrativo
        <i class="right fas fa-angle-left"></i>
      </p>

     <?php endif; ?>
  </a>


  <ul class="nav nav-treeview">
  <!-- < ?php if ($session->read('Auth.User.role_id') == 1 or $session->read('Auth.User.role_id') == 2):?> -->

    <!-- <li class=< ?= $c_name == 'Beneficiary' ? 'bg-danger' : 'nav-item' ?>> 
  <a href=< ?= $this->Url->build(['controller' => 'beneficiary', 'action' => 'index'])?> class='nav-link' >
  <i class="fas fa-users"></i>
    <p>
      Beneficiarios
    </p>
  </a> -->
  <!-- < ?php endif; ?> -->
  </li>
  <?php if ($session->read('Auth.User.role_id') == 1 or $session->read('Auth.User.role_id') == 2):?>
    
    <li class=<?= $c_name == 'Persons' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'persons', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-id-card-alt"></i>
  <p>
   Titulares

  </p>
</a>
<?php endif; ?>
</li>
<?php if ($session->read('Auth.User.role_id') == 2):?>
<li class=<?= $c_name == 'Quotes' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'quotes', 'action' => 'indexmi'])?> class='nav-link' >
<i class="fas fa-file-medical-alt"></i>
  <p>
   Mis consultas

  </p>
</a>
<?php endif; ?>
</li>



<?php if ($prefix == 'Admin'): ?>
  <?php if ($session->read('Auth.User.role_id') == 1):?>
<li class=<?= $c_name == 'Doctors' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'doctors', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-user-md"></i>
  <p>
   Doctores

  </p>
</a>

</li>

  <?php endif; ?>

  <?php if ($session->read('Auth.User.role_id') == 1):?>
<li class=<?= $c_name == 'UsersDoctors' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'UsersDoctors', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-users"></i>
  <p>
   Usuarios

  </p>
</a>

</li>

  <?php endif; ?>




<?php endif; ?>

</li>



<!-- PANEL MEDICO -->
<?php if ($prefix == 'doctor' || 'Doctor'): ?>
<?php if ($session->read('Auth.User.role_id') == 1 || $session->read('Auth.User.role_id') == 3):?>

<?php if ($session->read('Auth.User.role_id') == 1):?>
<li class="nav-item has-treeview menu-open">
  <a href="" class="nav-link active">
  <i class="nav-icon fas fa-stethoscope"></i>
    <p class="font-weight-bold">
    Panel de Medicos
      <i class="right fas fa-angle-left"></i>
    </p>

  </a>

  <ul class="nav nav-treeview">
  
  <li class=<?= $c_name == 'Quotes' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;"> 

<a href=<?= $this->Url->build(['controller' => 'quotes', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-laptop-medical"></i>
  <p>
      Consultas Medicas
  </p>
</a>

</li>

<li class=<?= $c_name == 'Prescriptions' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-file-medical-alt"></i>
  <p>
      Prescripciones Medicas
  </p>
</a>

</li>


<li class=<?= $c_name == 'ClinicalHistories' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'ClinicalHistories', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-file-medical"></i>
  <p>
     Informes Medicos
  </p>
</a>

</li>


<li class=<?= $c_name == 'Laboratories' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'Laboratories', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-microscope"></i>
  <p>
     Paraclinicos
  </p>
</a>

</li>


</li>  
</ul>
<?php elseif($session->read('Auth.User.role_id') == 3): ?>

<li class=<?= $c_name == 'Quotes' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'quotes', 'action' => 'index', 'prefix' => 'Doctor'])?> class='nav-link' >
<i class="fas fa-laptop-medical"></i>
  <p>
   Consultas Medicas

  </p>
</a>

</li>

<li class=<?= $c_name == 'Prescriptions' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'prescriptions', 'action' => 'index', 'prefix' => 'Doctor'])?> class='nav-link' >
<i class="fas fa-file-medical-alt"></i>
  <p>
      Prescripciones Medicas

  </p>
</a>

</li>


<li class=<?= $c_name == 'ClinicalHistories' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'ClinicalHistories', 'action' => 'index', 'prefix' => 'Doctor'])?> class='nav-link' >
<i class="fas fa-file-medical"></i>
  <p>
    Informes Medicos

  </p>
</a>

</li>


<li class=<?= $c_name == 'Laboratories' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'Laboratories', 'action' => 'index', 'prefix' => 'Doctor'])?> class='nav-link' >
<i class="fas fa-microscope"></i>
  <p>
    Paraclinicos

  </p>
</a>

</li>


</li>

<?php endif; ?>


<?php endif; ?>
<?php endif; ?>
<!-- PANEL MEDICO -->



<!-- PANEL DE APOYO -->

<?php if ($session->read('Auth.User.role_id') == 4):?>



  
<li class="nav-item has-treeview menu-open">
 




<ul class="nav nav-treeview">
  
  <li class=<?= $c_name == 'Quotes' ? 'bg-danger' : 'nav-item' ?>>

  <a href=<?= $this->Url->build(['controller' => 'quotes', 'action' => 'index', 'prefix' => 'Doctor'])?> class='nav-link' >
  <i class="fas fa-laptop-medical"></i>
    <p>
    Consultas Medicas
    </p>
  </a>

  

</li>


<?php endif; ?>

<!-- PANEL DE APOYO -->






<!-- PANEL DE OPCIONES -->
<?php if ($prefix == 'Admin'): ?>
  <?php if ($session->read('Auth.User.role_id') == 1):?>
<li class="nav-item has-treeview menu-open">
  <a href="" class="nav-link active">
    <i class="nav-icon fas fa-tools"></i>
    <p class="font-weight-bold">
    Panel de Opciones
      <i class="right fas fa-angle-left"></i>
    </p>

  </a>

  <ul class="nav nav-treeview">

  <li class=<?= $c_name == 'Specialties' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'Specialties', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-heartbeat"></i>
  <p>
     Especialidades

  </p>
 </a>

 </li>






  <li class=<?= $c_name == 'Diagnoses' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

  <a href=<?= $this->Url->build(['controller' => 'diagnoses', 'action' => 'index'])?> class='nav-link' >
  <i class="fas fa-diagnoses"></i>
    <p>
    Diagnosticos

    </p>
  </a>

  </li>


  <li class=<?= $c_name == 'Habits' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

  <a href=<?= $this->Url->build(['controller' => 'habits', 'action' => 'index'])?> class='nav-link' >
  <i class="fas fa-smoking"></i>
    <p>
        Habitos

    </p>
  </a>

  </li>

  <li class=<?= $c_name == 'MedicalsAntecedents' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'MedicalsAntecedents', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-head-side-cough"></i>
  <p>
      Antecedentes Medicos

  </p>
</a>

</li>


<li class=<?= $c_name == 'SurgicalsAntecedents' ? 'bg-danger' : 'nav-item' ?> style="border-radius: 8px;">

<a href=<?= $this->Url->build(['controller' => 'SurgicalsAntecedents', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-procedures"></i>
  <p>
      Antecedentes Quirurgicos

  </p>
</a>

</li>



</li>
<?php endif; ?>
<?php endif; ?>

<!-- PANEL DE OPCIONES -->