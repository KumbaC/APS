<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary[]|\Cake\Collection\CollectionInterface $beneficiary
 */
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');

//$userName = $session->read('Auth.User.full_name');
?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.css') ?>


<div class="beneficiary index content">
   <!--  <//?= $this->Html->link(__('Añadir Beneficiario'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-users"></i> <?= __('Beneficiarios') ?></h3>
    <br>


    <div class="card bg-dark table-responsive">
        <table class="table table-bordered table-dark display responsive nowrap" style="border-radius: 15px 15px 15px 15px !important;" id="beneficiario">
            <thead class="thead-light">
                <tr>

                    <th class="text-center font-weight-bold"><?= ('Titular') ?></th>
                    <th class="text-center font-weight-bold"><?= ('Nombre') ?></th>
                    <th class="text-center font-weight-bold"><?= ('Apellido') ?></th>
                    <th class="text-center font-weight-bold"><?= ('Parentesco') ?></th>
                    <th class="text-center font-weight-bold"><?= ('Cedula') ?></th>
                    <th class="text-center font-weight-bold"><?= ('Edad') ?></th>
                    <th class="text-center font-weight-bold"><?= ('Genero') ?></th>
                    <!-- <th class="text-center"><//?= $this->Paginator->sort('modified', 'Actualizado') ?></th> -->

                    <th class="text-center"><?= __('Añadir Consulta') ?></th>
                    <th class="actions text-center"><?= __('Editar') ?></th>
                    <th class="actions text-center"><?= __('Eliminar') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($beneficiary as $beneficiary): ?>
                <tr>


                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->person->nombre),  ' ',    h($beneficiary->person->apellido)?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->nombre) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->apellido) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->kin->descripcion) ?></td>
                    <td class="text-light text-center font-weight-bold">V-<?= h($beneficiary->cedula) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= $this->Number->format($beneficiary->edad) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->gender->descripcion) ?></td>
                   <!--  <td class="text-center"><//?= h($beneficiary->modified) ?></td> -->



                        <!-- <?php if ($session->read('Auth.User.role_id') == 1):?>
                        <//?= $this->Html->link(__(''), ['action' => 'view', $beneficiary->id], ['class' => 'fas fa-eye btn btn-warning']) ?>
                        <?php endif; ?> -->
                        <td class="text-center">
                        <?php if ($session->read('Auth.User.role_id') == 1):?>

                        <?= $this->Html->link(__('+'), ['controller' => 'quotes', 'action' => 'addb', $beneficiary->id],['class' => 'fas fa-file-medical btn btn-warning']) ?>

                        <?php endif; ?>
                        </td>
                        <td class="text-center">
                        <?php if ($session->read('Auth.User.role_id') == 1):?>

                        <?= $this->Html->link(__(''), ['action' => 'edit', $beneficiary->id], ['class' => 'fas fa-edit btn btn-warning']) ?>

                        <?php endif; ?>
                        </td>

                        <?php if ($session->read('Auth.User.role_id') == 1):?>
                            <td class="text-center">
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $beneficiary->id],['confirm' => __('¿Esta seguro que desea eliminar a {0} {1}?', $beneficiary->nombre, $beneficiary->apellido), 'class' => 'fas fa-trash-alt btn btn-warning elimi_beneficiario']) ?>
                            </td>
                        <?php endif; ?>



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
<?= $this->Html->script('CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.all.js') ?>
<script>
$(".elimi_beneficiario").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_beneficiario', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar al beneficiario?",
        text: "Una vez eliminado/a, no se podra recuperar a este beneficiario.",
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
                    'La eliminación del beneficiario ha sido cancelada.',
                    'error'
                )

            }
        });
});

$('#beneficiario').DataTable({
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
