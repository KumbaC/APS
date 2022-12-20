<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.css') ?>
<div class="persons index content">
   
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-user-tie"></i>  <?= __('Titular')  ?></h3>
    <br><br>
    <div class="table-responsive card bg-dark">
        <table class="table table-dark display responsive nowrap" style="border-radius: 3px 3px 3px 3px !important;" id="titular">
            <thead class="thead bg-light">
                <tr>

                    <th class="text-center text-uppercase"><?= h('Cedula') ?></th>
                    <th class="text-center text-uppercase"><?= h('Nombre') ?></th>
                    <th class="text-center text-uppercase"><?= h('Apellido') ?></th>
                    <th class="text-center text-uppercase"><?= h('Correo Electronico') ?></th>
                    <th class="text-center text-uppercase"><?= h('Departamento') ?></th>
                    
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
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables/jquery.dataTables.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>
<script>
$('#titular').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    
    "lengthMenu": [ [5, 50, 100, -1], [5, 25,  50, 100] ],
        scrollY:        "200px",
        scrollX:        false,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   true,
        searching: false,
        lengthChange:false
        
        
       
    
});
</script>