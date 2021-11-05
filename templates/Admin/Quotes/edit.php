<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var string[]|\Cake\Collection\CollectionInterface $specialties
 * @var string[]|\Cake\Collection\CollectionInterface $diseases
 * @var string[]|\Cake\Collection\CollectionInterface $pathologies
 * @var string[]|\Cake\Collection\CollectionInterface $persons
 * @var string[]|\Cake\Collection\CollectionInterface $statusQuotes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-center text-uppercase font-weight-bold"> <i class="fas fa-tools"></i> <?= __('Opciones') ?></h4>

            <?= $this->Html->link(__('Lista de Consultas'), ['action' => 'index'], ['class' => 'font-weight-bold text-uppercase btn btn-danger side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="quotes form content card-body">
            <?= $this->Form->create($quote) ?>
            <fieldset>
                <legend class="text-center text-uppercase font-weight-bold "><i class="fas fa-file-medical"></i> <?= __('Moficar la consulta') ?></legend>
              <!--   <div class="form-row">
                   <div class="form-group col-md-6">
                  <?php   //echo $this->Form->control('asunto');   ?>
                  </div>

                  <div class="form-group col-md-6">
                  <?php   //echo $this->Form->control('nota');  ?>
                  </div></div>

                  <div class="form-row">
                   <div class="form-group col-md-6">
                  <?php   //echo $this->Form->control('specialty_id', ['options' => $specialties, 'empty' => true]); ?>
                  </div>
                  <div class="form-group col-md-6">
                  <?php   //echo $this->Form->control('pathology_id', ['options' => $pathologies, 'empty' => true]); ?>
                  </div></div>

                  <div class="form-row">
                   <div class="form-group col-md-6">
                  <?php   //echo $this->Form->control('fecha', ['empty' => true]); ?>
                  </div>
                  <div class="form-group col-md-6">
                  <?php   //echo $this->Form->control('hora', ['empty' => true]); ?>
                  </div></div>
 -->
                  <?php   echo $this->Form->control('status_quote_id', ['options' => $statusQuotes,  'label' => 'Estatus']); ?>


            </fieldset>
            <?= $this->Form->button(__('Modificar'), ['class' => 'font-weight-bold btn btn-success btn-block' ]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
