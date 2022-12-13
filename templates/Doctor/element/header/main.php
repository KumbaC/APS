<?php 
 $c_name = $this->request->getParam('controller');
 $a_name = $this->request->getParam('action');
 $clase = $this->request->getParam('class');
 $prefix = $this->request->getParam('prefix');


$session = $this->request->getSession();
$session = $this->request->getAttribute('session');

?>

<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

    <?= $this->element('header/menu') ?>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
   <!--  < ?= $this->element('header/search-block') ?> -->

    <!-- Messages Dropdown Menu -->
   <!--  < ?= $this->element('header/messages') ?> -->

    <!-- Notifications Dropdown Menu -->
   <!--  < ?= $this->element('header/notifications') ?> -->

    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" data-tooltip="Expandir pantalla" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
    <?php if($prefix == 'doctor' || $prefix == 'Doctor'): ?>
    <li class="nav-item">
        <a class="nav-link"  href='<?php echo $this->Url->Build(['controller' => 'UsersDoctors', 'action' => 'logout', 'prefix' => 'doctor']) ?>' role="button" data-tooltip="Salir del sistema">
          <i class="fas fa-sign-out-alt"></i>
        </a>
    </li>
    <?php elseif($prefix == 'Admin'): ?>
        <li class="nav-item">
            <a class="nav-link" href='<?php  echo $this->Url->Build(['controller' => 'users', 'action' => 'logout']) ?>' role="button" data-tooltip="Salir del sistema">
             <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href='<?php echo $this->Url->Build(['controller' => 'users', 'action' => 'logout']) ?>' data-tooltip="Salir del sistema">
             <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    <?php endif; ?>
</ul>





















