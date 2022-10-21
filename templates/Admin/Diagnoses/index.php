<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosis[]|\Cake\Collection\CollectionInterface $diagnoses
 */


?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/fontawesome.css') ?>


<div class="diagnoses index content">
    <?= $this->Html->link(__(''), ['action' => 'add'], ['class' => 'fas-lg fas fa-plus-circle btn btn-warning btn-lg float-right', 'style' => 'border-radius:30px;']) ?>
    <h3 class="text-uppercase font-weight-bold"> <i class="fas fa-comment-medical"></i> <?= __('Diagnosticos') ?></h3>

    <!-- BUSCADOR -->
    <!-- <?//= $this->Form->create(null,['type' => 'get']) ?> -->
    <!-- <div class="row">
        <div class="col-md-2">
        <?php //echo $this->Form->control('key', ['class' => '', 'label' => '',  'placeholder' => 'Buscar' ]); ?>

        </div>
        <?//= $this->Form->submit(__('Buscar'), ['class' => 'btn btn-primary btn-md', 'style' => 'margin-top: 21px; margin-left: -14px;' ]) ?>
    </div> -->

    <!-- <?//S= $this->Form->end() ?> -->
    <!-- BUSCADOR -->
    <div class="card bg-dark table-responsive">
        <table class="table table-dark table-bordered" id="diagnostico" style="border-radius: 15px 15px 15px 15px !important;">
            <thead class="thead thead-light">
                <tr>
                    <th><?= h('ID') ?></th>
                    <th class="font-weight-bold">DESCRIPCIÓN</th>
                    <th class="actions text-center"><?= __('OPCIONES') ?></th>
                </tr>
            </thead>
            <tbody>

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

$('#diagnostico').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    'responsive': true,
    'autoWidth': false,
    'processing': true,
    //'serverSide': true,


    ajax: {
            url: '<?php echo $this->Url->build(['controller' => 'Diagnoses', 'action' => 'loadEmployees']); ?>', // json datasource

            type: "post",
            data:  function (d) {
             console.log(d.order);
            return JSON.stringify( d );
      }


            //['descripcion'],

          },
          columns: [
            { data: "id" },
            { data: "descripcion" },
            { data: 'acciones' },
            

          ],
          columnDefs: [
        { targets: [0], visible: false},
        //{ targets: '_all', visible: false }
    ]
});






$(".elimi_diagnoses").attr("onclick", "").unbind("click"); //remove function onclick button

$(document).on('click', '.elimi_diagnoses', function () {
    let delete_form = $(this).parent().find('form');
    swal.fire({
        title: "¿Desea eliminar este diagnostico?",
        text: "Una vez eliminado, no se podra recuperar el diagnostico.",
        icon: "warning",
        confirmButtonText: 'Si, eliminar',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',

    }).then((result) => {
            if (result.value) {

                /* swal.fire(
                    '¡Eliminado!',
                    'El recipe ha sido eliminado.',
                    'success'
                ) */
                delete_form.submit();

            }else{

                    swal.fire(
                    'Cancelado',
                    'La eliminación del diagnostico, ha sido cancelada.',
                    'error'
                )

            }
        });
});




</script>
