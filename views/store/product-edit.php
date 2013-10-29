<?php require 'product-edit-submit.php';?>
<script type="text/javascript">

// prepara l'url base per javascript
$("body").data("base_url", "<?= curUrl() ?>");
// l'url base per javascript
var base_url = $("body").data("base_url");


$(document).ready(function() {

  	// recupero campo type
  	type = $("#type").val();
    console.log(type);

    // aggiorna le categorie al cambio del tipo
    function categoryUpdate() {
      get_category_by_type(type, "category_id");
      get_options_by_type(type, "options");
    }
    
    $("#type").change(categoryUpdate);

    categoryUpdate();

    // recupera le opzioni selezionate
    <?php if (isset($product)) : ?>
    get_selected_options_by_id($("#product_id").val(), "options");
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
        <label for="name" class="control-label">Nome modello</label> <input type="text" class="form-control" name="name"
          id="name" value="<?= @$product['nome']?>" placeholder="Iserisci il nome del prodotto">
      </div>

      <div class="col-md-3">
        <label for="is_published" class="control-label">Stato</label> <select class="form-control" name="is_published">
          <?php $option_is_published = array('N' => 'Non pubblicato', 'Y' => 'Pubblicato'); ?>
          <?php foreach($option_is_published as $key => $label ): ?>
          <option value="<?=$key ?>" selected <?= ($key == @$product['is_published'] ? 'selected' : '') ?>><?= $label ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-3">
        <label for="is_avaiable" class="control-label">Disponibile</label> <select class="form-control"
          name="is_avaiable" id="is_avaiable">
          <?php $option_is_avaiable = array('N' => 'No', 'Y' => 'Si'); ?>
          <?php foreach($option_is_avaiable as $key => $label ): ?>
          <option value="<?=$key ?>" <?= ($key == @$product['is_avaiable'] ? 'selected' : '') ?>><?= $label ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <!-- end formgroup -->

    <div class="form-group">
      <div class="col-md-2">
        <label for="category_id" class="control-label">Tipo</label> <select class="form-control" name="type" id="type">

          <?php foreach ($types as $type ) :?>
          <option value="<?=$type['type'] ?>"><?=ucfirst($type['type']) ?></option>
          <?php endforeach; ?>

        </select>
      </div>
      <div class="col-md-4">
        <label for="category_id" class="control-label">Categoria</label> <select class="form-control" name="category_id"
          id="category_id">
          <?php foreach ($categories as $cat ) :?>
          <option <?= $cat['category_id'] == $product['category_id'] ? 'selected' : '' ?>
            value="<?=$cat['category_id'] ?>"><?=ucfirst($cat['category_name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-6">
        <label for="options" class="control-label">Versioni</label> <select name="update_options[]" id="options"
          class="multiselect" multiple="multiple">
          <?php for ($i=0; $i < sizeof($options); $i++) :?>
          <option value="<?= $options[$i]['option_code'];?>">
            <?= $options[$i]['option_name']; ?>
          </option>
          </label>

          <?php endfor;?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <label for="description" class="control-label">Descrizione</label>
        <textarea name="description" class="form-control editor" rows="6" id="description"><?= @$product['description']?></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <label for="scheda_tecnica">Scheda tecnica</label>
        <textarea name="scheda_tecnica" class="form-control editor" rows="6" id="scheda_tecnica"><?= @$product['schedatecnica']?></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-1">
        <?php if (isset($product)): ?>
        <button type="submit" name="save" class="btn btn-default">Salva modifiche</button>
        <?php else : ?>
        <button type="submit" name="create" class="btn btn-default">Crea prodotto</button>
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


