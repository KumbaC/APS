<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicalsAntecedent[]|\Cake\Collection\CollectionInterface $medicalsAntecedents
 */
?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/fontawesome.css') ?>
<div class="medicalsAntecedents index content">
    <?= $this->Html->link(__(''), ['action' => 'add'], ['class' => 'fas-lg fas fa-plus-circle btn btn-warning btn-lg float-right', 'style' => 'border-radius:40px;']) ?>
    <br>
    <h3 class="text-uppercase font-weight-bold"> <i class="fas fa-head-side-cough"></i> <?= __('Antecedentes Medicos') ?></h3>
    <div class="card bg-dark table-responsive">
        <table class="table table-dark table-bordered" style="border-radius: 15px 15px 15px 15px !important;" id="antecedentes">
            <thead class="thead thead-light">
                <tr>

                    <th class="font-weight-bold text-uppercase">Antecedentes</th>
                    <th class="text-center actions text-uppercase"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicalsAntecedents as $medicalsAntecedent): ?>
                <tr>

                    <td class="font-weight-bold"><?= h($medicalsAntecedent->descripcion) ?></td>
                    <td class="pagination text-center">

                        <?= $this->Html->link(__(''), ['action' => 'edit', $medicalsAntecedent->id], ['class' => 'fas fa-edit btn btn-warning']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $medicalsAntecedent->id], ['confirm' => __('¿Desea eliminar el antecedente {0}', $medicalsAntecedent->descripcion.'?'), 'class' => 'fas fa-trash btn btn-warning elimi_antecedente']) ?>
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
$(".elimi_antecedente").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_antecedente', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar este antecedente?",
        text: "Una vez eliminado, para volverlo a usar tendra que cargarlo de nuevo.",
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
                    'La eliminación del antecedente medico, ha sido cancelado.',
                    'error'
                )

            }
        });
});

$('#antecedentes').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },


    //'serverSide': true,
});



</script>
