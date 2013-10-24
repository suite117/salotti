<?php require 'product-add-submit.php';?>

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

    <div class="form-group <?= isset($errors['name']) ? 'has-error' : 'has-success' ?>">
      <label for="name" class="col-md-2">Titolo</label>
      <div class="col-md-5">
        <input type="text" class="form-control" name="name" id="name" value="<?= @$product['nome']?>"
          placeholder="Iserisci il nome del prodotto">
      </div>

      <label for="stato" class="col-md-1">Stato</label>
      <div class="col-md-2">
        <select class="form-control" name="stato" id="stato">
          <option value="0">Non pubbicato</option>
          <option value="1" selected="selected">Pubbicato</option>
          <option value="2">In evidenza</option>
        </select>
      </div>

      <label for="disponibile" class="col-md-1">Disponibile</label>
      <div class="col-md-1">
        <select class="form-control" name="stato" id="versione">
          <option value="0">No</option>
          <option value="1" selected="selected">Si</option>
        </select>
      </div>
    </div>
    <!-- end formgroup -->

    <div class="form-group">
      <label for="category_id" class="col-md-2">Tipo</label>
      <div class="col-md-2">
        <select class="form-control" name="type" id="type">

          <?php foreach ($types as $type ) :?>
          <option value="<?=$type['type'] ?>"><?=ucfirst($type['type']) ?></option>
          <?php endforeach; ?>

        </select>
      </div>
      <label for="category_id" class="col-md-2">Categoria</label>
      <div class="col-md-2">
        <select class="form-control" name="category_id" id="category_id">
          <?php foreach ($categories as $cat ) :?>
          <option value="<?=$cat['category_id'] ?>"><?=ucfirst($cat['category_name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <label for="version_id" class="col-md-2">Versione</label>
      <div class="col-md-2">
        <select class="form-control" name="version_id" id="version_id">
          <option value="2p">2 posti</option>
          <option value="l2p">laterale 2 posti</option>
          <option value="2pm">2 posti max</option>
          <option value="l2pm">laterale 2 posti max</option>
          <option value="l3p">laterale 3 posti</option>
          <option value="l3pm">laterale 3 posti max</option>
          <option value="cl">chaise longe</option>
          <option value="clm">chaise longe max</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="name" class="col-md-2">Immagine</label>
      <div class="col-md-6">
        <div class="input-group">
          <input type="text" name="immagine" value="<?= @$product['immagine']?>" readonly class="form-control filename">
          <span class="input-group-btn"><input type="file" id="file_image" /> </span>
        </div>
        <!-- /input-group -->
      </div>
      <div class="col-md-2">
        <div class="upload-image">
          <img class="img-responsive" src="<?=curUrl() . 'images/' . @$product['immagine'] ?>">
        </div>
      </div>
    </div>
    <!-- /.form-group -->

    <div class="form-group">
      <div class="col-md-12">
        <label for="description">Descrizione</label>
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


