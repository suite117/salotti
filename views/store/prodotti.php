<?php 
$general->logged_out_protect();
$prodotti		=$products->get_products(); //Array di prodotti
$product_count 	= count($prodotti); // n° di prodotti
$product_index = 0;

//print_r($prodotti) ;
?>
<div class="container">

	<?php
	for($i=0;$i<3;$i++) :
	?>
	<div class="row">
		<?php
		for($j=0;$j<4;$j++) :
		$product_index++;
		?>

		<div class="col-md-3" data-id="<?= @$product_index ?>">

			<a href="prodotto/generale/prod1.html"><img class="img-responsive"
				src="<?=curUrl() ?>images/modello.jpg"> </a>
			<div class="row">
				<div class="col-md-9 col-lg-9">
					Nome modello
					<?= @$product_index ?>
				</div>
				<div class="col-md-3 col-lg-3" style="font-size: 20px;">
					<a class="gallery-lightbox" href="#"><span
						class="glyphicon glyphicon-zoom-in"></span> </a>
				</div>
			</div>
		</div>

		<?php endfor; ?>
	</div>
	<?php endfor; ?>

	<hr>

	<div class="row text-center">

		<div class="col-lg-12">
			<ul class="pagination">
				<li><a href="#">&laquo;</a></li>
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">&raquo;</a></li>
			</ul>
		</div>

	</div>
</div>
<!-- /.container -->

<!-- Modal box -->
<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">×</button>
				<h3 class="modal-title">Heading</h3>
			</div>
			<div class="modal-body" style="height: 100%;">

				<!-- Here will go the Carousel Code -->
				<div id="carousel-generic" class="carousel slide">
					<?php
					$carouselId = '#carousel-generic';
					?>
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="<?=$carouselId?>" data-slide-to="0"
							class="active"></li>
						<li data-target="<?=$carouselId?>" data-slide-to="1"></li>
						<li data-target="<?=$carouselId?>" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item" id="item1">
							<img style="width: 100%;" src="http://lorempixel.com/400/200" />
							<div class="carousel-caption">...</div>
						</div>
						<div class="item">
							<img style="width: 100%;" class="img-responsive"
								src="http://lorempixel.com/400/200/sports/" />
						</div>

						<div class="item">
							<img style="width: 100%;" class="img-responsive"
								src="http://lorempixel.com/g/400/200/" />

						</div>
					</div>

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
