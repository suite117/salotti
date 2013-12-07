<?php 
$types = $products_dao->get_types();
?>

<div class="container">

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
    </div>
  </form>

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

   get_options_by_type($('#type').val());
    $('#type').change(function(){
   
      get_options_by_type($('#type').val());
   
    }); 	  
});

</script>
