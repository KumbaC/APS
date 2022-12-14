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
    <?php if ($session->read('Auth.User.role_id') == 3):?>
    
      <p class="font-weight-bold">
      Panel de Medicos
        <i class="right fas fa-angle-left"></i>
      </p>

     <?php elseif ($session->read('Auth.User.role_id') == 4):?>

      <p class="font-weight-bold">
       Panel de Apoyo
        <i class="right fas fa-angle-left"></i>
      </p>

     <?php endif; ?>
  </a>


  <ul class="nav nav-treeview">



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
  
  <li class=<?= $c_name == 'Quotes' ? 'bg-danger' : 'nav-item' ?>>

<a href=<?= $this->Url->build(['controller' => 'quotes', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-laptop-medical"></i>
  <p>
      Consultas Medicas
  </p>
</a>

</li>

<li class=<?= $c_name == 'Prescriptions' ? 'bg-danger' : 'nav-item' ?>>

<a href=<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-file-medical-alt"></i>
  <p>
      Prescripciones Medicas
  </p>
</a>

</li>


<li class=<?= $c_name == 'ClinicalHistories' ? 'bg-danger' : 'nav-item' ?>>

<a href=<?= $this->Url->build(['controller' => 'ClinicalHistories', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-file-medical"></i>
  <p>
     Informes Medicos
  </p>
</a>

</li>


<li class=<?= $c_name == 'Laboratories' ? 'bg-danger' : 'nav-item' ?>>

<a href=<?= $this->Url->build(['controller' => 'Laboratories', 'action' => 'index'])?> class='nav-link' >
<i class="fas fa-microscope"></i>
  <p>
     Paraclinicos
  </p>
</a>

</li>


</li>  
</ul>
</li>
<?php elseif($session->read('Auth.User.role_id') == 3): ?>

<li class=<?= $c_name == 'Quotes' ? 'bg-danger' : 'nav-item' ?>>

<a href=<?= $this->Url->build(['controller' => 'quotes', 'action' => 'index', 'prefix' => 'Doctor'])?> class='nav-link' >
<i class="fas fa-laptop-medical"></i>
  <p>
   Consultas Medicas

  </p>
</a>

</li>

<li class=<?= $c_name == 'Prescriptions' ? 'bg-danger' : 'nav-item' ?>>

<a href=<?= $this->Url->build(['controller' => 'prescriptions', 'action' => 'index', 'prefix' => 'Doctor'])?> class='nav-link' >
<i class="fas fa-file-medical-alt"></i>
  <p>
      Prescripciones Medicas

  </p>
</a>

</li>


<li class=<?= $c_name == 'ClinicalHistories' ? 'bg-danger' : 'nav-item' ?>>

<a href=<?= $this->Url->build(['controller' => 'ClinicalHistories', 'action' => 'index', 'prefix' => 'Doctor'])?> class='nav-link' >
<i class="fas fa-file-medical"></i>
  <p>
    Informes Medicos

  </p>
</a>

</li>


<li class=<?= $c_name == 'Laboratories' ? 'bg-danger' : 'nav-item' ?>>

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

  <li class=<?= $c_name == 'Quotes' ? 'bg-warning' : 'nav-item' ?>>

  <a href=<?= $this->Url->build(['controller' => 'quotes', 'action' => 'index', 'prefix' => 'Doctor'])?> class='nav-link' >
  <i class="fas fa-notes-medical"></i>
    <p>
    Consultas Medicas
    </p>
  </a>

  

</li>


<li class=<?= $c_name == 'Persons' ? 'bg-warning' : 'nav-item' ?>>

<a href=<?= $this->Url->build(['controller' => 'persons', 'action' => 'index', 'prefix' => 'Doctor'])?> class='nav-link' >
<i class="fas fa-users-cog"></i>
  <p>
   Titulares

  </p>
</a>

</li>
</ul>


<?php endif; ?>

<!-- PANEL DE APOYO -->