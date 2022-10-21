<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quotes
 */
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');

?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/fontawesome.css') ?>

<div class="quotes index content">
<br>
    <h3 class="text-uppercase font-weight-bold ml-2"><i class="fas fa-notes-medical"></i>  <?= __('Consultas Familiares') ?></h3>
    <br>

   
    <?= $this->html->link('Mis consultas', ['action' => 'indexmi'], ['class' => 'btn btn-outline-primary btn-sm']) ?>
    
    <div class="card bg-dark table-responsive">
        <table class="table table-bordered table-dark" id="consultas">
            <thead class="thead thead-light">
                <tr>

                    <th class="text-center"><?= ('Asunto') ?></th>
                    <th class="text-center"><?= ('Nota') ?></th>
                    <th class="text-center"><?= h('Paciente') ?></th>
                    <th class="text-center"><?= h('Especialidad') ?></th>
                    <th class="text-center"><?= h('Doctor') ?></th>
                    <th class="text-center"><?= h('Fecha') ?></th>
                    <th class="text-center"><?= h('Hora') ?></th>
                    <th class="text-center"><?= h('Estatus') ?></th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($quotes as $quote): ?>
                <tr>

                    <td class="text-center font-weight-bold"><?= ($quote->asunto) ?></td>
                    <td class="text-center font-weight-bold"><?= ($quote->nota) ?></td>

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
                    <td class="h7 font-weight-bold text-center text-uppercase"><span class="badge badge-pill badge-success"><?= h($quote->status_quote->descripcion) ?></span></td>

                    <?php elseif ($quote->status_quote->descripcion == 'En proceso'): ?>

                    <td class="h7 font-weight-bold text-center text-uppercase"><span class="badge badge-pill badge-primary"><?= h($quote->status_quote->descripcion) ?></span></td>

                    <?php else: ?>
                        <td class="h7 font-weight-bold text-center text-uppercase"><span class="badge badge-pill badge-danger"><?= h($quote->status_quote->descripcion) ?></span></td>
                    <?php endif; ?>


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

$('#consultas').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

</script>
