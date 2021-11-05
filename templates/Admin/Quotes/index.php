<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quotes
 */
?>
<div class="quotes index content">
    <!-- <//?= $this->Html->link(__('New Quote'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3 class="text-uppercase text-dark font-weight-bold"><i class="fas fa-file-medical"></i> <?= __('Consultas') ?></h3>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered bg-dark">
            <thead class="thead thead-light">
                <tr>
                    <th class="text-center"><?= h('ID') ?></th>
                    <th class="text-center"><?= h('Asunto') ?></th>
                    <th class="text-center"><?= h('Nota') ?></th>
                    <th class="text-center"><?= h('Especialidad') ?></th>
                    <!-- <th><//?= $this->Paginator->sort('disease_id') ?></th> -->
                    <th class="text-center"><?= h('Patologia') ?></th>
                    <th class="text-center"><?= h('Fecha') ?></th>
                    <th class="text-center"><?= h('Hora') ?></th>
                    <th class="text-center"><?= h('Titular') ?></th>
                    <th class="text-center"><?= h('Estatus') ?></th>
                    <th class="actions text-center"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quotes as $quote): ?>
                <tr>
                    <td class="font-weight-bold text-center"><?= $this->Number->format($quote->id) ?></td>
                    <td class="font-weight-bold text-center"><?= h($quote->asunto) ?></td>
                    <td class="font-weight-bold text-center"><?= h($quote->nota) ?></td>
                    <td class="font-weight-bold text-center"><?= h($quote->specialty->descripcion) ?></td>
                    <!-- <td><//?= $quote->has('disease') ? $this->Html->link($quote->disease->id, ['controller' => 'Diseases', 'action' => 'view', $quote->disease->id]) : '' ?></td> -->
                    <td class="font-weight-bold text-center"><?= h($quote->pathology->descripcion) ?></td>
                    <td class="font-weight-bold text-center"><?= h($quote->fecha) ?></td>
                    <td class="font-weight-bold text-center"><?= h($quote->hora) ?></td>

                    <td class="font-weight-bold text-center"> <?= h($quote->person->nombre) ?> <?= h($quote->person->apellido) ?></td>
                    <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                    <td class="h5 font-weight-bold text-center text-uppercase"><span class="badge badge-success"><?= h($quote->status_quote->descripcion) ?></span></td>

                    <?php else: ?>
                        <td class="h5 font-weight-bold text-center text-uppercase"><span class="badge badge-danger"><?= h($quote->status_quote->descripcion) ?></span></td>
                    <?php endif; ?>
                    <td class="text-center pagination">
                        <?= $this->Html->link(__(''), ['action' => 'view', $quote->id], ['class' => 'fas fa-eye btn btn-warning']) ?>
                        <?= $this->Html->link(__(''), ['action' => 'edit', $quote->id], ['class' => 'fas fa-edit btn btn-warning']) ?>
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $quote->id], ['confirm' => __('¿Estas seguro de eliminar la consulta de  {0} {1}?', $quote->person->nombre, $quote->person->apellido), 'class' => 'fas fa-trash-alt btn btn-warning']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev(' ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . '') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div>
</div>
