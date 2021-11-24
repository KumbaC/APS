<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>
<div class="persons index content">

    <h3><?= __('Persons') ?></h3>

<?= $this->Html->link((''), ['action' => 'add'], ['class' => 'fas fa-user-plus float-right text-xl text-dark', 'style' => 'margin-top:-20px;']) ?>
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
        <table class="table table-dark">
            <thead class="thead thead-light">
                <tr>
                    <th class="text-center"><?= h('Cedula') ?></th>
                    <th class="text-center"><?= h('Nombre') ?></th>
                    <th class="text-center"><?= h('Apellido') ?></th>
                    <th class="text-center"><?= h('Email') ?></th>
                    <th class="text-center"><?= h('Telefono') ?></th>

                    <th class="text-center"><?= h('Departamentos') ?></th>


                    <th class="text-center"><?= __('Imprimir') ?></th>
                    <th class="text-center"><?= __('Agregar beneficiario') ?></th>
                    <th class="text-center"><?= __('Agregar consulta') ?></th>
                    <th class="text-center"><?= __('Editar') ?></th>
                    <th class="text-center"><?= __('Eliminar') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person): ?>
                <tr>

                    <td class="text-center font-weight-bold">V-<?= h($person->cedula) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->nombre) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->apellido) ?></td>
                    <td class="text-center font-weight-bold"><?= h($person->email)  ?></td>
                    <td class="text-center font-weight-bold">+58<?= h($person->phone) ?></td>

                    <td class="text-center font-weight-bold"><?= $person->has('department') ? h($person->department->descripcion) : '' ?></td>



                    <td class="text-center font-weight-bold"> <?= $this->Html->link(__(''), ['action' => 'view', $person->id, '_ext' => 'pdf'], ['class' => 'fas fa-file-pdf btn btn-warning btn-lg']) ?></td> &nbsp;
                    <td class="text-center font-weight-bold"> <?= $this->Html->link(__('+'), ['controller' => 'beneficiary', 'action' => 'add', $person->id], ['class' => 'fas fa-user btn btn-warning btn-lg']) ?> </td> &nbsp;
                    <td class="text-center font-weight-bold"><?= $this->Html->link(__('+'), ['controller' => 'quotes', 'action' => 'add', $person->id], ['class' => 'fas fa-hospital btn btn-warning btn-lg']) ?></td> &nbsp;
                    <td class="text-center font-weight-bold"><?= $this->Html->link(__(''), ['action' => 'edit', $person->id], ['class' => 'fas fa-edit btn btn-warning btn-lg']) ?> </td> &nbsp;
                    <td class="text-center font-weight-bold"><?= $this->Form->postLink(__(''), ['action' => 'delete', $person->id],  ['confirm' => __('¿Esta seguro de borrar a {0} {1}?', $person->nombre, $person->apellido), 'class' => 'fas fa-trash-alt btn btn-warning btn-lg']) ?></td>


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
