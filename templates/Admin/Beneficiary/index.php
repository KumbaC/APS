<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiary[]|\Cake\Collection\CollectionInterface $beneficiary
 */
$session = $this->request->getSession();
$session = $this->request->getAttribute('session');

//$userName = $session->read('Auth.User.full_name');
?>
<div class="beneficiary index content">
   <!--  <//?= $this->Html->link(__('Añadir Beneficiario'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3 class="text-uppercase font-weight-bold"><i class="fas fa-users"></i> <?= __('Beneficiarios') ?></h3>
    <br>
    <!-- BUSCADOR -->
    <?= $this->Form->create(null,['type' => 'get']) ?>
    <div class="row">
        <div class="col-md-2">
        <?php echo $this->Form->control('key', ['class' => '', 'label' => '',  'placeholder' => 'Buscar' ]); ?>

        </div>
        <?= $this->Form->submit(__('Buscar'), ['class' => 'btn btn-primary btn-md', 'style' => 'margin-top: 21px; margin-left: -12px;' ]) ?>
    </div>

    <?= $this->Form->end() ?>
    <!-- BUSCADOR -->

    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead class="thead-light">
                <tr>

                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('person_id', 'Titular') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('nombre') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('apellido') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('kin_id', 'Parentesco') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('cedula') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('edad') ?></th>
                    <th class="text-center font-weight-bold"><?= $this->Paginator->sort('genero') ?></th>
                    <!-- <th class="text-center"><//?= $this->Paginator->sort('modified', 'Actualizado') ?></th> -->

                    <th class="text-center"><?= __('Añadir Consulta') ?></th>
                    <th class="actions text-center"><?= __('Editar') ?></th>
                    <th class="actions text-center"><?= __('Eliminar') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($beneficiary as $beneficiary): ?>
                <tr>


                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->person->nombre),  ' ',    h($beneficiary->person->apellido)?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->nombre) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->apellido) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->kin->descripcion) ?></td>
                    <td class="text-light text-center font-weight-bold">V-<?= h($beneficiary->cedula) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= $this->Number->format($beneficiary->edad) ?></td>
                    <td class="text-light text-center font-weight-bold"><?= h($beneficiary->gender->descripcion) ?></td>
                   <!--  <td class="text-center"><//?= h($beneficiary->modified) ?></td> -->



                        <!-- <?php if ($session->read('Auth.User.role_id') == 1):?>
                        <//?= $this->Html->link(__(''), ['action' => 'view', $beneficiary->id], ['class' => 'fas fa-eye btn btn-warning']) ?>
                        <?php endif; ?> -->
                        <td class="text-center">
                        <?php if ($session->read('Auth.User.role_id') == 1):?>

                        <?= $this->Html->link(__('+'), ['controller' => 'quotes', 'action' => 'addb', $beneficiary->id],['class' => 'fas fa-hospital btn btn-warning']) ?>

                        <?php endif; ?>
                        </td>
                        <td class="text-center">
                        <?php if ($session->read('Auth.User.role_id') == 1):?>

                        <?= $this->Html->link(__(''), ['action' => 'edit', $beneficiary->id], ['class' => 'fas fa-edit btn btn-warning']) ?>

                        <?php endif; ?>
                        </td>

                        <?php if ($session->read('Auth.User.role_id') == 1):?>
                            <td class="text-center">
                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $beneficiary->id],['confirm' => __('¿Esta seguro que desea eliminar a {0} {1}?', $beneficiary->nombre, $beneficiary->apellido), 'class' => 'fas fa-trash-alt btn btn-warning']) ?>
                            </td>
                        <?php endif; ?>



                </tr>
                <?php endforeach; ?>

            </tbody>

        </table>
        <div class="paginator">
        <ul class="pagination">
        <li class="page-item"><!-- <//?= $this->Paginator->first('<< ' . __('first')) ?> -->
            <?= $this->Paginator->prev(' ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' ') ?>
            <!-- <//?= $this->Paginator->last(__('last') . ' >>') ?> --> </li>
        </ul>

      </div>
    </div>

</div>
