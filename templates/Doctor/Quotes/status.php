<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var string[]|\Cake\Collection\CollectionInterface $specialties
 * @var string[]|\Cake\Collection\CollectionInterface $doctors
 * @var string[]|\Cake\Collection\CollectionInterface $beneficiary
 * @var string[]|\Cake\Collection\CollectionInterface $persons
 * @var string[]|\Cake\Collection\CollectionInterface $statusQuotes
 *
 */

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"> <i class="fas fa-tools"></i> <?= __('Opciones') ?></h4>

            <?= $this->Html->link(__('Lista de consultas'), ['action' => 'index'], ['class' => 'btn btn-danger text-uppercase font-weight-bold side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="quotes form content card-body">
            <?= $this->Form->create($quote) ?>
            <fieldset>
                <legend class="text-uppercase font-weight-bold"><?= __('Estatus de la consulta') ?></legend>


                <div class="form-row">
                    <div class="col">
                        <div class="form-control-inline">
                            <?php if($this->request->getSession()->read('Auth.User.role_id') == 4): ?>
                            
                                <?php echo $this->Form->control('status_quote_id', ['options' => $statusApoyo, 'label' => '']); ?>

                            <?php elseif($this->request->getSession()->read('Auth.User.role_id') == 3): ?>
                            
                                <?php echo $this->Form->control('status_quote_id', ['options' => $statusQuotes, 'label' => '']); ?>
                            
                            <?php endif; ?>
                      </div>
                    </div>
                </div>


            </fieldset>
            <?= $this->Form->button(__('Cambiar'), ['class' => 'font-weight-bold text-uppercase btn btn-block btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
