<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quotes
 */
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');

?>
<div class="quotes index content">
<br>
    <h3 class="text-uppercase font-weight-bold ml-2"><i class="fas fa-notes-medical"></i>  <?= __('Consultas') ?></h3>
    <br>

    <?= $this->Form->create(null,['type' => 'get']) ?>
    <div class="row">
        <div class="col-md-2">
        <?php echo $this->Form->control('key', ['label' => '',  'placeholder' => 'Buscar' ]); ?>

        </div>
        <?= $this->Form->submit(__('Buscar'), ['class' => 'btn btn-primary btn-md', 'style' => 'margin-top: 21px; margin-left: -12px;' ]) ?>
    </div>

    <?= $this->Form->end() ?>


    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead class="thead thead-light">
                <tr>

                    <th class="text-center"><?= h('Asunto') ?></th>
                    <th class="text-center"><?= h('Nota') ?></th>
                    <th class="text-center"><?= h('Paciente') ?></th>
                    <th class="text-center"><?= h('Especialidad') ?></th>
                    <th class="text-center"><?= h('Doctor') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="text-center"><?= h('Hora') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('status_quote_id', 'Estatus') ?></th>



                    <th class="actions text-center"><?= __('Opciones') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($quotes as $quote): ?>
                <tr>

                    <td class="text-center font-weight-bold"><?= h($quote->asunto) ?></td>
                    <td class="text-center font-weight-bold"><?= h($quote->nota) ?></td>

                    <?php if (empty($quote->person->nombre)): ?>
                    <td class="text-center font-weight-bold"><?= h($quote->beneficiary->nombre), ' ',   h($quote->beneficiary->apellido) ?></td>

                    <?php else: ?>
                    <td class="text-center font-weight-bold"><?=  h($quote->person->nombre), ' ',   h($quote->person->apellido) ?></td>

                    <?php endif; ?>

                    <td class="text-center font-weight-bold"><?= h($quote->specialty->descripcion) ?></td>
                    <td class="text-center font-weight-bold">Dr. <?= h($quote->doctor->nombre), '  ', h($quote->doctor->apellido)?></td>
                    <td class="text-center font-weight-bold"><?= h($quote->fecha) ?></td>
                    <td class="text-center font-weight-bold"><?= h($quote->hora) ?></td>


                    <!-- BOTONES DE ESTATUS -->
                    <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                    <td class="h5 font-weight-bold text-center text-uppercase"><span class="badge badge-success"><?= h($quote->status_quote->descripcion) ?></span></td>

                    <?php else: ?>
                        <td class="h5 font-weight-bold text-center text-uppercase"><span class="badge badge-danger"><?= h($quote->status_quote->descripcion) ?></span></td>
                    <?php endif; ?>

                        <!-- BENEFICIARIOS -->
                    <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                        <?php if (empty($quote->person->nombre)): ?>

                            <td class="pagination text-center">
                             <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-warning']) ?>
                             <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning']) ?>
                        <?php else: ?>
                            <td class="pagination text-center">
                             <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-warning']) ?>
                            <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning']) ?>
                        <?php endif; ?>


                            <?= $this->Html->link(__(''), ['action' => 'edit', $quote->id], ['class' => 'fas fa-edit btn btn-warning']) ?>

                        <?php if ($session->read('Auth.User.role_id') == 1): ?>
                             <?= $this->Form->postLink(__(''), ['action' => 'delete', $quote->id], ['confirm' => __('¿Quiere eliminar la consulta medica?', $quote->id),  'class' => 'fas fa-trash-alt btn btn-warning elimi_consulta']) ?>
                        <?php endif; ?>

                        </td>
                    <?php else: ?>
                        <?php if (empty($quote->person->nombre)): ?>

                        <td class="pagination text-center">
                        <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-warning disabled']) ?>
                        <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'addb', $quote->beneficiary->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning disabled']) ?>
                    <?php else: ?>
                        <td class="pagination text-center">
                       <?= $this->Html->link(__('+'), ['controller' => 'ClinicalHistories','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file-medical btn btn-warning disabled']) ?>
                       <?= $this->Html->link(__('+'), ['controller' => 'Prescriptions','action' => 'add', $quote->person->id, $quote->doctor->id], ['class' => 'fas fa-file btn btn-warning disabled']) ?>
                    <?php endif; ?>


                       <!--  <//?= //$this->Html->link(__(''), ['action' => 'view', $quote->person->id], ['class' => 'fas fa-eye btn btn-warning']) ?> -->

                        <?= $this->Html->link(__(''), ['action' => 'edit', $quote->id], ['class' => 'fas fa-edit btn btn-warning']) ?>

                        <?php if ($session->read('Auth.User.role_id') == 1): ?>

                         <?= $this->Form->postLink(__(''), ['action' => 'delete', $quote->id], ['confirm' => __('¿Quiere eliminar la consulta medica?', $quote->id),  'class' => 'fas fa-trash-alt btn btn-warning elimi_consulta']) ?>

                        <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . '') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(".elimi_consulta").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_consulta', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar la consulta medica?",
        text: "Una vez eliminada, no se podra recuperar la consulta.",
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
                    'La eliminación de la consulta ha sido cancelada.',
                    'error'
                )

            }
        });
});

</script>
