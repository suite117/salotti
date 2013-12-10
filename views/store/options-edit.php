<?php require 'options-edit-submit.php';

?>
<script type="text/javascript">


$(document).ready(function() {

    // recupera le i tipo
    $.getJSON(base_url + 'rest/options_rest.phptype=' , function(data) {
		$('#product_type').bootselect('source', data, {"label" : "option_name", "value": "option_code", "selected" : false });

		// recupero la categoria selezionata
		var option_code = $("#option_code").val();
		$.getJSON(base_url + 'rest/options_rest.php?option_code=' + option_code , function(data) {
			console.log("option_code", option_code);
		   $('#product_type').bootselect('select', [data]);
	  }); 
    });  	
    
});
</script>



<div class="container">
  <?php
  // check for a successful form post
  if (isset($success))
    echo "<div class=\"alert alert-success\">" . $success . "</div>";

  // check for a form error
  elseif (isset($errors))
  foreach ($errors as $key => $error)
    echo "<div class=\"alert alert-danger\">" . $error . "</div>";
  
  ?>
  
  

  <form class="form-horizontal" method="post" action="">

    <input type="hidden" name="option_code" id="option_code" value="<?= @$option['option_code']?>" />
    <input type="hidden" name="option_order" value="<?= @$option['option_order']?>" /> 
    <div class="form-group">

      <div class="col-md-6">
        <label for="option_name" class="control-label"><?= _('Option name') ?> </label> <input type="text"
          class="form-control" name="option_name" id="option_name" value="<?= @$option['option_name']?>"
          placeholder="Iserisci il nome della categoria" />
      </div>

      <div class="col-md-2">
        <label for="product_type" class="control-label"><?= _('Product type') ?> </label> <select
          class="form-control" name="product_type" id="product_type">

        </select>
      </div>
    </div>



    <!-- end formgroup -->


    <?php if(false) : ?>
    <div class="form-group">
      <div class="col-md-12">
        <label for="description" class="control-label">Descrizione</label>
        <textarea name="description" class="form-control editor" rows="6" id="description"><?= @$option['description']?></textarea>
      </div>
    </div>
    <?php endif;?>


    <div class="form-group">
      <div class="col-md-1">
        <?php if (isset($option)): ?>
        <button type="submit" name="save" class="btn btn-default">Salva modifiche</button>
        <?php else : ?>
        <button type="submit" name="create" class="btn btn-default">Crea categoria</button>
        <?php endif;?>
      </div>
    </div>

  </form>

</div>

