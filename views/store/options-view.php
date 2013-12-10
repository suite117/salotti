<?php 
$types = $products_dao->get_types();
?>

<div class="container">

  <div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" role="form" method="post" action="">
        <div class="form-group">
          <div class="col-md-2">
            <label for="type" class="control-label"><?= _('Type') ?> </label> <select class="form-control" name="type"
              id="type">

              <?php foreach ($types as $type ) :?>
              <option value="<?=$type['type'] ?>"><?=ucfirst($type['type']) ?></option>
              <?php endforeach; ?>

            </select>

          </div>
          <div class="col-md-2">
            <button type="button" id="add" class="btn btn-default">Aggiungi opzione</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <ul id="options"></ul>
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->

</div>
<!-- end container -->

<script type="text/javascript">

function get_options_by_type(type) {
  // crea le opzioni
  $.getJSON(base_url + 'rest/options_rest.php?type=' + type , function(data) {
     //console.log(data);
     $("#options").html('');
     JSON2SortableList('options', data, {"label" : "option_name", "value" : "option_code"});
     $( "#options" ).sortable({
       axis: 'y',
       stop: function (event, ui) {
           var data = SortableList2JSON('options', {"label" : "option_name", "value" : "option_code"});
          $.post(base_url + 'rest/options_rest.php', {
            "update" : data
          });
       }
   }); 
  });  	


}

$(document).ready(function() {

  // recupera le opzioni per tipo e riempie la select
  get_options_by_type($('#type').val());
  $('#type').change(function(){
 
    get_options_by_type($('#type').val());
 
  }); 	

  // Pulsante aggiungi opzione
  $('#add').click(function(e) {
    // redirect
    window.location = base_url + "aggiungi/opzione.html";

    /*
    var form = '<form id="option-form" action="" method="post" role="form" class="form-horizontal">';
    form += '<div class="form-group ">';

    form += '<div class="col-md-2">';
    form += '<label class="control-label" for="option_code"><?= _('Option code') ?></label> <select id="option_code" name="option_code" class="form-control"></select>';          
    form +='</div>'; 
    
    form +='<div class="col-md-2">';
    form += '<label class="control-label" for="option_name"><?= _('Option name') ?></label> <input type="text" placeholder="Iserisci il nome della opzione" value="" id="option_name" name="option_name" class="form-control">';
    form += '</div>'; 

    form += '<div class="col-md-2">';
    form += '<label class="control-label" for="option_parent_id"><?= _('Tipo option') ?></label> <select id="option_parent_id" name="option_parent_id" class="form-control" style="display: none;"></select>';          
    form +='</div>'; 
    
  
    form += '</div>'
    form += '</form>';    
    
    bootbox.dialog({
      message : form,
      title : '<?= _('Add option') ?>',
      buttons : {
        danger : {
          label : '<?= _('Cancel') ?>',
          className : "btn-primary"
        },
        success : {
          label : '<?= _('OK') ?>',
          className : "btn-success",
          callback : function() {

            $modal_body = $('.modal-body');
            //console.log($modal_body);

            // recupera i valori dal form
            var option_name = $modal_body.find('form input[name=option_name]').val();
            //console.log('option_name', option_name); 
            
            $.ajax({
              url : base_url + 'rest/options_rest.php',
              type : 'POST',
              data : {"command" : "INSERT", "data" : { "option_name" : option_name }},
              success : function(response) {
                message = "Opzione <b>" + option_name + "</b> aggiunta con successo.";
                //bootbox.alert(message);
                // ricarica la pagina
               //window.location.reload();
               //$('#option-form').submit();
              }
            }); 
          }
        }

      }
    }); */

  }); // end a click

  
});

</script>
