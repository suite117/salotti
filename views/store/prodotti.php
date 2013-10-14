<?php 
$prodotti = $products->get_products(); //Array di prodotti
$product_count 	= count($prodotti); // n° di prodotti
$product_index = 0;

//print_r($prodotti) ;
?>
<div class="container">

	<?php
	for($i=0;$i<3;$i++) :
	?>
	<div class="row">
		<div class="col-md-3"></div>
		<?php
		for($j=0;$j<3;$j++) :
		$product_index++;
		$prodotto = array( 'nome' => 'Nome modello '. $product_index , 'immagine' => curUrl(). 'images/modello.jpg');
		$prodotto_path = 'prodotto/' . $prodotto['nome'] . '.html';
		?>

		<div class="col-md-3">

			<?php if ($general -> logged_in() === true) : ?>
			<a href="<?=$prodotto_path?>"> <?php endif; ?> <img
				alt="<?= @$prodotto['nome'] ?>" data-path="<?=$prodotto_path ?>"
				data-id="<?= @$product_index ?>" class="img-responsive"
				src="<?= @$prodotto['immagine'] ?>"> <?php if ($general -> logged_in() === true) : ?>
			</a>
			<?php endif;?>
			<div class="row">
				<div class="col-md-9 col-lg-9">
					<a href="<?=$prodotto_path?>"><?= @$prodotto['nome'] ?> </a>
				</div>
				<?php if ($general -> logged_in() === true) : ?>
				<div class="col-md-3 col-lg-3" style="font-size: 20px;">
					<a class="gallery-lightbox" href="#"><span
						class="glyphicon glyphicon-zoom-in"></span> </a>
				</div>
				<?php endif; ?>
			</div>
		</div>

		<?php endfor; ?>
	</div>
	<?php endfor; ?>

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
					<a class="left carousel-control" href="#carousel-generic"
						data-slide="prev"> <span class="icon-prev"></span>
					</a> <a class="right carousel-control" href="#carousel-generic"
						data-slide="next"> <span class="icon-next"></span>
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