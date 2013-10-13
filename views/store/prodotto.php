<?php
# utilizzo del metodo query()
// definizione della query
$sql='SELECT prodotto.id, prodotto.nome, prodotto.idcategoria FROM prodotto LEFT JOIN categoria ON prodotto.idcategoria = categoria.id ORDER BY prodotto.nome';
// visualizzazione dei risultati
foreach($db->query($sql) as $row) {
//print_r($row);
/*echo $row['id'].'<br>';
 echo $row['nome'].'<br>';
 echo $row['idcategoria'].'<br>'; */
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 header" style="padding-left: 10px;">
			Configura il modello e richiedi il preventivo
		</div>
	</div>
	<div class="row">
		<div class="col-md-7 column-left">
			<div class="row">
				<div>
					<img class="img-responsive" src="<?=curUrl()?>images/modello.png">
				</div>
			</div>
			<div class="row">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">Scegli la versione</h4>
						</div>
						<div class="panel colored">
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
								<td><a href="#">
								<?=$versions[$i] ?>
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
				</div>
			</div>
		</div>
		<div class="col-md-5 column-right">
			<div class="row">
				<div class="col-md-12">
					<img class="img-responsive" src="<?=curUrl()?>images/anteprima_modello.png" />
				</div>
			</div>

			<div class="row">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
								
						<div class="panel-heading marrone">
							<h4 class="panel-title"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Scheda tecnica </a></h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse colored">
							<div class="panel-body">
								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
							</div>
						</div>
					</div>
					<div class="panel panel-default template colored">
						<div class="panel-heading">
							<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Scegli il tessuto </a></h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse in">
							<div class="panel-body">

								<table class="table text-center">
									<tbody>
										<?php for($i = 0; $i < 21; $i++):
if ($i % 7 == 0) {
echo '<tr>';
}
										?>
										<td style="padding: 7px;"><img style="width: 50px; height: 50px;" src="http://placehold.it/750x350" /></td>
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
				</div>
			</div><!-- /.row -->
		</div><!-- /.col -->
	</div><!-- /.row -->

</div><!-- /.container -->

