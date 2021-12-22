<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosis[]|\Cake\Collection\CollectionInterface $diagnoses
 */
?>
<div class="diagnoses index content">
    <?= $this->Html->link(__(''), ['action' => 'add'], ['class' => 'fas-lg fas fa-plus-circle btn btn-warning btn-lg float-right', 'style' => 'border-radius:40px;']) ?>
    <h3 class="text-uppercase font-weight-bold"> <i class="fas fa-comment-medical"></i> <?= __('Diagnosticos') ?></h3>

    <!-- BUSCADOR -->
    <?= $this->Form->create(null,['type' => 'get']) ?>
    <div class="row">
        <div class="col-md-2">
        <?php echo $this->Form->control('key', ['class' => '', 'label' => '',  'placeholder' => 'Buscar' ]); ?>

        </div>
        <?= $this->Form->submit(__('Buscar'), ['class' => 'btn btn-primary btn-md', 'style' => 'margin-top: 21px; margin-left: -14px;' ]) ?>
    </div>

    <?= $this->Form->end() ?>
    <!-- BUSCADOR -->
    <div class="table-responsive">
        <table class="table table-dark table-bordered">
            <thead class="thead thead-light">
                <tr>

                    <th class="font-weight-bold">DESCRIPCIÓN</th>
                    <th class="actions text-center"><?= __('OPCIONES') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diagnoses as $diagnosis): ?>
                <tr>

                    <td class="font-weight-bold"><?= h($diagnosis->descripcion) ?></td>
                    <td class="pagination text-center">

                        <?= $this->Html->link(__(''), ['action' => 'edit', $diagnosis->id], ['class' => 'far fa-edit btn btn-warning']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $diagnosis->id], ['confirm' => __('¿Desea usted eliminar el diagnostico {0}?', $diagnosis->descripcion), 'class' => 'fas fa-trash btn btn-warning elimi_diagnoses']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('' . __('Primer Registro')) ?>
            <?= $this->Paginator->prev('' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . '') ?>
            <?= $this->Paginator->last(__('Ultimo Registro') . '') ?>
        </ul>
        <p><?//= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(".elimi_diagnoses").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_diagnoses', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar este diagnostico?",
        text: "Una vez eliminado, no se podra recuperar el diagnostico.",
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
                    'La eliminación del diagnostico, ha sido cancelada.',
                    'error'
                )

            }
        });
});

</script>
