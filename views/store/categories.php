<?php


$categories = $category_dao -> get_categories_ordered_by_id();
//Array di utenti
$category_count = count($categories);
//print_r($members);
?>

<div class="container">

  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Categoria Padre</th>
          <th>Operazioni</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $category) :?>
        <tr>
          <td><?= $category['category_id'] ?></td>
          <td><?= $category['category_name'] ?></td>
          <td><?= $category['category_parent_id'] ?></td>
          <td><a class="btn btn-primary" href="modifica/categoria/<?= $category['category_id'] ?>.html"> Modifica</a> <!-- Button trigger modal -->
            <a data-toggle="modal" href="#modalBox" class="btn btn-danger delete">Elimina</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>



<!-- Modal box -->
<div tabindex="-1" class="modal fade" id="modalBox" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal">×</button>
        <h3 class="modal-title">Heading</h3>
      </div>
      <div class="modal-body" style="padding: 15px;"></div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>
