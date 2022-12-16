<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.css') ?>
<div class="persons index content">
    <!-- <//?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-user-tie"></i>  <?= __('Titular')  ?></h3>
    <br><br>
    <div class="table-responsive-md">
        <table class="table table-sm table-dark" style="border-radius: 10px;">
            <thead class="thead bg-dark">
                <tr>

                    <th class="text-center text-uppercase"><?= h('Cedula') ?></th>
                    <th class="text-center text-uppercase"><?= h('Nombre') ?></th>
                    <th class="text-center text-uppercase"><?= h('Apellido') ?></th>
                    <th class="text-center text-uppercase"><?= h('Correo Electronico') ?></th>
                    <th class="text-center text-uppercase"><?= h('Departamento') ?></th>
                    <!-- <th class="text-center"><//?= h('Estatus') ?></th> -->
                    <th class="text-center text-uppercase"><?= h('Cargo') ?></th>
                    <th class="actions text-center text-uppercase"><?= __('Imprimir Carnet') ?></th>
                    <th class="actions text-center text-uppercase"><?= __('Pedir Citas') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person): ?>
                <tr>

                    <td class="text-center font-weight-bold">V-<?= h($person->cedula) ?></td>
                    <td class="text-center font-weight-bold text-uppercase"><?= h($person->nombre) ?></td>
                    <td class="text-center font-weight-bold text-uppercase"><?= h($person->apellido) ?></td>
                    <?php if(!empty($person->email)): ?>
                    <td class="text-center font-weight-bold"><?= h($person->email) ?></td>
                    <?php else: ?>
                    <td class="text-center font-weight-bold">SIN CORREO INSTITUCIONAL</td>
                    <?php endif; ?>
                    <?php if(!empty($person->department->descripcion)): ?>
                    <td class="text-center font-weight-bold"><?= h($person->department->descripcion)?></td>
                    <?php else: ?>
                    <td class="text-center font-weight-bold">SIN DIVISION ASIGNADA</td>
                    <?php endif; ?>
                    
                    <td class="text-center font-weight-bold"><?= h($person->cargo->descripcion) ?></td>
                    <td class="text-center">
                       <?= $this->Html->link(__(''), ['action' => 'view', $person->id, '_ext' => 'pdf'], ['class' => 'fas fa-file-pdf btn btn-warning']) ?>
                    </td>
                    <td class="text-center">
                        <?= $this->Html->link(__('+'), ['controller' => 'quotes', 'action' => 'add', $person->id], ['class' => 'fas fa-ticket-alt btn btn-warning']) ?>  
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>
