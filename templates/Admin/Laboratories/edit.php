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

<?= $this->Html->css('CakeLte./AdminLTE/plugins/summernote/summernote-bs4.css') ?>
<?= $this->Html->css("CakeLte./AdminLTE/plugins/select2/css/select2.css") ?>

    
    <div class="column-responsive column-80">
        <div class="laboratories form content">
        <div class="column-responsive column-80 card mx-auto" style="width: 700px;">
            <div class="laboratories form content card-body">
            <?= $this->Form->create($laboratory, ['id' => 'form_laboratorios']) ?>
            <fieldset>
                <legend class="text-center font-weight-bold text-uppercase"><?= __('Examenes Paraclinicios') ?></legend>

                    <?php  //echo $this->Form->control('clinical_history_id', ['options' => $clinicalHistories, 'empty' => true]); ?>


                    <?php  echo $this->Form->control('descripcion', ['id' => 'descripcion', 'type' => 'textarea', 'label' => 'Examenes Paraclinicos']); ?>

                    <h6 id="maxContentPost" style="text-align:right"></h6>
                   <!--  <div class="row justify-content-center">
                    <div class="col-5">
                    < ?php  echo $this->Form->control('biochemistry._ids', ['id' => 'bioquimica', 'options' => $biochemistry, 'label' => 'Bioquímica', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalBioquimica" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="col-6">
                    < ?php  echo $this->Form->control('hematologies._ids', ['id' => 'hematologia', 'options' => $hematologies, 'label' => 'Hematologias', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalHematologia" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    </div>

                    <div class="row justify-content-center">
                    <div class="col-5">
                    < ?php  echo $this->Form->control('immunology._ids', ['id' => 'inmunologia','options' => $immunology, 'label' => 'Inmunologia', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalInmunologia" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="col-6">
                    < ?php  echo $this->Form->control('parasitologies._ids', ['id' => 'parasitologia','options' => $parasitologies, 'label' => 'Parasitologias', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalParasitologia" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    </div>

                    <div class="row justify-content-center">
                    <div class="col-5">
                    < ?php  echo $this->Form->control('specials._ids', ['id' => 'especiales','options' => $specials, 'label' => 'Especiales', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEspeciales" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="col-6">
                    < ?php  echo $this->Form->control('urinalysis._ids', ['id' => 'orina','options' => $urinalysis, 'label' => 'Análisis de Orina', 'title' => 'Seleccione al menos una opción']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUrinalysis" data-whatever="@mdo" style="margin-top:-5.6rem; margin-left:-26px;"><i class="fas fa-plus"></i></button>
                    </div>
                    </div>
 -->

            </fieldset>
            <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-primary btn-block text-uppercase font-weight-bold']) ?>
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

  
                 <!-- MODAL-INMUNOLOGIA -->
   <div class="modal fade" id="modalInmunologia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Inmunologia</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                       <div class="modal-body">
                         <form id="modal_inmunologia" name="modal_inmunologia">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Descripción:</label>
                          <input type="text" class="form-control" id="recipient-inmunologia">
                        </div>

                         </form>
                     </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" id="g_inmunologia">Guardar</button>
                         </div>
                    </div>
               </div>
             </div>
                <!-- MODAL-INMUNOLOGIA -->

                     <!-- MODAL-BIOQUIMICA -->
   <div class="modal fade" id="modalBioquimica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Bioquimica</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                       <div class="modal-body">
                         <form id="modal_bioquimica" name="modal_bioquimica">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Descripción:</label>
                          <input type="text" class="form-control" id="recipient-bioquimica">
                        </div>

                         </form>
                     </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" id="g_bioquimica">Guardar</button>
                         </div>
                    </div>
               </div>
             </div>
                <!-- MODAL-BIOQUIMICA -->

                     <!-- MODAL-HEMATOLOGIA -->
   <div class="modal fade" id="modalHematologia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hematologia</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                       <div class="modal-body">
                         <form id="modal_hematologia" name="modal_hematologia">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Descripción:</label>
                          <input type="text" class="form-control" id="recipient-hematologia">
                        </div>

                         </form>
                     </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" id="g_hematologia">Guardar</button>
                         </div>
                    </div>
               </div>
             </div>
                <!-- MODAL-HEMATOLOGIA -->


                     <!-- MODAL-ESPECIALES -->
   <div class="modal fade" id="modalEspeciales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Especiales</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                       <div class="modal-body">
                         <form id="modal_especiales" name="modal_urinalysis">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Descripción:</label>
                          <input type="text" class="form-control" id="recipient-especiales">
                        </div>

                         </form>
                     </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" id="g_especiales">Guardar</button>
                         </div>
                    </div>
               </div>
             </div>
                <!-- MODAL-ESPECIALES -->


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
<?= $this->Html->script("CakeLte./AdminLTE/plugins/select2/js/select2.js") ?>
<?= $this->Html->script("CakeLte./AdminLTE/plugins/select2/js/i18n/es.js") ?>
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
                //'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#parasitologia').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#modalParasitologia').modal('hide');
                Swal.fire('Parasitologia guardada', 'Ya puede seleccionar este analisis para los examenes de laboratorio', 'success');
                //$('#recipient-diagnostico').reset();
            }
        });
    })


    $('#g_especiales').click(function(){
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'Specials', 'action' => 'receive']); ?>',
            type: 'POST',
            data: {
                'descripcion': $('#recipient-especiales').val(),
               // '_csrfToken': $('input[name=_csrfToken]').val()
            },
            headers: {
                //'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#especiales').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#modalEspeciales').modal('hide');
                Swal.fire('Especiales guardado', 'Ya puede seleccionar examenes especiales', 'success');
                //$('#recipient-diagnostico').reset();
            }
        });
    })

    $('#g_inmunologia').click(function(){
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'Immunology', 'action' => 'receive']); ?>',
            type: 'POST',
            data: {
                'descripcion': $('#recipient-inmunologia').val(),
               // '_csrfToken': $('input[name=_csrfToken]').val()
            },
            headers: {
                //'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#inmunologia').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#modalInmunologia').modal('hide');
                Swal.fire('Inmunologia guardada', 'Ya puede seleccionar este tipo de inmunologia para los examenes de laboratorio', 'success');
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
                //'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#orina').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#modalUrinalysis').modal('hide');
                Swal.fire('Análisis de Orina guardada', 'Ya puede seleccionar este analisis para los examenes de laboratorio', 'success');
                //$('#recipient-diagnostico').reset();
            }
        });
    })


    $('#g_bioquimica').click(function(){
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'Biochemistry', 'action' => 'receive']); ?>',
            type: 'POST',
            data: {
                'descripcion': $('#recipient-bioquimica').val(),
               // '_csrfToken': $('input[name=_csrfToken]').val()
            },
            headers: {
                //'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#bioquimica').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#modalBioquimica').modal('hide');
                Swal.fire('Bioquimica guardada', 'Ya puede seleccionar este analisis bioquimico para laboratorio', 'success');
                //$('#recipient-diagnostico').reset();
            }
        });
    })

    $('#g_hematologia').click(function(){
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'Hematologies', 'action' => 'receive']); ?>',
            type: 'POST',
            data: {
                'descripcion': $('#recipient-hematologia').val(),
               // '_csrfToken': $('input[name=_csrfToken]').val()
            },
            headers: {
                //'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#hematologia').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#modalHematologia').modal('hide');
                Swal.fire('Hematologia guardada', 'Ya puede seleccionar este analisis hematologico para laboratorio', 'success');
                //$('#recipient-diagnostico').reset();
            }
        });
    })






$("#bioquimica").select2({
    width: 'resolve',
    theme: 'default', // need to override the changed default
    language: "es"
}),

$("#hematologia").select2({
    width: 'resolve',
    theme: 'default', // need to override the changed default
    language: "es"
});

$("#inmunologia").select2({
    width: 'resolve',
    theme: 'default', // need to override the changed default
    language: "es"
});

$("#parasitologia").select2({
    width: 'resolve',
    theme: 'default', // need to override the changed default
    language: "es"
});

$("#especiales").select2({
    width: 'resolve',
    theme: 'default', // need to override the changed default
    language: "es"
});

$("#orina").select2({
    width: 'resolve',
    theme: 'default', // need to override the changed default
    language: "es"
});

$(function () {
    // Summernote
    $('#descripcion').summernote({ lang: 'es-ES', 
    
        toolbar: [
                  ['style', ['bold', 'italic', 'underline', 'clear', 'list']], 
                  ['para', ['ul', 'ol', 'paragraph']], 
                  ['height', ['height']],
                  ['fontsize', ['fontsize']],
                  
                

            ],
                
                placeholder: 'Escriba lo necesario para los exámenes paraclínicos ...',
                callbacks: {
                    onKeydown: function (e) { 
                        var t = e.currentTarget.innerText; 
                        if (t.trim().length >= 400) {
                            //delete keys, arrow keys, copy, cut, select all
                            if (e.keyCode != 8 && !(e.keyCode >=37 && e.keyCode <=40) && e.keyCode != 46 && !(e.keyCode == 88 && e.ctrlKey) && !(e.keyCode == 67 && e.ctrlKey) && !(e.keyCode == 65 && e.ctrlKey))
                            e.preventDefault(); 
                        } 
                    },
                    onKeyup: function (e) {
                        var t = e.currentTarget.innerText;
                        $('#maxContentPost').text(400 - t.trim().length);
                    },
                    onPaste: function (e) {
                        var t = e.currentTarget.innerText;
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        var maxPaste = bufferText.length;
                        if(t.length + bufferText.length > 400){
                            maxPaste = 400 - t.length;
                        }
                        if(maxPaste > 0){
                            document.execCommand('insertText', false, bufferText.substring(0, maxPaste));
                        }
                        $('#maxContentPost').text(400 - t.length);
                    }
                }
            });
        
    })


    $(document).ready(function() {
        $('#descripcion').summernote({

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
