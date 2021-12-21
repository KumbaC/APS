<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClinicalHistory[]|\Cake\Collection\CollectionInterface $clinicalHistories
 */
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');
?>
<div class="clinicalHistories index content">

    <br>

    <h3 class="font-weight-bold text-uppercase"> <i class="fas fa-book-medical"></i>  <?= __('Historia Clinicas') ?></h3>
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
        <table class="table table-dark table-bordered">
            <thead class="thead thead-light">
                <tr>

                    <th class="text-center"><?= $this->Paginator->sort('person_id', 'Paciente') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('blood_type_id', 'Tipo de sangre') ?></th>
                    <th class="text-center"><?= $this->Paginator->sort('doctor_id', 'Doctor') ?></th>
                    <th class="actions text-center"><?= __('Imprimir') ?></th>
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
                    <td class="text-center font-weight-bold"><?= $clinicalHistory->has('person') ? h($clinicalHistory->person->nombre .' '. $clinicalHistory->person->apellido) : '' ?></td>
                    <?php endif; ?>

                    <?php if (empty($clinicalHistory->blood_type->descripcion)): ?>
                        <td class="text-uppercase font-weight-bold text-center">Desconocido</td>
                    <?php else: ?>
                    <td class="text-uppercase font-weight-bold text-center"><?= $clinicalHistory->has('blood_type') ? h($clinicalHistory->blood_type->descripcion) : '' ?></td>
                    <?php endif; ?>

                    <td class="text-center font-weight-bold"><?= $clinicalHistory->has('doctor') ? h('Dr. '. ' ' . $clinicalHistory->doctor->nombre . $clinicalHistory->doctor->apellido ) : '' ?></td>
                    <td class="text-center font-weight-bold">
                        <?= $this->Html->link(__(''), ['action' => 'view', $clinicalHistory->id, '_ext' => 'pdf'], ['class' => 'far fa-file-pdf btn btn-warning']) ?>
                    </td>
                    <td class="text-center font-weight-bold"><?= $this->Html->link(__(''), ['action' => 'edit', $clinicalHistory->id], ['class' => 'far fa-edit btn btn-warning']) ?></td>
                    <?php if ($session->read('Auth.User.role_id') == 1): ?>
                    <td class="text-center font-weight-bold"> <?= $this->Form->postLink(__(''), ['action' => 'delete', $clinicalHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clinicalHistory->id), 'class' => 'fas fa-trash-alt btn btn-warning elimi_historia']) ?></td>

                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?//= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . '') ?>
            <?//= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(".elimi_historia").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_historia', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar la historia clínica?",
        text: "Una vez eliminado, no se podra recuperar la historia.",
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
                    'La historia clínica ha sido eliminada.',
                    'success'
                )
                delete_form.submit();

            }else{

                    swal.fire(
                    'Cancelado',
                    'La historia clínica no ha sido eliminada.',
                    'error'
                )

            }
        });
});

</script>
