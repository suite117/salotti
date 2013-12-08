<?php require 'category-edit-submit.php';?>
<script type="text/javascript">


$(document).ready(function() {

    // recupera le opzioni
    $.getJSON(base_url + 'rest/options_rest.php' , function(data) {
      
       JSON2List(data);		
	   $( "#sortable" ).sortable();
	   $( "#sortable" ).disableSelection();
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

    <div class="form-group <?= isset($errors['name']) ? 'has-error' : '' ?>">

      <div class="col-md-6">
        <label for="category_name" class="control-label"><?= _('Category name') ?> </label> <input type="text"
          class="form-control" name="category_name" id="category_name" value="<?= @$category['category_name']?>"
          placeholder="Iserisci il nome della categoria">
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
        <?php if (isset($category)): ?>
        <button type="submit" name="save" class="btn btn-default">Salva modifiche</button>
        <?php else : ?>
        <button type="submit" name="create" class="btn btn-default">Crea categoria</button>
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
