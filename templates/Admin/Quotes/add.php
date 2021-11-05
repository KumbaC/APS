<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var \Cake\Collection\CollectionInterface|string[] $specialties
 * @var \Cake\Collection\CollectionInterface|string[] $diseases
 * @var \Cake\Collection\CollectionInterface|string[] $pathologies
 * @var \Cake\Collection\CollectionInterface|string[] $persons
 * @var \Cake\Collection\CollectionInterface|string[] $statusQuotes
 * @var \Cake\Collection\CollectionInterface|string[] $status
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading text-uppercase text-center font-weight-bold">  <i class="fas fa-tools"></i> <?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Lista de consultas'), ['action' => 'index'], ['class' => 'text-uppercase font-weight-bold btn btn-danger side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80 card mx-auto">
        <div class="quotes form content card-body">
            <?= $this->Form->create($quote) ?>
            <fieldset>
                <legend class="font-weight-bold text-center text-uppercase"><i class="fas fa-notes-medical"></i> <?= __('Agregar cita medica') ?></legend>
                  <div class="form-row">
                   <div class="form-group col-md-6">
                   <?php echo $this->Form->control('asunto', ['placeholder' => 'El asunto de la cita', 'require']);  ?>
                   </div>
                   <div class="form-group col-md-6">
                   <?php echo $this->Form->control('nota', ['required']); ?>
                   </div></div>
                   <div class="form-row">
                   <div class="form-group col-md-6">
                   <?php echo $this->Form->control('specialty_id', ['id' => 'especialidad', 'label' => 'Especialidad', 'options' => $specialties]); ?>
                   </div>



                   <div class="form-group col-md-6">
                   <?php echo $this->Form->input('pathology_id', ['id' => 'patologia',  'options' => $specialties, 'label' => 'Patologias', 'require', 'empty' => 'Elija una patologia']); ?>
                   </div></div>

                   <div class="form-row">
                   <div class="form-group col-md-6">
                   <?php echo $this->Form->control('fecha', ['empty' => true, 'require']); ?>
                   </div>
                   <div class="form-group col-md-6">
                   <?php echo $this->Form->control('hora', ['empty' => true, 'require']); ?>
                   </div></div>
                   <?php echo $this->Form->control('person_id', ['type' => 'hidden']); ?>

                   <?php echo $this->Form->control('status_quote_id', ['options' => $statusQuotes,  'label' => 'Estatus']); ?>


            </fieldset>
            <?= $this->Form->button(__('Guardar'), ['id' => 'guardar', 'class'  => 'btn btn-success btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/2.0.0-beta.2/jquery.chained.js" integrity="sha512-pzNj4zAqkNYCenmlp3COdn81sJ46X05GAVHlxN7ugq65+few2JpBfqAk/5mjQvqylbHdt7MNkL2svWtoAqxpzw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

/* $(document).ready(function(){

$('#especialidad').change(function(){
 var selected = $(this).val();

 $.ajax({
  type: "POST",
  url: '/quotes/getEspecialidadByPatologia',
  data: "idEspecialidad="+selected,
  dataType: 'json',
  success: function(data){

   $('#patologia option').remove();
   var $el = $("#patologia");
   if (data.length > 1) {
    $el.append($("")
      .attr("value", -1).text("Elija una patologia"));
   }
   $.each(data, function(i,items){
    $el.append($("")
      .attr("value", items.Pathology.id).text(items.Pathology.descripcion));

        });
       }
    });
  });
}); */


</script>
