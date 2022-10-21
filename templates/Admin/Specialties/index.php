<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialty[]|\Cake\Collection\CollectionInterface $specialties
 */
?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/fontawesome.css') ?>

<div class="specialties index content">
    <?= $this->Html->link(__(''), ['action' => 'add'], ['class' => 'fas fa-plus button float-right btn btn-primary', 'style' => 'border-radius: 25px;']) ?>
    <h3 class="font-weight-bold text-uppercase"><?= __('Especialiades') ?></h3>
    <div class="card bg-dark table-responsive">
        <table class="table table-bordered table-dark display responsive nowrap"id="especialidad" style="border-radius: 15px 15px 15px 15px !important;">
            <thead class="thead thead-light">
                <tr>

                    <th><?= h('Especialidades') ?></th>
                    <!-- <th><?//= h('Creado') ?></th> -->
                    <!-- <th><?//= h('Modificado') ?></th> -->
                    <th class="actions"><?= __('Opciones') ?></th>
                    <!-- <th class="actions"><?//= __('Eliminar') ?></th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($specialties as $specialty): ?>
                <tr>

                    <td class="font-weight-bold"><?= h($specialty->descripcion) ?></td>
                    <!-- <td><?//= h($specialty->created) ?></td>
                    <td><?//= h($specialty->modified) ?></td> -->
                    <td class="pagination">
                        <!-- <?//= $this->Html->link(__(''), ['action' => 'view', $specialty->id], ['class' => 'fas fa-eye btn btn-warning']) ?> -->
                        <?= $this->Html->link(__(''), ['action' => 'edit', $specialty->id], ['class' => 'fas fa-edit btn btn-warning']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $specialty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialty->id), 'class' => 'eliminar_especialidad fas fa-trash btn btn-warning']) ?>
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
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>
<script>
    $('#especialidad').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

$(".eliminar_especialidad").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.eliminar_especialidad', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar la especialidad?",
        text: "Una vez eliminada, no se podra recuperar la especialidad.",
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
                    'La eliminación de la especialidad fue cancelada.',
                    'error'
                )

            }
        });
});


</script>

