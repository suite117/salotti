
<?php 

$type = isset($_GET['type']) ? $_GET['type'] . '/' : '';
//var_dump($type);
?>

<div class="container" style="margin-top: 57px;">

  <div class="row">
    <div class="col-md-9">
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

    <div class="col-md-3 text-right">
      <?php foreach ($supported_lang as $supp) :?>
      <a href="#" style="margin: 0 5px; <?= $lang == $supp ? 'font-weight: bold' : '' ?>"><span class="bfh-languages"
        data-language="<?= $supp ?>" data-flags="true"></span> </a>
      <?php endforeach;?>
    </div>
  </div>
  <!-- /.row -->
</div>

<script type="text/javascript">
$(".bfh-languages").click(function(){
  $.post( "<?= curUrl() ?>locale/locale_rest.php", { lang: $(this).data("language") })
  .done(function( data ) {
  console.log( "Lang Loaded: " + data );
  location.reload();
  });
});
</script>


<div id="container"
  style="min-height: 300px; max-width: 100%;">