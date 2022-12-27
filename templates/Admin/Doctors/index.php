<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor[]|\Cake\Collection\CollectionInterface $doctors
 */

?>
<!-- DataTables -->
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.css') ?>
<div class="doctors index content">
<?= $this->Html->link(('+'), ['action' => 'add'], ['class' => 'btn btn-warning fas fa-user-md float-right text-xl', 'style' => 'margin-top: 30px; border-radius:50px;']) ?>
    <h3 class="text-uppercase font-weight-bold"><?= __('Doctores') ?> <i class="fas fa-user-md"></i> </h3>

    <div class="card bg-dark table-responsive">
        <table class="table table-bordered table-dark display responsive nowrap" id="doctor" style="border-radius: 15px 15px 15px 15px !important;">
            <thead class="thead thead-light responsive">
                <tr>
                    <!-- <th>< ?= $this->Paginator->sort('ID') ?></th> -->
                    <th class="text-center font-weight-bold"><?= h('Cedula') ?></th>
                    <th class="text-center font-weight-bold"><?= h('Nombre') ?></th>
                    <th class="text-center font-weight-bold"><?= h('Apellido') ?></th>
                    <th class="text-center font-weight-bold"><?= h('Telefono') ?></th>
                    <th class="text-center font-weight-bold"><?= h('Correo Electronico') ?></th>
                    <th class="text-center font-weight-bold"><?= h('Especialidad') ?></th>
                    
                     <th class="text-center font-weight-bold"><?= h('Usuario') ?></th>



                    <th class="actions text-center font-weight-bold"><?= __('Opciones') ?></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($doctors as $doctor): ?>
                <tr>
                    
                    <td class="text-light text-center font-weight-bold">V- <?= h($doctor->cedula) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($doctor->nombre) ?></td>
                    <td class="text-light text-center font-weight-bold"> <?= h($doctor->apellido) ?></td>

                    <td class="text-light text-center font-weight-bold"><?= h($doctor->telefono) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($doctor->email) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($doctor->specialty->descripcion) ?></td>

                    <?php if(!empty($doctor->users_doctor)): ?>
                    <td><?= h($doctor->users_doctor->username)?></td>
                    <?php else: ?>
                    <td><?= h('El doctor no tiene usuario')?></td>
                    <?php endif;?>


                    <td class="pagination">
                        <?= $this->Html->link(__(''), ['action' => 'view', $doctor->id], ['class' => 'fas fa-eye btn btn-warning']) ?>
                        <?= $this->Html->link(__('+'), ['controller' => 'UsersDoctors', 'action' => 'registerDoctors', $doctor->id], ['class' => 'fas fa-users btn btn-warning']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $doctor->id], ['class' => 'fas fa-edit btn btn-warning']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $doctor->id], ['confirm' => __('¿Estas seguro de eliminar al Dr. {0} {1}?', $doctor->nombre, $doctor->apellido), 'class' => 'fas fa-trash-alt btn btn-warning elimi_doctor']) ?>
   
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
<?= $this->Html->script('CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.all.js') ?>
<script>
    $(".elimi_doctor").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_doctor', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar al Doctor?",
        text: "Una vez eliminado/a, no se podra recuperar a este Doctor.",
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
                    'La eliminación del doctor ha sido cancelada.',
                    'error'
                )

            }
        });
});
  $('#g_habito').click(function(){
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'Doctors', 'action' => 'index']); ?>',
            type: 'POST',
            data: {
                'cupos': $('#cupos').val(+1),
               // '_csrfToken': $('input[name=_csrfToken]').val()
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                //$('#habitos').append('<option value="'+data.id+'">'+data.descripcion+'</option>');

                Swal.fire('Cupo aumentado', 'El cupo del medico fue aumentado', 'success');
            }
        });
    });

    $('#doctor').DataTable({
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
