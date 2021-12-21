<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>
<div class="persons index content">

    <h3 class="text-uppercase font-weight-bold"> <i class="fas fa-user-tie"></i> <?= __('Titulares') ?></h3>

<?= $this->Html->link((''), ['action' => 'add'], ['class' => 'btn btn-warning fas fa-user-plus float-right text-xl', 'style' => 'margin-top: 30px; border-radius:50px;']) ?>
<br><br>


<?= $this->Form->create(null,['type' => 'get']) ?>
<div class="row">
        <div class="col-md-2">
<?php echo $this->Form->control('key', ['label' =>'Buscador', 'placeholder' => 'Buscar']); ?>
        </div>
<?= $this->Form->submit(__('Buscar'), ['class' => 'btn btn-primary btn-md', 'style' => 'margin-top: 29px; margin-left: -12px;']) ?>
</div>
<?= $this->Form->end() ?>



    <div class="table-responsive">
        <table class="table table-dark table-bordered">
            <thead class="thead thead-light">
                <tr>
                    <th class="text-center"><?= h('Cedula') ?></th>
                    <th class="text-center"><?= h('Titular') ?></th>
                    <th class="text-center"><?= h('Email') ?></th>
                    <!-- <th class="text-center"><?= h('Telefono') ?></th> -->

                    <th class="text-center"><?= h('Departamentos') ?></th>


                    <th class="text-center"><?= __('Imprimir') ?></th>
                    <th class="text-center"><?= __('Añadir beneficiario') ?></th>
                    <th class="text-center"><?= __('Añadir consulta') ?></th>
                    <th class="text-center"><?= __('Editar') ?></th>
                    <th class="text-center"><?= __('Eliminar') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person): ?>
                <tr>

                    <td class="text-center font-weight-bold">V-<?= h($person->cedula) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->nombre),' ', h($person->apellido) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->email)  ?></td>
                    <!-- <td class="text-center font-weight-bold">+58<?= h($person->phone) ?></td> -->

                    <td class="text-center font-weight-bold"><?= $person->has('department') ? h($person->department->descripcion) : '' ?></td>



                    <td class="text-center font-weight-bold"> <?= $this->Html->link(__(''), ['action' => 'view', $person->id, '_ext' => 'pdf'], ['class' => 'fas fa-file-pdf btn btn-warning ']) ?></td> &nbsp;
                    <td class="text-center font-weight-bold"> <?= $this->Html->link(__('+'), ['controller' => 'beneficiary', 'action' => 'add', $person->id], ['class' => 'fas fa-user btn btn-warning']) ?> </td> &nbsp;
                    <td class="text-center font-weight-bold"><?= $this->Html->link(__('+'), ['controller' => 'quotes', 'action' => 'add', $person->id], ['class' => 'fas fa-hospital btn btn-warning']) ?></td> &nbsp;
                    <td class="text-center font-weight-bold"><?= $this->Html->link(__(''), ['action' => 'edit', $person->id], ['class' => 'fas fa-edit btn btn-warning']) ?> </td> &nbsp;
                    <td class="text-center font-weight-bold"><?= $this->Form->postLink(__(''), ['action' => 'delete', $person->id],  ['confirm' => __('¿Esta seguro de borrar a {0} {1}?', $person->nombre, $person->apellido), 'class' => 'fas fa-trash-alt btn btn-warning elimi_persona']) ?></td>


                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">

            <?= $this->Paginator->prev(' ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . '') ?>

        </ul>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

</script>
