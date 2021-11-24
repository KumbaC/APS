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
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase font-weight-bold text-center"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de Historia Clinicas'), ['action' => 'index'], ['class' => 'btn btn-danger side-nav-item']) ?>
        </div>
    </aside>


<br> <br>
    <div class="column-responsive column-80 card mx-auto col-md-4">
        <div class="clinicalHistories form content card-body">
            <?= $this->Form->create($clinicalHistory) ?>
            <fieldset>

            <h3 class="text-uppercase font-weight-bold text-center">HISTORIA CLINICA </h3>
                <br>
                   <!--  /* echo $this->Form->control('person_id', ['options' => $persons, 'empty' => true]);
                    echo $this->Form->control('beneficiary_id', ['options' => $beneficiary, 'empty' => true]); */
                    /* echo $this->Form->control('doctor_id', ['options' => $doctors, 'empty' => true]); */ -->
                    <div class="row">
                        <div class="col">
                    <?php echo $this->Form->control('blood_type_id', ['id' => 'blood','label' => 'Tipo de Sangre', 'options' => $bloodTypes, 'empty' => 'DESCONOCIDO' ]); ?>
                    </div>
                    <div class="col">
                    <?php  echo $this->Form->control('diagnoses._ids', ['id' => 'diagnostico', 'label' => 'Diagnostico', 'options' => $diagnoses]); ?>
                    </div></div>
                    <div class="col-md-12">
                    <?php echo $this->Form->control('type_of_diagnosis', ['type' => 'textarea', 'label' => 'Comentario de Diagnostico (Opcional)',]); ?>
                    </div>
                    <div class="row">
                        <div class="col">
                    <?php  echo $this->Form->control('habits._ids', ['id' => 'habitos', 'label' => 'Habitos', 'options' => $habits]); ?>
                    </div>
                    <div class="col">
                    <?php  echo $this->Form->control('medicals_antecedents._ids', ['id' => 'antecedente','label' => 'Antecedentes medicos', 'options' => $medicalsAntecedents]); ?>
                    </div></div>

                <hr class="font-weight-bold"> <br>

                <h4 class="text-uppercase font-weight-bold text-center">Examen Fisico</h4>
                    <div class="row">
                        <div class="col-md-6">
                   <?php echo $this->Form->control('peso', ['label' => 'Peso', 'placeholder' => '60 kg']); ?>
                   </div>
                   <div class="col">
                   <?php echo $this->Form->control('altura', ['label' => 'Altura', 'placeholder' => '1,70 mt']); ?>
                   </div></div>

                   <div class="row">
                        <div class="col">
                   <?php echo $this->Form->control('fr', ['label' => 'FR']); ?>
                   </div>
                   <div class="col">
                   <?php echo $this->Form->control('fc', ['label' => 'FC']); ?>
                   </div></div>

                   <?php echo $this->Form->control('ta', ['label' => 'TA']); ?>

            </fieldset>
            <?= $this->Form->button(__('Guardar Historia Medica'), ['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$("#habitos").select2({
    tags: true,
    tokenSeparators: [',', ' '],
    placeholder: "Seleccione los habitos",
    color: '#2E4C6D',
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
    tags: true,
    tokenSeparators: [',', ' '],
    placeholder: "Seleccione su diagnostico",

})

$("#blood").select2({
    placeholder: "Seleccione su tipo de sangre",
    allowClear: true,
    width: 'resolve',
    theme: "classic",
    background: '#2E4C6D',
})
</script>
