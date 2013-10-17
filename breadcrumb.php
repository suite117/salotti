<?php 

$type = isset($_GET['type']) ? $_GET['type'] . '/' : '';
//var_dump($type);
?>

<div class="container" style="margin-top: 20px;">

  <div class="row">
    <div>
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
      </ol>
    </div>

  </div>
  <!-- /.row -->
</div>


