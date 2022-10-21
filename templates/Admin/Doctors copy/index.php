<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Doctor[]|\Cake\Collection\CollectionInterface $doctors
 * @var \Cake\Collection\CollectionInterface|string[] $specialties
 * @var //\Cake\Collection\CollectionInterface|string[] $usersInternals
 * @var \Cake\Collection\CollectionInterface|string[] $turns
 */
?>


<div class="doctors index content">
    <?= $this->Html->link(__('+'), ['action' => 'add'], ['class' => 'font-weight-bold fas fa-user-nurse btn btn-warning btn-sm float-right text-xl', 'style' => 'margin-top:40px; border-radius:60px;']) ?>
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-user-md"></i><?= __('Doctores') ?></h3>
    <br><br>

 <!-- BUSCADOR -->
 <?= $this->Form->create(null,['type' => 'get']) ?>
    <div class="row">
        <div class="col-md-2">
        <?php echo $this->Form->control('key', ['class' => '', 'label' => '',  'placeholder' => 'Buscar' ]); ?>

        </div>
        <?= $this->Form->submit(__('Buscar'), ['class' => 'btn btn-primary btn-md', 'style' => 'margin-top: 21px; margin-left: -12px;' ]) ?>
    </div>

    <?= $this->Form->end() ?>
    <!-- BUSCADOR -->


    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead class="thead thead-light">
                <tr>

                    <th class="text-center text-light "><?= $this->Paginator->sort('nombre') ?></th>
                    <th class="text-center text-light "><?= $this->Paginator->sort('apellido') ?></th>
                    <th class="text-center text-light "><?= $this->Paginator->sort('cedula') ?></th>
                    <th class="text-center text-light "><?= $this->Paginator->sort('telefono') ?></th>
                    <th class="text-center text-light "><?= $this->Paginator->sort('email', 'Correo Electronico') ?></th>
                    <th class="text-center text-light "><?= $this->Paginator->sort('specialty_id', 'Especialidad') ?></th>
                    <th class="text-center"><?= h('Turno') ?></th>
                    <th class="text-center text-light "><?= $this->Paginator->sort('created', 'Creado') ?></th>
                    <!-- <th><//?= $this->Paginator->sort('modified') ?></th> -->
                    <th class="actions text-center"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $doctor): ?>
                <tr>

                    <td class="text-light text-center font-weight-bold"><?= h($doctor->nombre) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($doctor->apellido) ?></td>
                    <td class="text-light text-center font-weight-bold">V- <?= h($doctor->cedula) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($doctor->telefono) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($doctor->email) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($doctor->specialty->descripcion) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($doctor->turn->descripcion) ?></td>

                    <td class="text-light text-center font-weight-bold"><?= h($doctor->created) ?></td>
                    <!-- <td><//?= h($doctor->modified) ?></td> -->
                    <td class="pagination">
                        <!-- <//?= $this->Html->link(__(''), ['action' => 'view', $doctor->id], ['class' => 'fas fa-eye btn btn-warning']) ?> -->
                        <?= $this->Html->link(__(''), ['action' => 'edit', $doctor->id], ['class' => 'fas fa-edit btn btn-warning']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $doctor->id], ['confirm' => __('¿Estas seguro de eliminar al Dr. {0} {1}?', $doctor->nombre, $doctor->apellido), 'class' => 'fas fa-trash-alt btn btn-warning elimi_doctor']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">

            <?= $this->Paginator->prev('' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . '') ?>

        </ul>
       <!--  <p><//?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p> -->
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(".elimi_doctor").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_doctor', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar al doctor?",
        text: "Una vez eliminado/a, no se podra recuperar a este doctor.",
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

</script>
