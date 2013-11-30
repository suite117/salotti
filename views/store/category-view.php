<?php


$categories = $category_dao -> get_categories_ordered_by_id();
//Array di utenti
$category_count = count($categories);
//print_r($members);
?>

<div class="container">


  <h2>
    <?= _('Category management') ?>
  </h2>
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th><?=_('Id') ?></th>
          <th><?=_('Name') ?></th>
          <th><?=_('Parent category') ?></th>
          <th><?=_('Operations') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $category) :?>
        <tr>
          <td><?= $category['category_id'] ?></td>
          <td><?= $category['category_name'] ?></td>
          <td><?= $category['category_parent_id'] ?></td>
          <td><a class="btn btn-primary" href="modifica/categoria/<?= $category['category_id'] ?>.html"><?= _('Edit') ?>
          </a> <!-- Button trigger modal --> <a data-toggle="modal" href="#modalBox" class="btn btn-danger delete"><?= _('Delete') ?></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>


  <h2><?= _('Category sort') ?></h2>
  <div class="dd" id="njson"></div>


  <script type="text/javascript">

$(document).ready(function() {
  $.getJSON(base_url + 'rest/category_rest.php?nested=true', function(data) {
  			
  
  	$('#njson').bootnestable({
  	  group : 1,
  	  source : data,
  	  label : 'category_name',
  	  value : 'category_id',
  	  parent_label : 'category_parent_id'
  	}).on('change', function(e) {

  	   // invio categorie aggiornate
		var list = e.length ? e : $(e.target);
		var output = $(this).bootnestable('serialize');
		//console.log("output", output);
		// POST to server using $.post or $.ajax
		$.post( base_url + 'rest/category_rest.php', {"data" : output});
         
    });
  });
});
</script>

</div>
<!-- end container -->

