<?php 
$members 		=$users_dao->get_users(); //Array di utenti
$member_count 	= count($members);
//print_r($members);
?>

<div class="container">

  <div class="row">
    <button id="add-user" class="btn btn-default">Aggiungi utente</button>
  </div>

  <div class="row">
    <div class="table-responsive">
      <table class="table table-striped table-hover" data-name="users">
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
            <td><a href="mailto:<?= $member['email']?>"><?= $member['email']?> </a></td>
            <td><?= $member['partitaiva']?></td>
            <td><?= $member['ragionesociale']?></td>
            <td><?= $member['confirmed'] ? 'No': 'Si'?></td>
            <td><?php echo translateDate(date('j F Y', $member['time'])) ?></td>
            <td><a class="btn btn-primary" href="modifica/utente/<?= $member['id']?>.html"><?= _('Edit') ?> </a> <a
              data-id="<?= $member['id'] ?>" data-name="<?= $member['email'] ?>" class="btn btn-danger delete"><?= _('Delete') ?>
            </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- end row -->
</div>
<!-- end container -->

<script type="text/javascript">

$(document).ready(function(){

  // bottone aggiungi utente
  $('#add-user').click(function(e) {
    window.location = base_url + "aggiungi/utente.html";
  });
  // bottone Elimina
  $('a.delete').each(function() {

    $(this).click(function(e) {

      var $a = $(this);

      bootbox.dialog({
        message : "Eliminare definitavemente l'utente con email <b>" + $a.data("name") + "</b>? Non sarà possile tornare indietro.",
        title : "Conferma di eliminazione",
        buttons : {
          danger : {
            label : "Annulla",
            className : "btn-primary"
          },
          success : {
            label : "OK",
            className : "btn-danger",
            callback : function() {

              $.ajax({
                url : base_url + 'rest/user_rest.php?id=' + $a.data("id"),
                type : 'DELETE',
                success : function(response) {
                  message = "Utente <b>" + $a.data("name") + "</b> eliminato con successo.";
                  bootbox.alert(message);
                  var tr = $a.parent().parent();
                  // console.log(tr);
                  tr.remove();
                }
              });
            }
          }

        }
      });

    });

  });

});

</script>
