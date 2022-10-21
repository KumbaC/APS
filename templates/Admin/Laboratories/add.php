<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Laboratory $laboratory
 * @var \Cake\Collection\CollectionInterface|string[] $clinicalHistories
 * @var \Cake\Collection\CollectionInterface|string[] $biochemistry
 * @var \Cake\Collection\CollectionInterface|string[] $hematologies
 * @var \Cake\Collection\CollectionInterface|string[] $immunology
 * @var \Cake\Collection\CollectionInterface|string[] $parasitologies
 * @var \Cake\Collection\CollectionInterface|string[] $specials
 * @var \Cake\Collection\CollectionInterface|string[] $urinalysis
 */
?>
<style>
    .error{
     color:red;
     margin-left: 20px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <aside class="column">
<?= $this->Html->css('CakeLte./AdminLTE/plugins/summernote/summernote-bs4.css') ?>
<div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold ml-3"><i class="fas fa-tools"></i> <?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Laboratorios'), ['action' => 'index'], ['class' => 'side-nav-item btn btn-danger']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="laboratories form content">
        <div class="column-responsive column-80 card mx-auto" style="width: 700px; margin-top:-60px;">
            <div class="laboratories form content card-body">
            <?= $this->Form->create($laboratory, ['id' => 'form_laboratorios']) ?>
            <fieldset>
                <legend class="text-center font-weight-bold text-uppercase"><?= __('Examenes Paraclinicios') ?></legend>

                    <?php  //echo $this->Form->control('clinical_history_id', ['options' => $clinicalHistories, 'empty' => true]); ?>


                    <?php  echo $this->Form->control('descripcion', ['id' => 'descripcion', 'type' => 'textarea', 'label' => 'Observación']); ?>

                    <div class="row justify-content-center">
                    <div class="col-5">
                    <?php  echo $this->Form->control('biochemistry._ids', ['id' => 'bioquimica', 'options' => $biochemistry, 'label' => 'Bioquímica', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalParasitologia" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="col-6">
                    <?php  echo $this->Form->control('hematologies._ids', ['id' => 'hematologia', 'options' => $hematologies, 'label' => 'Hematologias', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalParasitologia" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    </div>

                    <div class="row justify-content-center">
                    <div class="col-5">
                    <?php  echo $this->Form->control('immunology._ids', ['id' => 'inmunologia','options' => $immunology, 'label' => 'Inmunologia', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalParasitologia" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="col-6">
                    <?php  echo $this->Form->control('parasitologies._ids', ['id' => 'parasitologia','options' => $parasitologies, 'label' => 'Parasitologias', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalParasitologia" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    </div>

                    <div class="row justify-content-center">
                    <div class="col-5">
                    <?php  echo $this->Form->control('specials._ids', ['id' => 'especiales','options' => $specials, 'label' => 'Especiales', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalParasitologia" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="col-6">
                    <?php  echo $this->Form->control('urinalysis._ids', ['id' => 'orina','options' => $urinalysis, 'label' => 'Análisis de Orina', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUrinalysis" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    </div>


            </fieldset>
            <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
               </div>
            </div>
        </div>
    </div>
   <!-- MODAL-PARASITOLOGIA -->
   <div class="modal fade" id="modalParasitologia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Parasitologia</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                       <div class="modal-body">
                         <form id="modal_antecedentes" name="modal_antecedentes">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Descripción:</label>
                          <input type="text" class="form-control" id="recipient-parasitologies">
                        </div>

                         </form>
                     </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" id="g_parasitologies">Guardar</button>
                         </div>
                    </div>
               </div>
             </div>
                <!-- MODAL-PARASITOLOGIA -->

                   <!-- MODAL-URINALYSIS -->
   <div class="modal fade" id="modalUrinalysis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Analisis de Orina</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                       <div class="modal-body">
                         <form id="modal_urinalysis" name="modal_urinalysis">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Descripción:</label>
                          <input type="text" class="form-control" id="recipient-urinalysis">
                        </div>

                         </form>
                     </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" id="g_urinalisys">Guardar</button>
                         </div>
                    </div>
               </div>
             </div>
                <!-- MODAL-URINALYSIS -->

<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.js') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/es.min.js" integrity="sha512-xntXNPHoIOoLxuqmYhDB6MA67yimB0HxKb20FTgBcAO7RUk2jwctNYIkencPjG4hdxde8ee6FHqACJqGYYSiSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery-validation/jquery.validate.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery-validation/additional-methods.min.js') ?>
<?= $this->Html->script("CakeLte./AdminLTE/plugins/summernote/summernote-bs4.js") ?>
<?= $this->Html->script("CakeLte./AdminLTE/plugins/summernote/lang/summernote-es-ES.js") ?>

<script>


 $('#g_parasitologies').click(function(){
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'parasitologies', 'action' => 'receive']); ?>',
            type: 'POST',
            data: {
                'descripcion': $('#recipient-parasitologies').val(),
               // '_csrfToken': $('input[name=_csrfToken]').val()
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#parasitologia').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#modalParasitologia').modal('hide');
                Swal.fire('Parasitologia guardada', 'Ya puede seleccionar este analisis para los examenes de laboratorio', 'success');
                //$('#recipient-diagnostico').reset();
            }
        });
    })


    $('#g_urinalisys').click(function(){
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'urinalysis', 'action' => 'receive']); ?>',
            type: 'POST',
            data: {
                'descripcion': $('#recipient-urinalysis').val(),
               // '_csrfToken': $('input[name=_csrfToken]').val()
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#orina').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#modalUrinalysis').modal('hide');
                Swal.fire('Análisis de Orina guardada', 'Ya puede seleccionar este analisis para los examenes de laboratorio', 'success');
                //$('#recipient-diagnostico').reset();
            }
        });
    })




$("#bioquimica").select2({
    width: 'resolve',
    theme: 'bootstrap', // need to override the changed default
    language: "es"
}),

$("#hematologia").select2({
    width: 'resolve',
    theme: 'bootstrap', // need to override the changed default
    language: "es"
});

$("#inmunologia").select2({
    width: 'resolve',
    theme: 'bootstrap', // need to override the changed default
    language: "es"
});

$("#parasitologia").select2({
    width: 'resolve',
    theme: 'bootstrap', // need to override the changed default
    language: "es"
});

$("#especiales").select2({
    width: 'resolve',
    theme: 'bootstrap', // need to override the changed default
    language: "es"
});

$("#orina").select2({
    width: 'resolve',
    theme: 'bootstrap', // need to override the changed default
    language: "es"
});

$(function () {
    // Summernote
    $('#descripcion').summernote({ lang: 'es-ES' })


    $(document).ready(function() {
        $('#descripcion').summernote({

        });

  });

});

/* $('#form_laboratorios').validate({
   rules: {
       descripcion: {
           required: true,
           minlength: 5
       },
         bioquimica: {
            required: true,
         },
         hematologia: {
            required: true,
         },
         inmunologia: {
            required: true,
         },
         parasitologia: {
            required: true,
         },
         especiales: {
            required: true,
         },
         orina: {
            required: true,
         },




       },

    messages: {
        descripcion: {
            required: "Por favor ingrese una descripcion",
            minlength: "La descripcion debe tener al menos 5 caracteres"
        },
        bioquimica: {
            required: "Por favor seleccione una opción",
        },
        hematologia: {
            required: "Por favor seleccione una opción",
        },
        inmunologia: {
            required: "Por favor seleccione una opción",
        },
        parasitologia: {
            required: "Por favor seleccione una opción",
        },
        especiales: {
            required: "Por favor seleccione una opción",
        },
        orina: {
            required: "Por favor seleccione una opción",
        },



    },

});*/
</script>
