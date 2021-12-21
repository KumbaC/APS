<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MedicalsAntecedent[]|\Cake\Collection\CollectionInterface $medicalsAntecedents
 */
?>
<div class="medicalsAntecedents index content">
    <?= $this->Html->link(__(''), ['action' => 'add'], ['class' => 'fas-lg fas fa-plus-circle btn btn-warning btn-lg float-right', 'style' => 'border-radius:40px;']) ?>
    <br>
    <h3 class="text-uppercase font-weight-bold"> <i class="fas fa-head-side-cough"></i> <?= __('Antecedentes Medicos') ?></h3>
    <div class="table-responsive">
        <table class="table table-dark table-bordered">
            <thead class="thead thead-light">
                <tr>

                    <th class="font-weight-bold">Antecedentes</th>
                    <th class="text-center actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicalsAntecedents as $medicalsAntecedent): ?>
                <tr>

                    <td class="font-weight-bold"><?= h($medicalsAntecedent->descripcion) ?></td>
                    <td class="pagination text-center">

                        <?= $this->Html->link(__(''), ['action' => 'edit', $medicalsAntecedent->id], ['class' => 'far fa-edit btn btn-warning']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $medicalsAntecedent->id], ['confirm' => __('¿Desea eliminar el antecedente {0}', $medicalsAntecedent->descripcion.'?'), 'class' => 'fas fa-trash btn btn-warning elimi_antecedente']) ?>
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

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

</script>
