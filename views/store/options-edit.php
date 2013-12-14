<?php require 'options-edit-submit.php'; ?>

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

    <input type="hidden" name="option_order" value="<?= @$option['option_order']?>" />
    <div class="form-group">
      <div class="col-md-2">
        <label for="type" class="control-label"><?= _('Product Type') ?> </label> <select class="form-control"
          name="product_type" id="type">

          <?php foreach ($types as $type ) :?>
          <option value="<?=$type['type'] ?>"><?=ucfirst($type['type']) ?></option>
          <?php endforeach; ?>

        </select>
      </div>
      <div class="col-md-4">

        <?php if(isset($option)) : // caso input disabilitato non viene inviato ?> 
        <input type="hidden" name="option_code" value="<?= @$option['option_code']?>" />
        <?php endif; ?>

        <label for="option_code" class="control-label"><?= _('Option code') ?> </label> <input type="text"
        <?= isset($option) ? 'disabled="disabled"' : '' ?> name="option_code" id="option_code"
          value="<?= @$option['option_code']?>" class="form-control"
          placeholder="Iserisci il codice univoco per l'opzione" />

      </div>

      <div class="col-md-6">
        <label for="option_name" class="control-label"><?= _('Option name') ?> </label> <input type="text"
          name="option_name" id="option_name" value="<?= @$option['option_name']?>" class="form-control"
          placeholder="Iserisci il nome dell'opzione" />
      </div>
    </div>
    <!-- end formgroup -->


    <div class="form-group">
      <div class="col-md-1">
        <?php if (!isset($_POST)): ?>
        <button type="submit" name="create" class="btn btn-default">
          <?=_('Add option') ?>
        </button>
        <?php else : ?>
        <button type="submit" name="save" class="btn btn-default">
          <?=_('Update option') ?>
        </button>
        <?php endif;?>
      </div>
    </div>

  </form>

</div>

