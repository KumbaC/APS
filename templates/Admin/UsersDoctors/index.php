<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDoctor[]|\Cake\Collection\CollectionInterface $usersDoctors
 */
?>

<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.css') ?>


<div class="usersDoctors index content">
    <?= $this->Html->link(__('+'), ['action' => 'registerDoctors'], ['class' => 'fas fa-user-md btn btn-warning button float-right']) ?>
    <?= $this->Html->link(__('+'), ['action' => 'registerSupport'], ['class' => 'fas fa-headset btn btn-warning button float-right']) ?>
    <h4 class="text-uppercase font-weight-bold"><?= __('Usuarios') ?><h3 class="text-uppercase font-weight-bold">MEDICOS | APOYO ADMINISTRATIVO</h3></h4>
    <div class="card bg-dark table-responsive">
        <table class="table table-bordered table-dark display responsive nowrap" id="user_doctor" style="border-radius: 15px 15px 15px 15px !important;">
            <thead class="thead thead-light">
            
                <tr>
                    <!-- <th>< ?= h('id') ?></th> -->
                    <th class="text-uppercase"><?= h('Usuario') ?></th>
                    <!-- <th>< ?= h('Contraseña') ?></th> -->
                    <th class="text-uppercase"><?= h('Rol del usuario') ?></th>
                   
                    <th class="actions text-uppercase font-weight-bold"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersDoctors as $usersDoctor): ?>
                <tr>
                    <!-- <td>< ?= $this->Number->format($usersDoctor->id) ?></td> -->
                    <td class="text-uppercase font-weight-bold"><?= h($usersDoctor->username) ?></td>
                    <!-- <td>< ?= h($usersDoctor->password) ?></td> -->
                    <td class="text-uppercase font-weight-bold"><?= h($usersDoctor->role->descripcion) ?></td>
                   
                    <td class="actions">
                        <!-- < ?= $this->Html->link(__(''), ['action' => 'view', $usersDoctor->id],['class' => 'fas fa-eye btn btn-warning', 'title' => 'Ver información del usuario']) ?> -->
                        <?= $this->Html->link(__(''), ['action' => 'changePassword', $usersDoctor->id], ['class' => 'fas fa-lock btn btn-warning', 'title' => 'Cambiar contraseña']) ?>
                        <!-- < ?= $this->Html->link(__(''), ['action' => 'edit', $usersDoctor->id], ['class' => 'fas fa-edit btn btn-warning', 'title' => 'Editar información del usuario']) ?> -->
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $usersDoctor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersDoctor->id), 'class' => 'fas fa-trash btn btn-warning elimi_user', 'title' => 'Eliminar al usuario']) ?>
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
<?= $this->Html->script('CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.all.js') ?>


<script>
$(".elimi_user").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_user', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar el usuario?",
        text: "Una vez eliminado, no se podra recuperar el usuario.",
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
                    'La eliminación del usuario ha sido cancelada.',
                    'error'
                )

            }
        });
});

$('#user_doctor').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "lengthMenu": [ [5, 50, 100, -1], [5, 25,  50, 100] ],
        scrollY:        "200px",
        scrollX:        false,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   true
});

</script>