<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prescription[]|\Cake\Collection\CollectionInterface $prescriptions
 */
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');
 $this->assign('title', __(' ') );
?>
<!-- DataTables -->
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<div class="prescriptions index content">
<br>
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-file-medical-alt"></i> <?= __('Recipes Medicos') ?></h3>
    <br>



    <div class="card bg-dark table-responsive">
        <table class="table table-dark table-bordered" id="receta" style="border-radius: 15px 15px 15px 15px !important;">
            <thead class="thead thead-light">
                <tr>

                    <th class="text-center"><?= h('Paciente') ?></th>
                    <!-- <th class="text-center">< ?= h('Receta') ?></th> -->
                    <th class="text-center"><?= h('Doctor') ?></th>
                    <th class="text-center"><?= h('Fecha') ?></th>
                    <th class="actions text-center"><?= __('Imprimir') ?></th>
                    <th class="actions text-center"><?= __('Editar') ?></th>
                    <?php if ($session->read('Auth.User.role_id') == 1): ?>
                    <th class="actions text-center"><?= __('Eliminar') ?></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prescriptions as $prescription): ?>
                <tr>


                    <?php  if ($prescription->person_id != null): ?>
                        <td class="text-center font-weight-bold text-uppercase"><?= h($prescription->person->nombre) ?>  <?= h($prescription->person->apellido) ?></td>
                    <?php else: ?>
                        <td class="text-center font-weight-bold text-uppercase"><?= h($prescription->beneficiary->nombre) ?> <?= h($prescription->beneficiary->apellido) ?></td>
                    <?php endif; ?>

                    <!-- <td class="text-center font-weight-bold">< ?= ($prescription->descripcion) ?></td> -->

                    <td class="text-center font-weight-bold text-uppercase"><?= h($prescription->doctor->nombre) ?> <?= h($prescription->doctor->apellido) ?></td>

                    <td class="text-center font-weight-bold"><?= h($prescription->fecha) ?></td>
                    <td class="text-center font-weight-bold">
                        <?= $this->Html->link(__(''), ['action' => 'view', $prescription->id, '_ext' => 'pdf'], ['class' => 'far fa-file-pdf btn btn-warning']) ?>
                    </td>
                    <td class="text-center font-weight-bold"><?= $this->Html->link(__(''), ['action' => 'edit', $prescription->id], ['class' => 'far fa-edit btn btn-warning']) ?></td>

                    <?php if ($session->read('Auth.User.role_id') == 1): ?> <td class="text-center font-weight-bold">
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $prescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescription->id), 'class' => 'fas fa-trash-alt btn btn-warning elimi_recipe']) ?>

                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
 <!--    <div class="paginator">
        <ul class="pagination">
            <?//= $this->Paginator->first('<< ' . __('first')) ?>
            <?//= $this->Paginator->prev(' ' . __('Anterior')) ?>
            <?//= $this->Paginator->numbers() ?>
            <?//= $this->Paginator->next(__('Siguiente') . ' ') ?>
            <?//= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div> -->
</div>

<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables/jquery.dataTables.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>
<script>
$(".elimi_recipe").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_recipe', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar el recipe medico?",
        text: "Una vez eliminado, no se podra recuperar el recipe.",
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
                    'La eliminación del recipe ha sido cancelada.',
                    'error'
                )

            }
        });
});

 $('#receta').DataTable({
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
    'sort': {
        'column': '4',
        'language': 'Spanish',
        'iSortAscending': true,
        'iSortCol': 0,
        'iSortingCols': 1,
        'bSortable': true,
        'bSort': true,
    }
   
});
</script>

