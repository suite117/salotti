<?php 

$type = isset($_GET['type']) ? $_GET['type'] . '/' : '';
//var_dump($type);
?>

<div class="container">

  <div class="row">
    <div>
      <h1 class="page-header">
        <?=$page_title ?>
        <?='<small> '.$page_description.'</small>' ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=curURL()?>">Home</a>
        </li>
        <?php if (isset($category)): ?>
        <li><a href="<?=curURL(). $type . $category ?>/"><?=ucfirst ($category) ?> </a>
        </li>
        <?php endif; ?>
        <?php if (isset($subcategory)): ?>
        <li><a href="<?=curURL(). $type. $category. '/' . $subcategory ?>/"><?=ucfirst( str_replace('-', ' ', $subcategory)) ?>
        </a>
        </li>
        <?php endif; ?>

        <li class="active"><?=$page_title ?>
        </li>
      </ol>
    </div>

  </div>
  <!-- /.row -->
</div>


