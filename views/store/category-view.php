<div class="container">

  <div class="row">
    <div class="col-md-12">

      <h2>
        <?= _('Category sort') ?>
      </h2>
      <div class="dd" id="njson"></div>
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->

</div>
<!-- end container -->

<script type="text/javascript">

  $(document).ready(function() {

    $.getJSON(base_url + 'rest/category_rest.php?nested=true', function(data) {

      $('#njson').bootnestable({
        group : 1,
        source : data,
        label : 'category_name',
        value : 'category_id',
        parent_label : 'category_parent_id'
      }).on('change', function(e) {

        // invio categorie aggiornate
        var list = e.length ? e : $(e.target);
        var output = $(this).bootnestable('serialize');
        console.log("output", output);
        // POST to server using $.post or $.ajax
        $.post(base_url + 'rest/category_rest.php', {
          "data" : output
        });

      });

      // Aggiunta bottoni (Aggiungi categoria - Elimina categoria)
      $('#njson .dd-item').each(function() {
        var $div = $("<div />").css('float', 'right').css('margin', '5px 10px');

        // recupero l'handle e i suoi attributi
        $ddhandle = $('.dd-handle', this).first();
        //console.log($ddhandle.text());

        $div.append('<a href="modifica/categoria/' + $ddhandle.data('id') + '.html">'
            + '<?= _("Edit") ?> <i class="icon-edit"></i></a>');
        $div.append(' | <a class="delete" href="#" data-id="' + $ddhandle.data('id') + '" data-name="'
            + $ddhandle.text() + '">' + '<?= _("Delete") ?> <i class="icon-trash"></i></a>');
        $(this).prepend($div);
      });

      // bottone Elimina
      $('a.delete').each(function() {

        $(this).click(function(e) {

          var $a = $(this);

          bootbox.dialog({
            message : "Eliminare definitavemente la categoria <b>" + $a.data("name") + "</b>? Non sarà possile tornare indietro.",
            title : "Conferma di eliminazione",
            buttons : {
              danger : {
                label : '<?= _('Cancel') ?>',
                className : "btn-primary"
              },
              success : {
                label : '<?= _('OK') ?>',
                className : "btn-danger",
                callback : function() {

                  $.ajax({
                    url : base_url + 'rest/category_rest.php?id=' + $a.data("id"),
                    type : 'DELETE',
                    success : function(response) {
                      message = "Categoria <b>" + $a.data("name") + "</b> eliminata con successo.";
                      //bootbox.alert(message);
                      var tr = $a.parent().parent();
                      // console.log(tr);
                      tr.remove();
                      $('.dd-item').each(function() {
                        if ($(this).data("id") == $a.data("id"))
                          $(this).remove();
                      });
                    }
                  });
                }
              }

            }
          });

        });

      });


     
      // Pulsante aggiungi
      $add = $('<button class="btn btn-default">Aggiungi categoria</button>');
      $add.click(function(e) {
        // redirect
        //window.location = base_url + "aggiungi/categoria.html";

        var form = '<form action="" method="post" role="form" class="form-horizontal">';
        form += '<div class="form-group "><div class="col-md-8">';
        form += '<label class="control-label" for="category_name"><?= _('Category name') ?></label> <input type="text" placeholder="Iserisci il nome della categoria" value="" id="category_name" name="category_name" class="form-control">';
        form += '</div><div class="col-md-4">';
        form += '<label class="control-label" for="category_parent_id"><?= _('Parent category') ?></label> <select id="category_parent_id" name="category_parent_id" class="form-control" style="display: none;"></select>';          
        form +='</div></div></form>';

        // messaggio ???
        var message =  $('#category-form').html();
        $('#category-form').remove();
        
        
        bootbox.dialog({
          message : form,
          title : '<?= _('Add category') ?>',
          buttons : {
            danger : {
              label : '<?= _('Cancel') ?>',
              className : "btn-primary"
            },
            success : {
              label : '<?= _('OK') ?>',
              className : "btn-success",
              callfirst : function(){
                // recupera le categorie
                $.getJSON(base_url + 'rest/category_rest.php' , function(data) {
            		$('#category_parent_id').bootselect('source', data, {"label" : "category_name", "value": "category_id" });
                });
              },
              callback : function() {

                $modal_body = $('.modal-body');
                //console.log($modal_body);

                // recupera i valori dal form
                var category_name = $modal_body.find('form input[name=category_name]').val();
                //console.log('category_name', category_name); 
                
                $.ajax({
                  url : base_url + 'rest/category_rest.php',
                  type : 'POST',
                  data : {"command" : "INSERT", "data" : { "category_name" : category_name, "category_parent_id" : $("#category_parent_id").val()  }},
                  success : function(response) {
                    message = "Categoria <b>" + category_name + "</b> aggiunta con successo.";
                    //bootbox.alert(message);
                    // ricarica la pagina
                    window.location.reload();
                    
                  }
                }); 
              }
            }

          }
        });

      }); // end a click
      

      // appende il pulsante al menu delle categorie
      $('.nestable-menu').append($add);

    });
  	 
      
     

  });
</script>



