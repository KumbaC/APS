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

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css" integrity="sha512-7/BfnxW2AdsFxJpEdHdLPL7YofVQbCL4IVI4vsf9Th3k6/1pu4+bmvQWQljJwZENDsWePEP8gBkDKTsRzc5uVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Informes Medicos'), ['action' => 'index'], ['class' => 'btn btn-danger side-nav-item']) ?>
        </div>
    </aside>


<br> <br>
    <div class="column-responsive column-80 card mx-auto col-md-5">
        <div class="clinicalHistories form content card-body">
            <?= $this->Form->create($clinicalHistory, ['id' => 'form_historia']) ?>
            <fieldset>

            <h3 class="text-uppercase font-weight-bold text-center"> <i class="fas fa-book-medical"></i> INFORME MEDICO </h3>
                <br>


                <div class="row">
                        <div class="col">
                    <?php  echo $this->Form->control('habits._ids', ['id' => 'habitos', 'label' => 'Habitos (Opcional)', 'options' => $habits, 'json_decode' => true]); ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top:-20px;">+</button>
                    </div>






                    <div class="col">
                    <?php  echo $this->Form->control('medicals_antecedents._ids', ['id' => 'antecedente','label' => 'Antecedentes medicos (Opcional)', 'options' => $medicalsAntecedents]); ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAntecedentes" data-whatever="@mdo" style="margin-top:-20px;">+</button>
                    </div></div>








                    <div class="row">
                        <div class="col">
                    <?php echo $this->Form->control('blood_type_id', ['id' => 'blood', 'label' => 'Tipo de Sangre', 'options' => $bloodTypes, 'empty' => 'DESCONOCIDO','style' => 'width:280px;']); ?>
                    </div>


                    <div class="col">
                    <?php  echo $this->Form->control('diagnoses._ids', ['id' => 'diagnostico', 'label' => 'Diagnostico', 'options' => $diagnoses, 'title'=>'Seleccione un diagnostico', 'class' => 'required']); ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDiagnoses" data-whatever="@mdo" style="margin-top:-20px;">+</button>
                    </div></div>



                    <!-- <div class="col-md-12">
                    <?php //echo $this->Form->control('type_of_diagnosis', ['label' => 'Comentario de Diagnostico (Opcional)', 'id' => 'type_of_diagnosis', 'hidden' => 'false', 'type' => 'textarea',]); ?>
                    </div> -->


                <hr class="font-weight-bold"> <br>

                <h4 class="text-uppercase font-weight-bold text-center">Examen Fisico</h4>
                    <div class="row">
                        <div class="col-md-6">
                   <?php echo $this->Form->control('peso', ['id' => 'Peso', 'label' => 'Peso', 'placeholder' => '60 kg', 'required']); ?>
                   </div>
                   <div class="col">
                   <?php echo $this->Form->control('altura', ['id' => 'Altura', 'label' => 'Altura', 'placeholder' => '1.70 m', 'required']); ?>
                   </div></div>

                   <div class="row">
                        <div class="col">
                   <?php echo $this->Form->control('fr', ['id' => 'FR', 'label' => 'FR', ]); ?>
                   </div>
                   <div class="col">
                   <?php echo $this->Form->control('fc', ['id' => 'FC','label' => 'FC', ]); ?>
                   </div></div>

                   <?php echo $this->Form->control('ta', ['id' => 'TA', 'label' => 'TA' , ]); ?>

                        <!-- < ?php $imc_c = ?> -->
            
                    <?php echo $this->Form->control('imc', ['id' => 'IMC', 'label' => 'IMC', 'class' => 'disabled', 'readonly']); ?>

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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

//submitHandler: function() {

//alert('Form Submitted!');
// $(form).ajaxSubmit();


//},
rules: {
   /*  blood: {
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
        digits: false
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
            number:  "Por favor, solo datos numericos",
            digits: 'Por favor ingrese digitos'
            
    },


  }
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
