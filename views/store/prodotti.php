<?php 
$prodotti = $products->get_products(); //Array di prodotti
$product_count 	= count($prodotti); // n° di prodotti

print_r($product_count) ;
?>
<div class="container">

  <?php

  $product_index = 0;
  while ( $product_index < $product_count):
  //var_dump($prodott);

  ?>
  <div class="row">
    <div class="col-md-3"></div>
    <?php
    for($j=0;$j<3;$j++) :

    if ( $product_index >= $product_count)
    	break;

    $prodotto = $prodotti[$product_index];

    $prodotto_path = 'prodotto/' . $prodotto['nome'] . '.html';
    $prodotto['nome'] = isset($prodotto['nome']) ? $prodotto['nome'] : 'Nome modello '. $product_index;
    $prodotto['immagine'] = isset($prodotto['immagine']) && strlen(trim($prodotto['immagine'])) != 0 ? $prodotto['immagine'] :'image.php?path=images/modello.jpg';

    $product_index++;
    ?>

    <div class="col-md-3">

      <?php if ($general -> logged_in() === true) : ?>
      <a href="<?=$prodotto_path?>"> <?php endif; ?> <img alt="<?= @$prodotto['nome'] ?>"
        data-path="<?=$prodotto_path ?>" data-id="<?= @$product_index ?>" class="img-responsive"
        src="<?=  $prodotto['immagine']  ?>" /> <?php if ($general -> logged_in() === true) : ?>
      </a>
      <?php endif;?>
      <div class="row">
        <div class="col-md-9 col-lg-9">
          <a style="line-height: 2" href="<?=$prodotto_path?>"><?= @$prodotto['nome'] ?> </a>
        </div>
        <?php if ($general -> logged_in() === true) : ?>
        <div class="col-md-3 col-lg-3">
          <a class="gallery-lightbox" href="#" style="text-decoration: none;"><div
						style="width:30px; height: 30px; background-image: url('<?= curUrl() ?>images/lente.png')">&nbsp;</div> </a>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <?php endfor; ?>
  </div>
  <?php endwhile; ?>

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