<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClinicalHistory $clinicalHistory
 * @var \Cake\Collection\CollectionInterface|string[] $persons
 * @var \Cake\Collection\CollectionInterface|string[] $beneficiary
 * @var \Cake\Collection\CollectionInterface|string[] $bloodTypes
 * @var \Cake\Collection\CollectionInterface|string[] $doctors
 * @var \Cake\Collection\CollectionInterface|string[] $diagnoses
 * @var \Cake\Collection\CollectionInterface|string[] $habits
 * @var \Cake\Collection\CollectionInterface|string[] $medicalsAntecedents
 */
?>
<style>
 .error{
    color:red;
 }
 .select2-container{
        width: 100% !important;
    }
    .control-label {
        width: 100%;
    }
 
</style>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/select2/css/select2.css') ?>
<?= $this->Html->css('CakeLte./AdminLTE/plugins/summernote/summernote-bs4.css') ?>
<div class="row">
   


<br> <br>
    <div class="column-responsive column-80 card mx-auto col-md-10">
        <div class="clinicalHistories form content card-body">
            <?= $this->Form->create($clinicalHistory, ['id' => 'form_historia']) ?>
            <fieldset>

            <h3 class="text-uppercase font-weight-bold text-center"> <i class="fas fa-book-medical"></i> INFORME MEDICO </h3>
                <br>
                    <div class="col-md-12">
                     <?php echo $this->Form->control('type_of_diagnosis', ['label' => 'Motivo de la consulta', 'id' => 'motivo', 'type' => 'textarea']); ?>
                    </div>

                    <label>Tipo de Sangre</label>
                             <?php echo $this->Form->control('blood_type_id', ['id' => 'blood', 'label' => false, 'options' => $bloodTypes, 'empty' => 'DESCONOCIDO']); ?>



                      <div class="row">
                        <div class="col-md-6">
                         <label>Habitos (Opcional)</label>
                         <?php  echo $this->Form->control('habits._ids', ['id' => 'habitos', 'label' => false,  'options' => $habits, 'json_decode' => true]); ?>
                         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top:-5.4rem; margin-left:-30px;"><i class="fas fa-plus"></i></button>
                        </div>

                       <div class="col">
                        <label>Antecedentes medicos (Opcional)</label>
                        <?php  echo $this->Form->control('medicals_antecedents._ids', ['id' => 'antecedente', 'label' => false, 'options' => $medicalsAntecedents]); ?>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAntecedentes" data-whatever="@mdo" style="margin-top:-5.5rem; margin-left:-30px;"><i class="fas fa-plus"></i></button>
                       </div>
                     </div>








                   
        
                    
                        <label>Diagnosticos</label>
                    <?php  echo $this->Form->control('diagnoses._ids', ['id' => 'diagnostico', 'label' => false, 'options' => $diagnoses, 'title'=>'Seleccione un diagnostico', 'class' => 'required']); ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalDiagnoses" data-whatever="@mdo" style="margin-top:-5.5rem; margin-left:-30px;"><i class="fas fa-plus"></i></button>
                    
                   

                   <!--  <?php //echo $this->Form->control('type', ['id' => 'Peso', 'label' => 'Peso', 'placeholder' => '60 kg', 'required']); ?> -->




                <hr class="font-weight-bold"> <br>

                <h4 class="text-uppercase font-weight-bold text-center">Examen Fisico</h4>
                    <div class="row">
                        <div class="col-md-6">
                   <?php echo $this->Form->control('peso', ['id' => 'Peso', 'label' => 'Peso', 'placeholder' => '60 kg', 'required']); ?>
                   </div>
                   <div class="col">
                   <?php echo $this->Form->control('altura', ['id' => 'Altura', 'type' => 'text', 'label' => 'Altura', 'placeholder' => '1.70 mt', 'required']); ?>
                   </div></div>

                   <div class="row">
                        <div class="col">
                   <?php echo $this->Form->control('fr', ['id' => 'FR', 'label' => 'FR', ]); ?>
                   </div>
                   <div class="col">
                   <?php echo $this->Form->control('fc', ['id' => 'FC','label' => 'FC', ]); ?>
                   </div></div>

                   <div class="row">
                   <div class="col">
                   <?php echo $this->Form->control('ta', ['id' => 'TA', 'label' => 'TA' , ]); ?>
                   </div>
                   <div class="col">
                   <?php echo $this->Form->control('imc', ['id' => 'IMC', 'label' => 'IMC' ,'disabled']); ?>
                   </div></div>
                   <?php echo $this->Form->control('lpm', ['id' => 'LPM', 'label' => 'LPM' , ]); ?>

            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary btn-block', 'type'=>'submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

   <!-- MODAL-ANTECEDENTES -->
   <div class="modal fade" id="modalAntecedentes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Nuevo Antecedente</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                       <div class="modal-body">
                         <form id="modal_antecedentes" name="modal_antecedentes">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Descripción:</label>
                          <input type="text" class="form-control" id="recipient-antecedente">
                        </div>

                         </form>
                     </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" id="g_antecedente">Guardar</button>
                         </div>
                    </div>
               </div>
             </div>
                <!-- MODAL-ANTECEDENTES -->


 <!-- MODAL-DIAGNOSTICOS -->
 <div class="modal fade" id="modalDiagnoses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Nuevo Diagnostico
                          </h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                       <div class="modal-body">
                         <form id="modal_diagnostico" name="modal_diagnostico">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Descripción:</label>
                          <input type="text" class="form-control" id="recipient-diagnostico">
                        </div>

                         </form>
                     </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" id="g_diagnostico">Guardar</button>
                         </div>
                    </div>
               </div>
             </div>
                <!-- MODAL-DIAGNOSTICOS -->



                  <!-- MODAL-HABITOS -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Nuevo Habito</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                       <div class="modal-body">
                         <form id="modal_habito" name="modal_habito">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Descripción:</label>
                          <input type="text" class="form-control" id="recipient-name">
                        </div>

                         </form>
                     </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" id="g_habito">Guardar</button>
                         </div>
                    </div>
               </div>
             </div>
                <!-- MODAL-HABITOS -->



<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery-validation/jquery.validate.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery-validation/additional-methods.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/select2/js/select2.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.all.js') ?>
<?= $this->Html->script("CakeLte./AdminLTE/plugins/summernote/summernote-bs4.js") ?>
<?= $this->Html->script("CakeLte./AdminLTE/plugins/summernote/lang/summernote-es-ES.js") ?>


<script>


    $('#g_habito').click(function(){
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'Habits', 'action' => 'receive']); ?>',
            type: 'POST',
            data: {
                'descripcion': $('#recipient-name').val(),
               // '_csrfToken': $('input[name=_csrfToken]').val()
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#habitos').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#exampleModal').modal('hide');
                Swal.fire('Habito guardado', 'Ya puede seleccionar este habito para la historia clinica', 'success');
            }
        });
    });

//$(function(){
    $('#g_antecedente').click(function(){
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'MedicalsAntecedents', 'action' => 'receive']); ?>',
            type: 'POST',
            data: {
                'descripcion': $('#recipient-antecedente').val(),
               // '_csrfToken': $('input[name=_csrfToken]').val()
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#antecedente').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#modalAntecedentes').modal('hide');
                Swal.fire('Antecedente guardado', 'Ya puede seleccionar este antecedente para la historia clinica', 'success');
            }
        });
        })
   // });

//$(function(){
    $('#g_diagnostico').click(function(){
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'diagnoses', 'action' => 'receive']); ?>',
            type: 'POST',
            data: {
                'descripcion': $('#recipient-diagnostico').val(),
               // '_csrfToken': $('input[name=_csrfToken]').val()
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data){
                $('#diagnostico').append('<option value="'+data.id+'">'+data.descripcion+'</option>');
                $('#modalDiagnoses').modal('hide');
                Swal.fire('Diagnostico guardado', 'Ya puede seleccionar este diagnostico para la historia clinica', 'success');
                //$('#recipient-diagnostico').reset();
            }
        });
        })
    //});


$("#habitos").select2({
    tags: false,
    tokenSeparators: [',', ' '],
    placeholder: "Seleccione los habitos",
    theme: "classic",
    allowClear: true,
    width: 'resolve',

})


$("#antecedente").select2({
    tags: true,
    tokenSeparators: [',', ' '],
    placeholder: "Seleccione los antecedentes medicos",
    theme: "classic",
    allowClear: true,
    width: 'resolve',

})

$("#diagnostico").select2({
    language: "es",
    maximumSelectionLength: 3,
    placeholder: "Escriba su diagnostico",
    empty: "Escriba su diagnostico",
    theme: "classic",
    allowClear: true,
    width: 'resolve',

})

$("#blood").select2({
    placeholder: "Seleccione su tipo de sangre",
    allowClear: true,
    width: 'resolve',
    theme: "classic",
})

$('form#form_historia').validate({

rules: {
  /*   blood: {
        required: true
    }, */

    diagnostico: {
        required: true,

    },

    peso: {
        required: true,
        min:1,
        max:600,
    },

    altura: {
        required: true,
        number:true,
        
    },


  },


messages: {
    /* blood: {
        required: "Por favor seleccione un tipo de sangre"
    }, */

    diagnostico: {

        required: "Por favor seleccione un diagnostico",


    },

    peso: {
       required: "Por favor ingrese el peso",
         min: "Peso invalido"
    },

    altura: {
       required: "Por favor ingrese la estatura",
       number: 'Por favor, solo datos numericos'
    },


  }
});

$(function () {
    // Summernote
    $('#motivo').summernote({ lang: 'es-ES' })


    $(document).ready(function() {
    $('#motivo').summernote({
        height: 300,
        width:300,
        codemirror:{
            theme: 'lumen'
        }

        });
    });


  });


  /* $('[data-action=save]').click(function(e){
        e.stopPropagation();
        $('form#form_historia').submit(); */



/* }); */






//});
  



/* CALCULO DE IMC */
   
    kg = document.getElementById("Peso");
	m = document.getElementById("Altura");

	imc = document.getElementById("IMC");
	lectura = document.getElementById("IMC");
    fr = document.getElementById('FR');
    
    m.onchange = function(){
		if(kg.value!="" && m.value!=""){
			imcx = (kg.value / (m.value* m.value));
			imc.value = imcx.toFixed(2);
        }
        else if(imc.value == NaN){
            imc.value = 'Por favor el campo altura lleva coma (,)'
        
		}else{
            imc.value = 'Por favor llene el campo peso.'
        }

	};

    kg.onchange = function(){
		if(kg.value!="" && m.value!=""){
			imcx = (kg.value / (m.value* m.value));
			imc.value = imcx.toFixed(2);
		}else{
            imc.value = 'Por favor llene el campo altura.'
        }

	};
/* CALCULO DE IMC */


</script>
