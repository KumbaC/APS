<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quotes
 */
?>

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
              <th><?= h('Asunto') ?></th>
              
              <th><?= h('Especialidad') ?></th>
              <th><?= h('Doctor(a)') ?></th>
              <th><?= h('Fecha') ?></th>
              <th><?= h('Hora') ?></th>
<!--               <th>< ?= $this->Paginator->sort('created') ?></th>
              <th>< ?= $this->Paginator->sort('modified') ?></th> -->
              
              <th><?= h('Estatus') ?></th>
              <th class="actions"><?= __('Opciones') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($quotes as $quote): ?>
          <tr>
            <?php if(!empty($quote->person)): ?>
            <td><?= $quote->person->nombre, ' ', $quote->person->apellido ?></td>
            <?php else: ?>
            <td><?= $quote->beneficiary->nombre, ' ', $quote->beneficiary->apellido ?></td> 
            <?php endif; ?>
            <td><?= ($quote->asunto) ?></td>
            <td><?= h($quote->specialty->descripcion) ?></td>
            <td><?= h($quote->doctor->nombre), ' ', h($quote->doctor->apellido)?></td>
            <td><?= h($quote->fecha) ?></td>
            <td><?= h($quote->hora) ?></td>
            <!-- <td>< ?= h($quote->created) ?></td>
            <td>< ?= h($quote->modified) ?></td> -->
           
            
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
                             <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-success disabled']) ?>
                             <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-success']) ?>


                         <?php else: ?>
                            <td class="pagination text-center">
                             <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-success disabled']) ?>
                             <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-success']) ?>
                        <?php endif; ?>


                            <!-- < ?= $this->Html->link(__(''), ['action' => 'edit', $quote->id], ['class' => 'fas fa-edit btn btn-warning']) ?> -->


                        

                        </td>
                    <?php else: ?>
                <?php if ($quote->status_quote->descripcion == 'En espera'): ?>
                    <?php if (empty($quote->person->nombre)): ?>

                        <td class="pagination text-center">
                        <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-danger disabled']) ?>
                        <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning disabled']) ?>
                    <?php else: ?>
                        <td class="pagination text-center">
                       <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-danger disabled']) ?>
                       <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-danger disabled']) ?>
                    <?php endif; ?>

                <?php endif; ?>


                <?php if ($quote->status_quote->descripcion == 'En proceso'): ?>
                    <?php if (empty($quote->person->nombre)): ?>

                        <td class="pagination text-center">
                        <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-primary']) ?>
                        <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning disabled']) ?>
                    <?php else: ?>
                        <td class="pagination text-center">
                       <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-primary']) ?>
                       <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-primary disabled']) ?>
                    <?php endif; ?>

                <?php endif; ?>
              <?php endif; ?>





           <!--  <td class="actions">
              < ?= $this->Html->link(__('View'), ['action' => 'view', $quote->id], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              < ?= $this->Html->link(__('Edit'), ['action' => 'edit', $quote->id], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              < ?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quote->id], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $quote->id)]) ?>
            </td> -->
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
    "lengthMenu": [ [5, 10, 50, 100, -1], [5, 10, 25,  50, 100] ],
        scrollY:        "200px",
        scrollX:        false,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   true
        
});

</script>
