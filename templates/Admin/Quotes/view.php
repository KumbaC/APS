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
            <?= $this->Html->link(__('Editar Consulta'), ['action' => 'edit', $quote->id], ['class' => 'text-uppercase font-weight-bold btn btn-danger side-nav-item']) ?>

            <?= $this->Html->link(__('Lista de consultas'), ['action' => 'index'], ['class' => 'text-uppercase font-weight-bold btn btn-danger side-nav-item']) ?>

        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="quotes view content card-body">
        <?php if (empty($quote->person->nombre)): ?>
            <h3 class="font-weight-bold text-uppercase ">Consulta medica de <?= h($quote->beneficiary->nombre) ?> <?= h($quote->beneficiary->apellido) ?></h3>
            <table class="table table-hover" style=" background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

">
        <?php else: ?>
            <h3 class="font-weight-bold text-uppercase ">Consulta medica de <?= h($quote->person->nombre) ?> <?= h($quote->person->apellido) ?></h3>
            <table class="table table-hover" style=" background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

">
        <?php endif; ?>

                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Asunto') ?></th>
                    <td  class="text-light h5 font-weight-bold"><?= h($quote->asunto) ?></td>
                </tr>
                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Nota') ?></th>
                    <td class="text-light h5 font-weight-bold"><?= h($quote->nota) ?></td>
                </tr>

                <?php if (empty($quote->person->nombre)): ?>

                <?php else: ?>
                <tr>

                <th class="text-light h5 font-weight-bold"><?= __('Titular') ?></th>

                <td class="text-light h5 font-weight-bold"><?= h($quote->person->nombre)?> <?= h($quote->person->apellido)?></td>

                </tr>
                <?php endif; ?>

                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Especialidad') ?></th>
                    <td class="text-light h5 font-weight-bold"><?= h($quote->specialty->descripcion)?></td>
                </tr>
                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Doctor') ?></th>
                    <td class="text-light h5 font-weight-bold">Dr. <?= h($quote->doctor->nombre) ?> <?= h($quote->doctor->apellido) ?></td>
                </tr>
                <?php if (empty($quote->beneficiary->nombre)): ?>

                <?php else: ?>
                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Beneficiario') ?></th>

                    <td class="text-light h5 font-weight-bold"><?= h($quote->beneficiary->nombre)?> <?= h($quote->beneficiary->apellido)?></td>

                </tr>
                <?php endif; ?>

                <tr>
                    <th class="text-light h5  font-weight-bold"><?= __('Estatus') ?></th>
                    <?php if ($quote->status_quote->descripcion == 'Finalizada'): ?>
                        <td class="h5 font-weight-bold text-uppercase font-weight-bold"><span class="badge badge-success"><?= h($quote->status_quote->descripcion) ?></span></td>
                    <?php else: ?>
                        <td class="h5 font-weight-bold text-uppercase font-weight-bold"><span class="badge badge-danger"><?= h($quote->status_quote->descripcion) ?></span></td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Fecha') ?></th>
                    <td class="text-light h5 font-weight-bold"><?= h($quote->fecha) ?></td>
                </tr>
                <tr>
                    <th class="text-light h5 font-weight-bold"><?= __('Hora') ?></th>
                    <td class="text-light h5 font-weight-bold"><?= h($quote->hora) ?></td>
                </tr>

            </table>

        </div>
    </div>
</div>
