<?php require 'product-edit-submit.php';?>
<script type="text/javascript">

// prepara l'url base per javascript

// l'url base per javascript
var base_url = $("body").data("base_url");

function get_category_by_type(type, destination_id) {
  $.getJSON(base_url + "rest/category_rest.php?type=" + type, function(categories) {

	$("#" + destination_id).html("");
	$.each(categories, function(index, category) {

	  $("#" + destination_id).append($('<option>', {
		value : category['category_id'],
		text : category['category_name'],
		selected : true
	  }));

	});

  });
}

$(document).ready(function() {

  	// recupero campo type
  	type = $("#type").val();

    // aggiorna le categorie al cambio del tipo
    function categoryUpdate() {
      //get_category_by_type(type, "category_id");
    }
    
    $("#type").change(categoryUpdate);

    //categoryUpdate();

    // recupera le opzioni in base al tipo
    $.getJSON(base_url + 'rest/category_rest.php?type=' + type , function(data) {
		$('#category_id').bootselect('source', data, {"label" : "category_name", "value": "category_id" });
	  });  	
	
    <?php if (isset($product)) : ?>
    // recupera le opzioni in base al tipo
    $.getJSON(base_url + 'rest/options_rest.php?type=' + type , function(data) {
		$('#options').bootselect('source', data, {"label" : "option_name", "value": "option_code" });
	  });
  	
    // recupera le opzioni selezionate
       $.getJSON(base_url + 'rest/options_rest.php?id=' + $("#product_id").val() , function(data) {
		$('#options').bootselect('select', data);

		// invia dati appena viene selezionato un elemento
		$('#options').bootselect('onchange', function(data){
			//console.log(data);
			$.post( base_url + 'rest/options_rest.php?id=' + $("#product_id").val(), data );
		});
	  });
    <?php endif; ?>
    
	  
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

  <form class="form-horizontal" role="form" method="post" action="">

    <div class="form-group <?= isset($errors['name']) ? 'has-error' : '' ?>">
      <input type="hidden" name="id" id="product_id" value="<?= @$product['id']?>">

      <div class="col-md-6">
        <label for="name" class="control-label"><?= _("Model name") ?> </label> <input type="text" class="form-control"
          name="name" id="name" value="<?= @$product['nome']?>" placeholder="<?= _("Insert the product name") ?>">
      </div>

      <div class="col-md-3">
        <label for="is_published" class="control-label">Stato</label> <select class="form-control" name="is_published">
          <?php $option_is_published = array('N' => _('Not published'), 'Y' => _('Published')); ?>
          <?php foreach($option_is_published as $key => $label ): ?>
          <option value="<?=$key ?>" selected <?= ($key == @$product['is_published'] ? 'selected' : '') ?>><?= $label ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-3">
        <label for="is_avaiable" class="control-label"><?=_("Avaiable")?> </label> <select class="form-control"
          name="is_avaiable" id="is_avaiable">
          <?php $option_is_avaiable = array('N' => _('No'), 'Y' => _('Yes')); ?>
          <?php foreach($option_is_avaiable as $key => $label ): ?>
          <option value="<?=$key ?>" <?= ($key == @$product['is_avaiable'] ? 'selected' : '') ?>><?= $label ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <!-- end formgroup -->

    <div class="form-group">
      <div class="col-md-2">
        <label for="category_id" class="control-label"><?= ('Type') ?> </label> <select class="form-control" name="type"
          id="type">

          <?php foreach ($types as $type ) :?>
          <option value="<?=$type['type'] ?>"><?=ucfirst($type['type']) ?></option>
          <?php endforeach; ?>

        </select>
      </div>
      <div class="col-md-4">
        <label for="category_id" class="control-label">Categoria</label> <select class="form-control" name="category_id"
          id="category_id">
        </select>
      </div>

      <div class="col-md-6">
        <?php if  (isset($product)) : ?>
        <label for="options" class="control-label">Versioni</label> <select name="update_options[]" id="options"
          multiple>
        </select>
        <?php endif; ?>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <label for="description" class="control-label"><?= _("Description") ?> </label>
        <textarea name="description" class="form-control editor" rows="6" id="description"><?= @$product['description']?></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <label for="scheda_tecnica"><?= _('Specifications') ?> </label>
        <textarea name="scheda_tecnica" class="form-control editor" rows="6" id="scheda_tecnica"><?= @$product['schedatecnica']?></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-1">
        <?php if (isset($product)): ?>
        <button type="submit" name="save" class="btn btn-default">
          <?= _("Save") ?>
        </button>
        <?php else : ?>
        <button type="submit" name="create" class="btn btn-default">
          <?= _("Create") . ' ' ._("product") ?>
        </button>
        <?php endif;?>
      </div>
    </div>

  </form>

</div>



<script type="text/javascript">
function fileError(file,error){
    alert("Errore sul file: "+file.name+" Errore: "+error+"");
   }

    $(document).ready(function(){ 
	$("#file_image").pekeUpload({theme:'bootstrap', multi: false, allowedExtensions:"jpeg|jpg|png|gif", base_url: "<?=curUrl() ?>", relative_url : 'images/'});
      
    });
  </script>


