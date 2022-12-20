<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersDoctor $usersDoctor
 */
?>
    <div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista usuarios'), ['action' => 'index'], ['class' => 'side-nav-item text-uppercase font-weight-bold btn btn-danger']) ?>
            
        </div>
    </aside>
    </div>

    <div class="row d-flex justify-content-center card">
    <div class="column-responsive column-80 card-body">
        <div class="usersDoctors view content">
            <h3><?= h($usersDoctor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= h($usersDoctor->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Perfil') ?></th>
                    <td><?= h($usersDoctor->role->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha de creacion') ?></th>
                    <td><?= h($usersDoctor->created) ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Fecha de Modificación') ?></th>
                    <td><?= h($usersDoctor->modified) ?></td>
                </tr>



            </table>
        </div>
    </div>
</div>
