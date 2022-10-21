<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Habit[]|\Cake\Collection\CollectionInterface $habits
 */
?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/fontawesome.css') ?>

<div class="habits index content">
    <?= $this->Html->link(__(''), ['action' => 'add'], ['class' => 'fas-lg fas fa-plus-circle btn btn-warning btn-lg float-right', 'style' => 'border-radius:40px;']) ?>
    <br>
    <h3 class="text-uppercase font-weight-bold"> <i class="fas fa-smoking"></i> <?= __('Habitos') ?></h3>
    <div class="card bg-dark table-responsive">
        <table class="table table-dark table-bordered" style="border-radius: 15px 15px 15px 15px !important;" id="habito">
            <thead class="thead thead-light">
                <tr>

                    <th class="text-uppercase font-weight-bold">Habitos</th>
                    <th class="text-center actions text-uppercase font-weight-bold"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($habits as $habit): ?>
                <tr>

                    <td class="font-weight-bold"><?= h($habit->descripcion) ?></td>
                    <td class="pagination text-center">

                        <?= $this->Html->link(__(''), ['action' => 'edit', $habit->id], ['class' => 'fas fa-edit btn btn-warning']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $habit->id], ['confirm' => __('¿Desea eliminar el habito de {0}?', $habit->descripcion), 'class' => 'fas fa-trash btn btn-warning elimi_habito']) ?>
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
$('#habito').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    'responsive': true,
    'autoWidth': false,
    'processing': true,

    //'serverSide': true,
});

$(".elimi_habito").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_habito', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar este habito?",
        text: "Una vez eliminado, no se podra recuperar este habito.",
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
                    'La eliminación del habito, ha sido cancelada.',
                    'error'
                )

            }
        });
});

</script>
