<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quotes
 */
?>
<!-- TABLA DEL APOYO ADMINISTRATIVO -->
<?php if($this->request->getSession()->read('Auth.User.role_id') == 4): ?>

<?php $this->assign('title', __('Consultas') ); ?>


<!-- DataTables -->
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/fontawesome.css') ?>
<div class="quotes index content">

    
<h3 class="text-uppercase font-weight-bold"> <i class="fas fa-notes-medical"></i> <?= __('Citas Medicas') ?></h3>
<br>
  <!-- /.card-header -->
  <div class="card bg-dark table-responsive">
        <table class="table table-bordered table-dark display responsive nowrap" id="consulta" style="border-radius: 15px 15px 15px 15px !important;">
            <thead class="thead thead-light">
          <tr>
              <th><?= h('Paciente') ?></th>
              <th><?= h('Cedula') ?></th>
              <th><?= h('Telefono|Extension') ?></th>
              <th><?= h('Especialidad') ?></th>
              <th><?= h('Doctor(a)') ?></th>
              
              <th><?= h('Fecha de creación') ?></th>
              <th><?= h('Fecha Tentativa') ?></th>
              <th><?= h('Hora Tentativa') ?></th>
              <!-- <th>< ?= $this->Paginator->sort('modified') ?></th> -->
              
              <th><?= h('Estatus') ?></th>
              <th><?= __('Editar fecha') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($quotes as $quote): ?>
          <tr>
            <?php if(!empty($quote->person)): ?>
            <td><?= $quote->person->nombre, ' ', $quote->person->apellido ?></td>
           <!--  < ?php else: ?> -->
            <!-- <td>< ?= $quote->beneficiary->nombre, ' ', $quote->beneficiary->apellido ?></td> --> 
            <?php endif; ?>
            <td class="font-weight-bold"><?= ($quote->person->cedula) ?></td>
            <?php if(!empty($quote->person->phone)): ?>
            <td class="font-weight-bold"><?= ($quote->person->phone) ?></td>
            <?php else: ?>
            <td class="font-weight-bold">SIN TELEFONO CARGADO</td>
            <?php endif; ?>
            <td><?= h($quote->specialty->descripcion) ?></td>
            <td><?= h($quote->doctor->nombre), ' ', h($quote->doctor->apellido)?></td>
            <td><?= h($quote->created) ?></td>

            <td><?= h($quote->fecha) ?></td>
            <td><?= h($quote->hora) ?></td>
            
           <!--  <td>< ?= h($quote->modified) ?></td> -->
           
            
                <!-- BOTONES DE ESTATUS -->
                <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                        <td class="text-center"> <?= $this->Html->link(__('FINALIZADA'), ['action' => 'status', $quote->id], ['class' => 'badge badge-success'] )  ?> </td>

                    <?php elseif ($quote->status_quote->descripcion == 'En proceso'): ?>

                        <td class="text-center"> <?= $this->Html->link(__('EN PROCESO'), ['action' => 'status', $quote->id], ['class' => 'badge badge-primary'] )  ?> </td>
                    <?php else: ?>
                        <td class="text-center"> <?= $this->Html->link(__('EN ESPERA'), ['action' => 'status', $quote->id], ['class' => 'badge badge-danger'] )  ?> </td>
                    <?php endif; ?>
                <!-- BOTONES DE ESTATUS -->
                        

                <!-- BOTON DE CAMBIAR FECHA -->
                <td><?= $this->Html->link(__(''), ['action' => 'edit', $quote->id], ['class' => 'btn btn-warning fas fa-calendar text-center'] )  ?></td>
                <!-- BOTON DE CAMBIAR FECHA -->
           
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  
  </div>
 
</div>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables/jquery.dataTables.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>
<script>
$(".elimi_consulta").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_consulta', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar la consulta medica?",
        text: "Una vez eliminada, no se podra recuperar la consulta.",
        icon: "warning",
        confirmButtonText: 'Si, eliminar',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',

    }).then((result) => {
            if (result.value) {

                /* swal.fire(
                    '¡Eliminado!',
                    'El recipe ha sido eliminado.',
                    'success'
                ) */
                delete_form.submit();

            }else{

                    swal.fire(
                    'Cancelado',
                    'La eliminación de la consulta ha sido cancelada.',
                    'error'
                )

            }
        });
});

$('#consulta').DataTable({
    "language": {
       // "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ resultados",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ninguna información disponible en esta tabla",
      "sInfo": "Mostrando resultados _START_-_END_ de  _TOTAL_",
      "sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sSearch": "Buscar ",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Ultimo",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
  },
  "order": [[ 5, "asc" ]],
    "lengthMenu": [ [5, 10, 50, 100, -1], [5, 10, 25,  50, 100] ],
        scrollY:        "200px",
        scrollX:        false,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   true

        
});

</script>

<!-- FORMULARIO PARA DOCTORES -->
<?php elseif($this->request->getSession()->read('Auth.User.role_id') == 3): ?>
<!-- FORMULARIO PARA DOCTORES -->


<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quotes
 */
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');

?>
<!-- DataTables -->
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.css') ?>
<div class="quotes index content">
<br>
    <h3 class="text-uppercase font-weight-bold ml-2"><i class="fas fa-notes-medical"></i>  <?= __('Consultas') ?></h3>
    <br>

    <?= $this->Form->create(null,['type' => 'get']) ?>
  <!--   <div class="row">
        <div class="col-md-2">
        <?php //echo $this->Form->control('key', ['label' => '',  'placeholder' => 'Buscar' ]); ?>

        </div>
        <?//= $this->Form->submit(__('Buscar'), ['class' => 'btn btn-primary btn-md', 'style' => 'margin-top: 21px; margin-left: -12px;' ]) ?>
    </div> -->

    <?= $this->Form->end() ?>


    <div class="card bg-dark table-responsive">
        <table class="table table-bordered table-dark display responsive nowrap" id="consulta" style="border-radius: 15px 15px 15px 15px !important;">
            <thead class="thead thead-light">
                <tr>

                    <th class="text-center"><?= h('Asunto') ?></th>
                    <!-- <th class="text-center">< ?= h('Nota') ?></th> -->
                    <th class="text-center"><?= h('Paciente') ?></th>
                    <th class="text-center"><?= h('Especialidad') ?></th>
                    <th class="text-center"><?= h('Doctor') ?></th>
                    
                    <!-- <th class="text-center"><?//= h('Turno') ?></th> -->
                    <th class="text-center"><?= h('Fecha de creación') ?></th>
                    <th class="text-center"><?= h('Fecha tentativa') ?></th>
                    <th class="text-center"><?= h('Estatus') ?></th>



                    <th class="actions text-center"><?= __('Opciones') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($quotes as $quote): ?>
                <tr>

                    <td class="text-center font-weight-bold"><?= ($quote->asunto) ?></td>
                   <!-- <td class="text-center font-weight-bold">< ?= h($quote->nota) ?></td> -->

                    <?php if (empty($quote->person->nombre)): ?>
                    <td class="text-center font-weight-bold"><?= h($quote->beneficiary->nombre), ' ',   h($quote->beneficiary->apellido) ?></td>

                    <?php else: ?>
                    <td class="text-center font-weight-bold"><?=  h($quote->person->nombre), ' ',   h($quote->person->apellido) ?></td>

                    <?php endif; ?>

                    <td class="text-center font-weight-bold"><?= h($quote->specialty->descripcion) ?></td>
                    <td class="text-center font-weight-bold">Dr. <?= h($quote->doctor->nombre), '  ', h($quote->doctor->apellido)?></td>
                    
                    <td class="text-center font-weight-bold"><?= h($quote->created) ?></td>
                    <td class="text-center font-weight-bold"><?= h($quote->fecha) ?></td>

                   <!--  <td class="text-center font-weight-bold"><?//= h($quote->doctor->turn->descripcion) ?></td> -->


                    <!-- BOTONES DE ESTATUS -->
                    <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                        <td class="text-center"> <?= $this->Html->link(__('FINALIZADA'), ['action' => 'status', $quote->id], ['class' => 'badge badge-success'] )  ?> </td>

                    <?php elseif ($quote->status_quote->descripcion == 'En proceso'): ?>

                        <td class="text-center"> <?= $this->Html->link(__('EN PROCESO'), ['action' => 'status', $quote->id], ['class' => 'badge badge-primary'] )  ?> </td>
                    <?php else: ?>
                        <td class="text-center"> <?= $this->Html->link(__('EN ESPERA'), ['action' => 'status', $quote->id], ['class' => 'badge badge-danger'] )  ?> </td>
                    <?php endif; ?>

                        <!-- BENEFICIARIOS -->
                    <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                        <?php if (empty($quote->person->nombre)): ?>

                            <td class="pagination text-center">
                             <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-warning disabled']) ?>
                             <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning']) ?>


                         <?php else: ?>
                            <td class="pagination text-center">
                             <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'add', $quote->person->id, $quote->doctor->id, $quote->id], ['class' => 'fas fa-file-medical btn btn-warning disabled']) ?>
                             <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'add', $quote->person->id, $quote->doctor->id, $quote->id], ['class' => 'fas fa-file btn btn-warning']) ?>
                        <?php endif; ?>

                            <!-- EDITAR -->
                            <?= $this->Html->link(__(''), ['action' => 'edit', $quote->id], ['class' => 'fas fa-edit btn btn-warning']) ?>
                            <!-- EDITAR -->

                        <?php if ($session->read('Auth.User.role_id') == 1): ?>
                             <?= $this->Form->postLink(__(''), ['action' => 'delete', $quote->id], ['confirm' => __('¿Quiere eliminar la consulta medica?', $quote->id),  'class' => 'fas fa-trash-alt btn btn-warning elimi_consulta']) ?>
                        <?php endif; ?>

                        </td>
                    <?php else: ?>
                <?php if ($quote->status_quote->descripcion == 'En espera'): ?>
                    <?php if (empty($quote->person->nombre)): ?>

                        <td class="pagination text-center">
                        <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id, $quote->id], ['class' => 'fas fa-file-medical btn btn-warning disabled']) ?>
                        <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning disabled']) ?>
                    <?php else: ?>
                        <td class="pagination text-center">
                       <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'add', $quote->person->id, $quote->doctor->id, $quote->id], ['class' => 'fas fa-file-medical btn btn-warning disabled']) ?>
                       <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning disabled']) ?>
                    <?php endif; ?>

                <?php endif; ?>


                <?php if ($quote->status_quote->descripcion == 'En proceso'): ?>
                    <?php if (empty($quote->person->nombre)): ?>

                        <td class="pagination text-center">
                        <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-warning']) ?>
                        <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning disabled']) ?>
                    <?php else: ?>
                        <td class="pagination text-center">
                       <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'add', $quote->person->id, $quote->doctor->id, $quote->id], ['class' => 'fas fa-file-medical btn btn-warning']) ?>
                       <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'add', $quote->person->id, $quote->doctor->id, $quote->id, $quote->clinic_history_id], ['class' => 'fas fa-file btn btn-warning disabled']) ?>
                    <?php endif; ?>

                <?php endif; ?>


                       <!--  <//?= //$this->Html->link(__(''), ['action' => 'view', $quote->person->id], ['class' => 'fas fa-eye btn btn-warning']) ?> -->

                        <?= $this->Html->link(__(''), ['action' => 'edit', $quote->id], ['class' => 'fas fa-edit btn btn-warning']) ?>

                        <?php if ($session->read('Auth.User.role_id') == 1): ?>

                         <?= $this->Form->postLink(__(''), ['action' => 'delete', $quote->id], ['confirm' => __('¿Quiere eliminar la consulta medica?', $quote->id),  'class' => 'fas fa-trash-alt btn btn-warning elimi_consulta']) ?>

                        <?php endif; ?>

                        </td>

                    <?php endif; ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  <!--   <div class="paginator">
        <ul class="pagination">
            <?//= $this->Paginator->first('<< ' . __('first')) ?>
            <?//= $this->Paginator->prev('' . __('Anterior')) ?>
            <?//= $this->Paginator->numbers() ?>
            <?//= $this->Paginator->next(__('Siguiente') . '') ?>
            <?//= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div> -->
</div>

<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables/jquery.dataTables.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.all.js') ?>
<script>
$(".elimi_consulta").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_consulta', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar la consulta medica?",
        text: "Una vez eliminada, no se podra recuperar la consulta.",
        icon: "warning",
        confirmButtonText: 'Si, eliminar',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',

    }).then((result) => {
            if (result.value) {

                /* swal.fire(
                    '¡Eliminado!',
                    'El recipe ha sido eliminado.',
                    'success'
                ) */
                delete_form.submit();

            }else{

                    swal.fire(
                    'Cancelado',
                    'La eliminación de la consulta ha sido cancelada.',
                    'error'
                )

            }
        });
});

$('#consulta').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "lengthMenu": [ [5, 50, 100, -1], [5, 25,  50, 100] ],
    "order": [[ 4, "asc" ]],
        scrollY:        "200px",
        scrollX:        false,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   true
});

</script>

<?php endif; ?>