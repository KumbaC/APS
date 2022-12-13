<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"> <i class="fas fa-tools"></i>  <?= __('Opciones') ?></h4>
            

            <?= $this->Html->link(__('Lista de consultas'), ['action' => 'index'], ['class' => 'text-uppercase font-weight-bold btn btn-danger side-nav-item']) ?>

        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="quotes view content card-body">
        <?php if (empty($quote->person->nombre)): ?>
            <h3 class="font-weight-bold text-uppercase ">Consulta medica de <?= h($quote->beneficiary->nombre) ?> <?= h($quote->beneficiary->apellido) ?></h3>
            <table class="table table-hover table-dark" style="background: #FFFFFF;">
        <?php else: ?>
            <h3 class="font-weight-bold text-uppercase ">Consulta medica de <?= h($quote->person->nombre) ?> <?= h($quote->person->apellido) ?></h3>
            <table class="table table-hover" style=" background: #071E22;">
        <?php endif; ?>

                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Motivo de la consulta') ?></th>
                    <td  class="text-light h5 font-weight-bold"><?= h($quote->asunto) ?></td>
                </tr>
               

               

                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Especialidad') ?></th>
                    <td class="text-light h5 font-weight-bold"><?= h($quote->specialty->descripcion)?></td>
                </tr>
                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Doctor') ?></th>
                    <td class="text-light h5 font-weight-bold">Dr. <?= h($quote->doctor->nombre) ?> <?= h($quote->doctor->apellido) ?></td>
                </tr>
              

                <tr>
                    <th class="text-light h5  font-weight-bold"><?= __('Estatus') ?></th>
                    <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                        <td class="h5 font-weight-bold text-uppercase font-weight-bold"><span class="badge badge-success"><?= h($quote->status_quote->descripcion) ?></span></td>
                    <?php else: ?>
                        <td class="h5 font-weight-bold text-uppercase font-weight-bold"><span class="badge badge-danger"><?= h($quote->status_quote->descripcion) ?></span></td>
                    <?php endif; ?>
                </tr>
               
                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Fecha de creacion') ?></th>
                    <td class="text-light h5 font-weight-bold"><?= h($quote->created) ?></td>
                </tr>

               

            </table>

        </div>
    </div>
</div>
