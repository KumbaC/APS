<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>

<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/fontawesome.css') ?>


    <h3 class="text-uppercase font-weight-bold"> <i class="fas fa-user-tie"></i> <?= __('Titulares') ?></h3>

<?= $this->Html->link((''), ['action' => 'add'], ['class' => 'btn btn-warning fas fa-user-plus float-right text-xl', 'style' => 'border-radius:10px;']) ?>
<?= $this->Form->create(null,['type' => 'get']) ?>

    <div class="card bg-dark table-responsive">
        <table class="table table-bordered table-dark display responsive nowrap" style="border-radius: 15px 15px 15px 15px !important;" id="titular">
            <thead class="thead-light">
                <tr>
                    <th><?= h('Cedula') ?></th>
                    <th><?= h('Titular') ?></th>
                    <!-- <th>< ?= h('Email') ?></th> -->
                    <!-- <th class="text-center">< ?= h('Telefono') ?></th> -->

                    <th><?= h('Departamentos') ?></th>


                    <th><?= __('Imprimir') ?></th>
                    <th><?= __('Beneficiario+') ?></th>
                    <th><?= __('Consulta+') ?></th>
                    <th><?= __('Editar') ?></th>
                    <th><?= __('Eliminar') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person): ?>
                <tr>

                    <td class="font-weight-bold">V-<?= h($person->cedula) ?></td>
                    <td class="font-weight-bold"><?= h($person->nombre),' ', h($person->apellido) ?></td>
                    

                    <td class="font-weight-bold"><?= $person->has('department') ? h($person->department->descripcion) : '' ?></td>



                    <td class="font-weight-bold text-center"> <?= $this->Html->link(__(''), ['action' => 'view', $person->id, '_ext' => 'pdf'], ['class' => 'fas fa-file-pdf btn btn-warning ']) ?></td>
                    <td class="font-weight-bold text-center"> <?= $this->Html->link(__('+'), ['controller' => 'beneficiary', 'action' => 'add', $person->id], ['class' => 'fas fa-user btn btn-warning']) ?> </td>
                    <td class="font-weight-bold text-center"><?= $this->Html->link(__('+'), ['controller' => 'quotes', 'action' => 'add', $person->id], ['class' => 'fas fa-file-medical btn btn-warning']) ?></td>
                    <td class="font-weight-bold text-center"><?= $this->Html->link(__(''), ['action' => 'edit', $person->id], ['class' => 'fas fa-edit btn btn-warning']) ?> </td>
                    <td class="font-weight-bold text-center"><?= $this->Form->postLink(__(''), ['action' => 'delete', $person->id],  ['confirm' => __('¿Esta seguro de borrar a {0} {1}?', $person->nombre, $person->apellido), 'class' => 'fas fa-trash-alt btn btn-warning elimi_persona']) ?></td>


                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



    <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables/jquery.dataTables.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>
<script>
$(".elimi_persona").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_persona', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar al titular?",
        text: "Una vez eliminado/a, no se podra recuperar a este titular.",
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
                    'La eliminación del titular ha sido cancelada.',
                    'error'
                )

            }
        });
});
$('#titular').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
        scrollY:        "200px",
        scrollX:        false,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   true
       
    
});

</script>
