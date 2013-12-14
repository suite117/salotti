<?php 
if (isset($category_name)) {
  $category_name = str_replace("-", " ", $category_name);
  $category = $category_dao->get_category_by_name($category_name);

  if (isset($subcategory_name)) {
    $subcategory_name = str_replace("-", " ", $subcategory_name);
    $subcategory = $category_dao->get_category_by_name($subcategory_name);
    //var_dump("subcategory", $subcategory) ;
  }

  //var_dump("category", $category) ;

}


if (!isset($products))
  $products = array();

//var_dump("products", $products);


//var_dump($product_count);
// recupero il tipo di prodotto viene preso dalla categoria se presente (divani o letti)

$types = isset($category_name) ? $products_dao->get_types_by_category_id($category['category_id']) : $products_dao->get_types();
//var_dump("types", $types);


?>
<div class="container">


  <!--  prima colonna con il menu  -->

  <div class="row">
    <div class="col-md-3">
      <div class="bs-sidebar hidden-print affix-top">
        <ul class="nav bs-sidenav nav-list">
          <?=left_menu($categories, BASE_URL . 'prodotti/')?>
        </ul>
      </div>
    </div>

    <div class="col-md-9">
      <?php

      foreach ($types as $type) :
      //var_dump($types);

      if(!isset($category_name)) {
  $products =  $products_dao->get_products_by_field('type', $type['type']); //Array di prodotti
  }
  elseif(!empty($category)) {

		if(isset($subcategory))
		  $products = $products_dao->get_products_by_subcategory_id($subcategory['category_id']);
		else
		  $products = $products_dao->get_products_by_category_id($category['category_id']);
	}



	$product_count 	= count($products); // n° di prodotti
	//var_dump($products);

	//var_dump($type['type']);

	$product_index = 0;
  while ( $product_index < $product_count): ?>

      <h2>
        <?php 
        if(isset($subcategory))
          echo ucfirst($products[$product_index]['category_name']);
        else
        	echo ucfirst($products[$product_index]['type']) ?>
        <!-- COLONNA TITOLO -->
      </h2>

      <div class="row">

        <?php
        for($j=0; $j<3; $j++) :

        if ( $product_index >= $product_count)
          break;
         

        $prodotto = $products[$product_index];

        $prodotto_path = curUrl() . 'prodotti/' . (isset($category_name) ? $category_name . '/' : '') . $prodotto['nome'] . '.html';
        $prodotto['nome'] = isset($prodotto['nome']) ? $prodotto['nome'] : 'Nome modello '. $product_index;
        $prodotto['immagine'] =  curUrl() .'image.php?width=800&height=600&path=files/images/'. $type['type'] . '/' . (isset($prodotto['immagine']) && strlen(trim($prodotto['immagine'])) != 0 ? $prodotto['immagine'] : 'default.png');

        $product_index++;
        ?>

        <div class="col-md-4">

          <?php if ($general -> logged_in() === true) : ?>
          <a href="<?=$prodotto_path?>"> <?php endif; ?> <img alt="<?= ucfirst(@$prodotto['nome']) ?>"
            data-path="<?=$prodotto_path ?>" data-id="<?= $prodotto['id'] ?>" class="img-responsive"
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
						style="width:30px; height: 30px; background-image: url('<?= BASE_URL ?>images/lente.png')">&nbsp;</div> </a>
            </div>
            <?php endif; ?>
          </div>
        </div>

        <?php endfor; ?>
      </div>
      <!-- end row -->

      <?php endwhile; ?>
      <?php endforeach;?>

    </div>
    <!-- end col-9 -->
  </div>




</div>
<!-- /.container -->


<?php if ($general -> logged_in() === true) : ?>
<!-- Modal box -->
<div tabindex="-1" class="modal fade" id="modal-carousel" role="dialog">
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

<script type="text/javascript">

$(document).ready(function(){
  // Carousel #carousel-generic
  // Inizializzazione immagini slideshow
  // $('.modal-body .carousel-inner').html('');
  $('.col-md-4 a img').each(
	  function(index, image) {
		//console.log(index, image);
		var image_path = $(image).attr("src");
		$(
			'<div class="item"><img class="img-responsive" data-path="' + $(this).data("path")
				+ '" alt="' + $(this).attr("alt") + '" src="' + image_path + '" data-id="'
				+ $(this).data("id") + '"/></div>').appendTo('.modal-body .carousel-inner');

	  });

  // Could be slid or slide (slide happens before animation,
  // slid happens after)
  $('#carousel-generic').bind(
	  'slid',
	  function() {

		// console.log($('.active img', this));
		var image = $('.active img', this);
		$('.modal-title').html(
			'<a href="' + image.data("path") + '">' + image.attr("alt") + '</a>');
	  });

  // Comportamento al click sulla lente d'ingandimento
  $('.gallery-lightbox').click(
	  function() {

		var cell = $(this).parent().parent().parent();
		var active_image = $($(cell).children()[0]).children()[0];

		// console.log(active_title, active_image);

		$('.modal-title').html(
			'<a href="' + $(active_image).data("path") + '">' + $(active_image).attr("alt")
				+ '</a>');

		$('.modal-body img').each(function(index, image) {
		  // console.log($(active_image).data("id"));
		  // console.log($(image).data("id"));

		  if ($(image).data("id") == $(active_image).data("id"))
			$(image).parent().addClass('active');
		  else
			$(image).parent().removeClass('active');
		});
		// $('.modal-body img').empty();

		// Visualizza la finestra di dialogo per
		// lo slideshow
		$('#modal-carousel').modal({
		  show : true
		});

	  });
  
});

</script>
