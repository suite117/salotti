<?php
$general->logged_out_protect();

//$prodotto = $products->get_single_product('id', 1);
$prodotto = array('id' => 1);
?>
<div class="container">
	<div class="row">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default panel-header">
				<div class="panel-heading">
					<h4 class="panel-title">Configura il modello e richiedi il
						preventivo</h4>
				</div>
			</div>
		</div>
	</div>
	<div style="float: right">
		<a href="<?=curUrl()?>prodotto/<?= $prodotto['id'] ?>/modifica.html"><button
				type="button" class="btn btn-default">Modifica</button> </a>
	</div>
	<div class="row">
		<div class="col-md-7 column-left">
			<div class="row">
				<div>
					<img class="img-responsive" src="<?=curUrl()?>images/modello.jpg">
				</div>
			</div>
		</div>
		<div class="col-md-5 column-right">
			<div class="row">
				<div class="col-md-12">
					<img class="img-responsive"
						src="<?=curUrl()?>images/anteprima_modello.png">
				</div>

			</div>
			<div class="row">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default colored">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse"
									data-parent="#accordion" href="#collapseThree"> Scegli la
									versione </a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse in">
							<div class="panel-body">
								<?php
								$versions=array("2 posti","laterale 2 posti","chaise longe","2 posti max","laterale 2 posti max","chaise longe max","laterale 3 posti","laterale 3 posti max");
								?>

								<table class="table">
									<tbody>
										<tr>
											<?php for ($i=0; $i< count($versions); $i++) : ?>
											<?php
											if($i%3==0)
												echo '<tr>';
											?>
											<td><a href="#"> <?=$versions[$i] ?>
											</a></td>
											<?php
											if(($i+1)%3==0)
												echo '</tr>';
											?>
											<?php endfor; ?>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
					</div>
					<!-- end Panel -->


					<div class="panel panel-default colored">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse"
									data-parent="#accordion" href="#collapseTwo"> Scegli il tessuto
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse in">
							<div class="panel-body">

								<table class="table text-center">
									<tbody>
										<?php for($i = 0; $i < 21; $i++):
										if ($i % 7 == 0) {
echo '<tr>';
}
?>
										<td style="padding: 7px;"><img
											style="width: 50px; height: 50px;"
											src="http://placehold.it/750x350" /></td>
										<?php
										if(($i+1)%7==0) {
										echo '</tr>';
										}
										?>
										<?php endfor; ?>
									</tbody>
								</table>

							</div>
						</div>
					</div>
					<!-- end Panel -->


					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse"
									data-parent="#accordion" href="#collapseOne"> Scheda tecnica </a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse colored">
							<div class="panel-body">Anim pariatur cliche reprehenderit, enim
								eiusmod high life accusamus terry richardson ad squid. 3 wolf
								moon officia aute, non cupidatat skateboard dolor brunch.</div>
						</div>
					</div>
					<!-- end Panel -->

				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

</div>
<!-- /.container -->

