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

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Historia Clinicas'), ['action' => 'index'], ['class' => 'btn btn-danger side-nav-item']) ?>
        </div>
    </aside>


<br> <br>
    <div class="column-responsive column-80 card mx-auto col-md-5">
        <div class="clinicalHistories form content card-body">
            <?= $this->Form->create($clinicalHistory, ['id' => 'form_historia']) ?>
            <fieldset>

            <h3 class="text-uppercase font-weight-bold text-center"> <i class="fas fa-book-medical"></i> HISTORIA CLINICA </h3>
                <br>


                <div class="row">
                        <div class="col">
                    <?php  echo $this->Form->control('habits._ids', ['id' => 'habitos', 'label' => 'Habitos (Opcional)', 'options' => $habits]); ?>
                    </div>
                    <div class="col">
                    <?php  echo $this->Form->control('medicals_antecedents._ids', ['id' => 'antecedente','label' => 'Antecedentes medicos (Opcional)', 'options' => $medicalsAntecedents]); ?>
                    </div></div>


                    <div class="row">
                        <div class="col">
                    <?php echo $this->Form->control('blood_type_id', ['id' => 'blood', 'label' => 'Tipo de Sangre', 'options' => $bloodTypes, 'empty' => 'DESCONOCIDO', 'class'=>'required', 'title'=>'Selecciona el tipo de sangre', 'style' => 'width:280px;']); ?>
                    </div>
                    <div class="col">
                    <?php  echo $this->Form->control('diagnoses._ids', ['id' => 'diagnostico', 'label' => 'Diagnostico', 'options' => $diagnoses, 'title'=>'Selecciona el diagnostico']); ?>
                    </div></div>


                    <div class="col-md-12">
                    <?php echo $this->Form->control('type_of_diagnosis', ['label' => 'Comentario de Diagnostico (Opcional)', 'id' => 'type_of_diagnosis', 'hidden' => 'false', 'type' => 'textarea',]); ?>
                    </div>


                <hr class="font-weight-bold"> <br>

                <h4 class="text-uppercase font-weight-bold text-center">Examen Fisico</h4>
                    <div class="row">
                        <div class="col-md-6">
                   <?php echo $this->Form->control('peso', ['id' => 'Peso', 'label' => 'Peso', 'placeholder' => '60 kg', 'required']); ?>
                   </div>
                   <div class="col">
                   <?php echo $this->Form->control('altura', ['id' => 'Altura', 'label' => 'Altura', 'placeholder' => '1,70 mt', 'required']); ?>
                   </div></div>

                   <div class="row">
                        <div class="col">
                   <?php echo $this->Form->control('fr', ['id' => 'FR', 'label' => 'FR', ]); ?>
                   </div>
                   <div class="col">
                   <?php echo $this->Form->control('fc', ['id' => 'FC','label' => 'FC', ]); ?>
                   </div></div>

                   <?php echo $this->Form->control('ta', ['id' => 'TA', 'label' => 'TA' , ]); ?>

            </fieldset>
            <?= $this->Form->button(__('Guardar Historia Medica'), ['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$("#habitos").select2({
    tags: true,
    tokenSeparators: [',', ' '],
    placeholder: "Seleccione los habitos",
    theme: "classic",
    allowClear: true,
    width: 'resolve',

    createTag: function (params) {
    var term = $.trim(params.term);

    if (term === '') {
      return null;
    }

    return {
      id: term,
      text: term,
      newTag: true // add additional parameters
    }
  }
})

$("#antecedente").select2({
    tags: true,
    tokenSeparators: [',', ' '],
    placeholder: "Seleccione los antecedentes medicos",
    theme: "classic",
    allowClear: true,
    width: 'resolve',

    createAntecedente: function (params) {
    // Don't offset to create a tag if there is no @ symbol
    if (params.term.indexOf('@') === -1) {
      // Return null to disable tag creation
      return null;
    }

    return {
      id: params.term,
      descripcion: params.term
    }
  }
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
    background: '#2E4C6D',
})

var type_diagnostico = document.getElementById('type_of_diagnosis');
var diagnostico = document.getElementById('diagnostico');

    $('#diagnostico').change(function(){
        //var diagnostico = $('#diagnostico').val();


       if($('#diagnostico').val()){
        //type_diagnostico.hidden = true;
         type_diagnostico.hidden = true;
         diagnostico.required = true;

       }else if(diagnostico.value == ''){
        type_diagnostico.hidden = false;
        type_diagnostico.required = true;
        diagnostico.hidden = true;
       }

    });

    $('#type_of_diagnosis').change(function(){
     if($('#type_of_diagnosis').data()){

            diagnostico.disabled = true;

       }
        else if($('#type_of_diagnosis').data(null)){
            diagnostico.disabled = false;
            type_diagnostico.disabled = true;

       }

    });







$('#form_historia').validate({

rules: {
    blood: {
        required: true
    },

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
        min:110,
    },


  },


messages: {
    blood: {
        required: "Por favor seleccione un tipo de sangre"
    },

    diagnostico: {

        required: "Por favor seleccione un diagnostico",


    },

    peso: {
       required: "Por favor ingrese el peso",
         min: "Peso invalido"
    },

    altura: {
       required: "Por favor ingrese la estatura",
            min: "Altura invalida"
    },


  },





});



</script>
