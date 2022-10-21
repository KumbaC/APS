<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Quote'), ['action' => 'edit', $quote->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quote'), ['action' => 'delete', $quote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quotes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quote'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotes view content">
            <h3><?= h($quote->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Asunto') ?></th>
                    <td><?= h($quote->asunto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nota') ?></th>
                    <td><?= h($quote->nota) ?></td>
                </tr>
                <tr>
                    <th><?= __('Specialty') ?></th>
                    <td><?= $quote->has('specialty') ? $this->Html->link($quote->specialty->descripcion, ['controller' => 'Specialties', 'action' => 'view', $quote->specialty->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Doctor') ?></th>
                    <td><?= $quote->has('doctor') ? $this->Html->link($quote->doctor->id, ['controller' => 'Doctors', 'action' => 'view', $quote->doctor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Beneficiary') ?></th>
                    <td><?= $quote->has('beneficiary') ? $this->Html->link($quote->beneficiary->id, ['controller' => 'Beneficiary', 'action' => 'view', $quote->beneficiary->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $quote->has('person') ? $this->Html->link($quote->person->id, ['controller' => 'Persons', 'action' => 'view', $quote->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status Quote') ?></th>
                    <td><?= $quote->has('status_quote') ? $this->Html->link($quote->status_quote->descripcion, ['controller' => 'StatusQuotes', 'action' => 'view', $quote->status_quote->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($quote->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($quote->fecha) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hora') ?></th>
                    <td><?= h($quote->hora) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($quote->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($quote->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Prescriptions') ?></h4>
                <?php if (!empty($quote->prescriptions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Beneficiary Id') ?></th>
                            <th><?= __('Doctor Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Quote Id') ?></th>
                            <th><?= __('Clinic History Id') ?></th>
                            <th><?= __('Fecha') ?></th>
                            <th><?= __('Indicaciones') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($quote->prescriptions as $prescriptions) : ?>
                        <tr>
                            <td><?= h($prescriptions->id) ?></td>
                            <td><?= h($prescriptions->person_id) ?></td>
                            <td><?= h($prescriptions->beneficiary_id) ?></td>
                            <td><?= h($prescriptions->doctor_id) ?></td>
                            <td><?= h($prescriptions->descripcion) ?></td>
                            <td><?= h($prescriptions->quote_id) ?></td>
                            <td><?= h($prescriptions->clinic_history_id) ?></td>
                            <td><?= h($prescriptions->fecha) ?></td>
                            <td><?= h($prescriptions->indicaciones) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Prescriptions', 'action' => 'view', $prescriptions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Prescriptions', 'action' => 'edit', $prescriptions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Prescriptions', 'action' => 'delete', $prescriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prescriptions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
