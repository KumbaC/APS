<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory $laboratories
 */
?>
<!-- DataTables -->
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/fontawesome.css') ?>
<div class="laboratories index content">
    <!-- <?//= $this->Html->link(__('New Laboratory'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <br></br>
    <h3 class="text-uppercase font-weight-bold"><?= __('Examenes Paraclinicios') ?> <i class="fas fa-microscope"></i> </h3>
    <br><br>
    <div class="card bg-dark table-responsive">
        <table class="table table-bordered table-dark display responsive nowrap" id='laboratorio' style="border-radius: 15px 15px 15px 15px !important;">
            <thead class="thead thead-light">
                <tr>
                    <!-- <th><?//= h('ID') ?></th> -->
                    <th><?= h('Paciente') ?></th>
                    <th><?=h ('Doctor') ?> </th>
                    <th><?= h('Observaciones') ?></th>
                    <!-- <th><?//= h('Creado') ?></th>
                    <th><?//= h('Modificado') ?></th> -->
                    <th class="actions text-center"><?= __('Imprimir') ?></th>
                    <th class="actions text-center"><?= __('Editar') ?></th>
                    <th class="actions text-center"><?= __('Eliminar') ?></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($laboratories as $laboratory): ?>
                <tr>
                    <!-- <td><?//= $this->Number->format($laboratory->id) ?></td> -->


                   <?php if (empty($laboratory->clinical_history->person_id)): ?>
                    <td class="font-weight-bold"><?= h($laboratory->clinical_history->beneficiary->nombre), '  ',  h($laboratory->clinical_history->beneficiary->apellido) ?></td>
                    <?php elseif (empty($laboratory->clinical_history->beneficiary_id)): ?>
                    <td class="font-weight-bold"><?= h($laboratory->clinical_history->person->nombre), '  ', h($laboratory->clinical_history->person->apellido) ?></td>
                    <?php endif; ?>

                    <td class="font-weight-bold"><?= h($laboratory->clinical_history->doctor->nombre), ' ', h($laboratory->clinical_history->doctor->apellido) ?></td>
                    <td><?= ($laboratory->descripcion) ?></td>
                    <!-- <td><?//= h($laboratory->created) ?></td>
                    <td><?//= h($laboratory->modified) ?></td> -->
                    <td class="text-center">
                        <?= $this->Html->link(__(''), ['action' => 'view', $laboratory->id, '_ext' => 'pdf'],['class' => 'fas fa-print btn btn-warning text-center']) ?>


                    </td>
                    <td class="text-center">
                    <?= $this->Html->link(__(''), ['action' => 'edit', $laboratory->id], ['class' => 'fas fa-edit btn btn-warning text-center']) ?>
                    </td>
                    <td class="text-center">
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $laboratory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $laboratory->id), 'class' => 'fas fa-trash btn btn-warning eliminar text-center']) ?>
                    </td>
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

$('#laboratorio').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

$(".eliminar").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.eliminar', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar la solicitud de laboratorio?",
        text: "Una vez eliminada, no se podra recuperar.",
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
                    'La eliminación de la solicitud ha sido cancelada.',
                    'error'
                )

            }
        });
});

</script>
