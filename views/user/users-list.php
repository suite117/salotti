<?php 
require 'delete-user.php';

$members 		=$users->get_users(); //Array di utenti
$member_count 	= count($members);
//print_r($members);
?>

<div class="container">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Cognome</th>
					<th>Email</th>
					<th>Partita IVA</th>
					<th>Ragione sociale</th>
					<th>Attivo</th>
					<th>Iscritto dal</th>
					<th>Operazioni</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($members as $member) :?>
				<tr>
					<td><?= $member['id']?></td>
					<td><?= $member['nome']?></td>
					<td><?= $member['cognome']?></td>
					<td><a href="mailto:<?= $member['email']?>"><?= $member['email']?>
					</a></td>
					<td><?= $member['partitaiva']?></td>
					<td><?= $member['ragionesociale']?></td>
					<td><?= $member['confirmed'] ? 'No': 'Si'?></td>
					<td><?php echo translateDate(date('j F Y', $member['time'])) ?></td>
					<td><a class="btn btn-primary" href="modifica/utente/<?= $member['id']?>.html"> Modifica</a>

						<!-- Button trigger modal --> <a data-toggle="modal"
						href="#modalBox" class="btn btn-danger delete">Elimina</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</div>


<!-- Modal box -->
<div tabindex="-1" class="modal fade" id="modalBox" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">×</button>
				<h3 class="modal-title">Heading</h3>
			</div>
			<div class="modal-body" style="padding: 15px;">
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">Chiudi</button>
			</div>
		</div>
	</div>
</div>
