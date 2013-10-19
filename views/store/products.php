<?php 

if(isset($category_name))
$category_name = str_replace("-", " ", isset($subcategory) ? $subcategory : $category_name);


if (isset($category_name)) {
	$category = $category_dao->get_category_by_name($category_name);
	if(!empty($category))
	$products = $products_dao->get_products_by_category_id($category['category_id']);
	//var_dump("category", $category) ;
}
else
	$products =  $products_dao->get_products(); //Array di prodotti

if (!isset($products))
	$products = array();

//var_dump("products", $products);

$product_count 	= count($products); // n° di prodotti
//var_dump($product_count);
// recupero il tipo di prodotto viene preso dalla categoria se presente (divani o letti)

$types = isset($category_name) ? $products_dao->get_types_by_category_id($category['category_id']) : $products_dao->get_types();
//var_dump("types", $types);


?>
<div class="container">


  <!-- <div id="sidebar-left" style="position: absolute; width: 260px; top: 142px; float: left;">
    <ul class="nav bs-sidenav nav-list">
      <?php //require 'menu.php';?>
    </ul>
  </div>
  -->
  <?php

  foreach ($types as $type) :

  //var_dump($type['type']);
  $product_index = 0;
  while ( $product_index < $product_count): ?>

  <!--  prima colonna con il menu  -->

  <div class="row">
    <div class="col-md-3"></div>

    <div class="col-md-9">
      <?php if ($product_index == 0) :?>
      <h2>
        <?=ucfirst($category['category_name']) ?>
        <!-- COLONNA TITOLO -->
      </h2>
      <?php endif;?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3"></div>

    <?php
    $j=0;
    
    while($j<3) :

    if ( $product_index >= $product_count)
    	break;

    //var_dump($products[$product_index]['category_name'], $type['type']);
    if ($products[$product_index]['type'] != $type['type']){
    	$product_index++;
    	continue;
      }
      else
      	$j++;

      $prodotto = $products[$product_index];

      $prodotto_path = curUrl() . 'prodotti/' . (isset($category_name) ? $category_name . '/' : '') . $prodotto['nome'] . '.html';
      $prodotto['nome'] = isset($prodotto['nome']) ? $prodotto['nome'] : 'Nome modello '. $product_index;
      $prodotto['immagine'] =  curUrl() .'image.php?width=800&height=600&path=images/' . (isset($prodotto['immagine']) && strlen(trim($prodotto['immagine'])) != 0 ? $prodotto['immagine'] : 'default.png');

      $product_index++;
      ?>

    <div class="col-md-3">

      <?php if ($general -> logged_in() === true) : ?>
      <a href="<?=$prodotto_path?>"> <?php endif; ?> <img alt="<?= ucfirst(@$prodotto['nome']) ?>"
        data-path="<?=$prodotto_path ?>" data-id="<?= @$product_index ?>" class="img-responsive"
        style="margin-left: auto; margin-right: auto;" src="<?=  $prodotto['immagine']  ?>" /> <?php if ($general -> logged_in() === true) : ?>
      </a>
      <?php endif;?>
      <div class="row">
        <div class="col-md-9 col-lg-9">
          <a style="line-height: 2" href="<?=$prodotto_path?>"><?= ucfirst(@$prodotto['nome']) ?> </a>
        </div>
        <?php if ($general -> logged_in() === true) : ?>
        <div class="col-md-3 col-lg-3">
          <a class="gallery-lightbox" href="#" style="text-decoration: none;"><div
						style="width:30px; height: 30px; background-image: url('<?= curUrl() ?>images/lente.png')">&nbsp;</div> </a>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <?php endwhile; ?>
  </div>
  <?php endwhile; ?>
  <?php endforeach;?>


</div>
<!-- /.container -->


<?php if ($general -> logged_in() === true) : ?>
<!-- Modal box -->
<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal">×</button>
        <h3 class="modal-title">Heading</h3>
      </div>
      <div class="modal-body">

        <!-- Here will go the Carousel Code -->
        <div id="carousel-generic" class="carousel slide">
          <?php
          $carouselId = '#carousel-generic';
          ?>

          <!-- Wrapper for slides -->
          <div class="carousel-inner"></div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-generic" data-slide="prev"> <span class="icon-prev"></span>
          </a> <a class="right carousel-control" href="#carousel-generic" data-slide="next"> <span class="icon-next"></span>
          </a>
        </div>

        <!-- End Carousel Code -->

      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
