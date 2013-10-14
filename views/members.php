<?php 
//$general->logged_out_protect();
$members 		=$users->get_users(); //Array di utenti
$member_count 	= count($members);
//print_r($members);
?>

<div class="container">
	<div class="table-responsive">
		<table class="table">
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
					<td><?= $member['confirmed']?></td>
					<td><?php echo translateDate(date('j F Y', $member['time'])) ?></td>
					<td>Modifica - Elimina</td>

					<?php endforeach; ?>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>
