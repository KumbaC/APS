<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>

<!-- <h3><//?= __('Afiliados') ?></h3> -->

<?= $this->Html->link((''), ['action' => 'add'], ['class' => 'fas fa-user-plus float-right text-xl text-dark', 'style' => 'margin-top:-10px;']) ?>
<br>
<?= $this->Form->create(null,['type' => 'get']) ?>
<?php echo $this->Form->control('key', ['label' =>'Buscador', 'placeholder' => 'Buscar']); ?>
<?= $this->Form->submit(__('Buscar'), ['class' => 'btn btn-primary btn-block']) ?>
<?= $this->Form->end() ?>


<div class="persons index content">


    <div class="table-responsive">
        <table class="table table-bordered table-hover bg-dark table-rounded">
            <thead class="thead-light">
                <tr>
                    <th class="text-center font-weight-bold text-dark"><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('nombre') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('apellido') ?></th>
                    <th class="text-center font-weight-bold"><?= __('Cedula') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('email', 'Correo Electronico') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('department_id', 'Departamento') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('cargo_id') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('status_id', 'Estatus') ?></th>

                    <th class="actions text-center"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person): ?>
                <tr>
                    <td class="text-center font-weight-bold"><?= $this->Number->format($person->id) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->nombre) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->apellido) ?></td>
                    <td class="text-center font-weight-bold">V- <?= h($person->cedula) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->email) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->cargo->descripcion)?></td>

                    <td class="text-center font-weight-bold"><?= h($person->department->descripcion) ?></td>
                    <?php if ($person->status->descripcion == 'Activo'): ?>
                    <td class="text-center font-weight-bold text-uppercase h5"><span class="badge badge-success"><?= h($person->status->descripcion) ?></span></td>

                    <?php else: ?>
                    <td class="text-center font-weight-bold text-uppercase h5"><span class="badge badge-danger"><?= h($person->status->descripcion) ?></span></td>

                    <?php endif; ?>


                    <td class="pagination text-center">
                    <?= $this->Html->link(__(''), ['action' => 'view', $person->id, '_ext' => 'pdf'], ['class' => 'fas fa-file-pdf btn btn-warning']) ?> &nbsp;
                    <?= $this->Html->link(__('+'), ['controller' => 'beneficiary', 'action' => 'add', $person->id], ['class' => 'fas fa-user btn btn-warning']) ?> &nbsp;
                    <?= $this->Html->link(__('+'), ['controller' => 'quotes', 'action' => 'add', $person->id], ['class' => 'fas fa-hospital btn btn-warning']) ?> &nbsp;
                    <?= $this->Html->link(__(''), ['action' => 'edit', $person->id], ['class' => 'fas fa-edit btn btn-warning']) ?> &nbsp;
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $person->id],  ['confirm' => __('¿Esta seguro de borrar a {0} {1}?', $person->nombre, $person->apellido), 'class' => 'fas fa-trash-alt btn btn-warning']) ?></button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev(' ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' ') ?>
        </ul>
    </div>
</div>
