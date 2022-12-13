<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClinicalHistory[]|\Cake\Collection\CollectionInterface $clinicalHistories
 */
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');
?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins//datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.css') ?>
<div class="clinicalHistories index content">

    <br>

    <h3 class="font-weight-bold text-uppercase"> <i class="fas fa-book-medical"></i>  <?= __('Informe Medico') ?></h3>
    <br>


    <div class="card bg-dark table-responsive">
        <table class="table table-dark table-bordered" style="border-radius: 15px 15px 15px 15px !important;" id="informe">
            <thead class="thead thead-light">
                <tr>

                    <th class="text-center"><?= h('Paciente') ?></th>
                    <th class="text-center"><?= h('Tipo de sangre') ?></th>
                    <th class="text-center"><?= h('Doctor') ?></th>
                    <th class="actions text-center"><?= __('Imprimir') ?></th>
                    <th class="actions text-center"><?= __('Laboratorios') ?></th>
                    <th class="actions text-center"><?= __('Editar') ?></th>
                    <?php if ($session->read('Auth.User.role_id') == 1): ?>
                    <th class="actions text-center"><?= __('Eliminar') ?></th>
                    <?php endif; ?>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($clinicalHistories as $clinicalHistory): ?>
                <tr>

                    <?php if (empty($clinicalHistory->person->nombre)): ?>
                        <td class="text-center font-weight-bold"><?= $clinicalHistory->has('beneficiary') ? h($clinicalHistory->beneficiary->nombre .' '. $clinicalHistory->beneficiary->apellido) : '' ?></td>
                    <?php else: ?>
                    <td class="text-center font-weight-bold"><?= $clinicalHistory->has('person') ? h($clinicalHistory->person->nombre .'  '. ' '. $clinicalHistory->person->apellido) : '' ?></td>
                    <?php endif; ?>

                    <?php if (empty($clinicalHistory->blood_type->descripcion)): ?>
                        <td class="text-uppercase font-weight-bold text-center">Desconocido</td>
                    <?php else: ?>
                    <td class="text-uppercase font-weight-bold text-center"><?= $clinicalHistory->has('blood_type') ? h($clinicalHistory->blood_type->descripcion) : '' ?></td>
                    <?php endif; ?>

                    <td class="text-center font-weight-bold"><?= $clinicalHistory->has('doctor') ? h('Dr. '. ' ' . $clinicalHistory->doctor->nombre . ' '. $clinicalHistory->doctor->apellido ) : '' ?></td>
                    <td class="text-center font-weight-bold">
                        <?= $this->Html->link(__(''), ['action' => 'view', $clinicalHistory->id, '_ext' => 'pdf'], ['class' => 'fas fa-file-pdf btn btn-warning']) ?>
                    </td>

                    <td class="text-center font-weight-bold"><?= $this->Html->link(__(''), ['controller' => 'Laboratories', 'action' => 'add', $clinicalHistory->id], ['class' => 'fas fa-microscope btn btn-warning']) ?></td>

                    <td class="text-center font-weight-bold"><?= $this->Html->link(__(''), ['action' => 'edit', $clinicalHistory->id], ['class' => 'fas fa-edit btn btn-warning']) ?></td>
                    <?php if ($session->read('Auth.User.role_id') == 1): ?>
                    <td class="text-center font-weight-bold"> <?= $this->Form->postLink(__(''), ['action' => 'delete', $clinicalHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinicalHistory->id), 'class' => 'fas fa-trash-alt btn btn-warning elimi_historia']) ?></td>

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
<?= $this->Html->script('CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.all.js') ?>
<script>
$(".elimi_historia").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_historia', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar el informe medico?",
        text: "Una vez eliminado, no se podra recuperar el informe.",
        icon: "warning",
        confirmButtonText: 'Si, eliminar',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',

    }).then((result) => {
            if (result.value) {

                swal.fire(
                    'Eliminado!',
                    'El informe medico ha sido eliminado.',
                    'success'
                )
                delete_form.submit();

            }else{

                    swal.fire(
                    'Cancelado',
                    'La eliminacion del informe fue cancelada.',
                    'error'
                )

            }
        });
});

$('#informe').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "lengthMenu": [ [5, 50, 100, -1], [5, 25,  50, 100] ],
});

</script>
