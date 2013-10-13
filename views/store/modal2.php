<!-- Button trigger for modal -->
<a data-toggle="modal" id ="image-modal" href="#myModal"> <img src="http://imagemanager.uplifted.net/5/anchor-image2.jpg"> <!-- Use your own image here or button --> </a>
<div class="item"> <!-- This is a slide container -->
  <img src="http://lorempixel.com/g/400/200/" /> <!-- Your own image goes here -->
 </div>
<div class="item"> <!-- This is a slide container -->
  <img src="http://lorempixel.com/g/400/200/" /> <!-- Your own image goes here -->
 </div>
<div class="item"> <!-- This is a slide container -->
  <img src="http://lorempixel.com/g/400/200/" /> <!-- Your own image goes here -->
 </div>



<!-- Modal -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title">Carousel Inside Modal</h4>
			</div>
			<div class="modal-body">

				<!-- Here will go the Carousel Code -->

				<div id="carousel-example-generic" class="carousel slide">

					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="http://lorempixel.com/400/200" />

						</div>

						<div class="item">
							<img src="http://lorempixel.com/400/200/sports/" />
						</div>

						<div class="item">
							<img src="http://lorempixel.com/g/400/200/" />

						</div>
					</div>

					<!-- Controls →
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<span class="icon-prev"></span> </a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<span class="icon-next"></span> </a>
					</div>

					</div> <!-- End Carousel Code -->

				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

