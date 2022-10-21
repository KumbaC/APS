<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turn[]|\Cake\Collection\CollectionInterface $turns
 */
?>
<div class="turns index content">
    <?= $this->Html->link(__(''), ['action' => 'add'], ['class' => 'btn btn-lg btn-warning fas fa-plus-circle button float-right', 'style' => 'border-radius: 60px;']) ?>
    <br>
    <h3 class="font-weight-bold text-uppercase"> <i class="fas fa-ticket-alt"></i> <?= __('Turnos') ?></h3>
    <br>
    <div class="table-responsive">
        <table class="table table-dark table-bordered">
            <thead class="thead thead-light">
                <tr>
                    <!-- <th class="text-center font-weight-bold"><?//= $this->Paginator->sort('id', 'ID') ?></th> -->
                    <th class="font-weight-bold text-uppercase"><?= h('Turnos') ?></th>
                    <th class="text-center actions font-weight-bold text-uppercase"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turns as $turn): ?>
                <tr>
                    <!-- <td class="text-center font-weight-bold"><?//= $this->Number->format($turn->id) ?></td> -->
                    <td class="font-weight-bold text-uppercase"><?= h($turn->descripcion) ?></td>
                    <td class="text-center pagination">
                        <?//= $this->Html->link(__('View'), ['action' => 'view', $turn->id]) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $turn->id], ['class' => 'fas fa-edit btn btn-warning']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $turn->id], ['confirm' => __('¿Seguro que desea eliminar el turno # {0}?', $turn->id), 'class' => 'fas fa-trash btn btn-warning elimi_turns' ]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?//= $this->Paginator->first('<< ' . __('')) ?>
            <?= $this->Paginator->prev('' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . '') ?>
            <?//= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?//= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(".elimi_turns").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_turns', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar este turno?",
        text: "Una vez eliminado, no se podra recuperar este turno.",
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
                    'La eliminación del turno, ha sido cancelada.',
                    'error'
                )

            }
        });
});

</script>
