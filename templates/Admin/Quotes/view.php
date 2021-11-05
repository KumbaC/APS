<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-center text-uppercase font-weight-bold"> <i class="fas fa-tools"></i> <?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de consultas'), ['action' => 'index'], ['class' => 'text-uppercase font-weight-bold btn btn-danger side-nav-item']) ?>

        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="quotes view content card-body">
            <h3 class="">    <h3 class="font-weight-bold text-center"><i class="fas fa-notes-medical"></i> Consulta Medica de  <?= h($quote->person->nombre) ?> <?= h($quote->person->apellido) ?></h3>
            <table class="table table-bordered table-condensed bg-warning rounded-bottom">
                <tr>
                    <th class="h5 font-weight-bold"><?= __('Asunto: ') ?></th>
                    <td class="h5 font-weight-bold"><?= h($quote->asunto) ?></td>
                </tr>
                <hr>
                <tr>
                    <th class="h5 font-weight-bold"><?= __('Nota:') ?></th>

                    <td class="h5 font-weight-bold"><?= h($quote->nota) ?></td>
                </tr>

                <tr>
                    <th class="h5 font-weight-bold"><?= __('Especialidad:') ?></th>
                    <td class="h5 font-weight-bold">&nbsp; <?= h($quote->specialty->descripcion) ?></td>
                </tr>

                <tr>
                    <th class="h5 font-weight-bold"><?= __('Patologia:') ?></th>
                    <td class="h5 font-weight-bold"><?= h($quote->pathology->descripcion)?></td>
                </tr>
                <tr>
                    <th class="h5 font-weight-bold"><?= __('Cedula:') ?></th>
                    <td class="h5 font-weight-bold">V- <?= h($quote->person->cedula) ?></td>
                </tr>
                <tr>
                    <th class="h5 font-weight-bold"><?= __('Estatus:') ?></th>
                    <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                    <td class="h4 text-uppercase"><span class="badge badge-success"><?= h($quote->status_quote->descripcion) ?></span></td>
                    <?php  else: ?>
                    <td class="h4 text-uppercase"><span class="badge badge-danger"><?= h($quote->status_quote->descripcion) ?></span></td>
                    <?php  endif; ?>
                </tr>
                <tr >
                    <th class="h5 font-weight-bold"><?= __('Fecha:') ?></th>
                    <td class="h5 font-weight-bold"><?= h($quote->fecha) ?></td>
                </tr>
                <tr>
                    <th class="h5 font-weight-bold"><?= __('Hora:') ?></th>
                    <td class="h5 font-weight-bold"><?= h($quote->hora) ?></td>
                </tr>

            </table>
            <div class="related">

            </div>
        </div>
    </div>
</div>
