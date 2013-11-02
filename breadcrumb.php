
<?php 

$type = isset($_GET['type']) ? $_GET['type'] . '/' : '';
//var_dump($type);
?>

<div class="container" style="margin-top: 57px;">

  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb">
        <li><a href="<?=curURL()?>">Home</a>
        </li>
        <?php if (isset($category_name)): ?>
        <li><a href="<?=curURL(). $type . $category_name ?>/"><?=ucfirst ($category_name) ?> </a>
        </li>
        <?php endif; ?>
        <?php if (isset($subcategory)): ?>
        <li><a href="<?=curURL(). $type. $category_name. '/' . $subcategory ?>/"><?=ucfirst( str_replace('-', ' ', $subcategory)) ?>
        </a>
        </li>
        <?php endif; ?>
      </ol>
    </div>
  </div>
  <!-- /.row -->
</div>
 


<div id="container"
  style="min-height: 300px; max-width: 100%;">
  
  
 