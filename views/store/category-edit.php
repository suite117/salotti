<?php require 'category-edit-submit.php';?>
<script type="text/javascript">


$(document).ready(function() {

    // recupera le categorie
    $.getJSON(base_url + 'rest/category_rest.php' , function(data) {
		$('#category_parent_id').bootselect('source', data, {"label" : "category_name", "value": "category_id", "selected" : false });

		// recupero la categoria selezionata
		var category_id = $("#category_id").val();
		$.getJSON(base_url + 'rest/category_rest.php?id=' + category_id , function(data) {
			console.log("category_id", category_id);
		   $('#category_parent_id').bootselect('select', [data]);
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
  
  

  <form class="form-horizontal" role="form" method="post" action="">

    <input type="hidden" name="category_id" id="category_id" value="<?= @$category['category_id']?>" />
    <input type="hidden" name="category_order" value="<?= @$category['category_order']?>" /> 
    <div class="form-group <?= isset($errors['name']) ? 'has-error' : '' ?>">

      <div class="col-md-6">
        <label for="cat_name" class="control-label"><?= _('Category name') ?> </label> <input type="text"
          class="form-control" name="cat_name" id="cat_name" value="<?= @$category['category_name']?>"
          placeholder="Iserisci il nome della categoria" />
      </div>

      <div class="col-md-2">
        <label for="category_parent_id" class="control-label"><?= _('Parent category') ?> </label> <select
          class="form-control" name="category_parent_id" id="category_parent_id">

        </select>
      </div>
    </div>



    <!-- end formgroup -->


    <?php if(false) : ?>
    <div class="form-group">
      <div class="col-md-12">
        <label for="description" class="control-label">Descrizione</label>
        <textarea name="description" class="form-control editor" rows="6" id="description"><?= @$category['description']?></textarea>
      </div>
    </div>
    <?php endif;?>


    <div class="form-group">
      <div class="col-md-1">
        <?php if ($controller == 'aggiungi'): ?>
        <button type="submit" name="create" class="btn btn-default">
          <?=_('Add category') ?>
        </button>
        <?php else : ?>
        <button type="submit" name="save" class="btn btn-default">
          <?=_('Update category') ?>
        </button>
        <?php endif;?>
      </div>
    </div>

  </form>

</div>

