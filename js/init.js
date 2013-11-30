function isSmartphone() {
  if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i)
	  || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)
	  || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i)) {
	return true;
  }
  return false;
}

function confirmbox(head, message, button_input, callback) {

  buttons = '<button data-dismiss="modal" class="btn btn-default">Cancella</button><button data-dismiss="modal" class="btn-confirm btn btn-warning">Ok</button>';

  modalDiv = '#modalBox';

  $(modalDiv + '.modal-title').html(head);
  $(modalDiv + ' .modal-footer').html(buttons);
  $(modalDiv + ' .btn-confirm').on('click', function() {
	callback(button_input, this);
  });

  $(modalDiv + ' .modal-body').html(message);

  $(modalDiv).modal({
	show : true
  });

}

$(document).ready(function() {

  // fix top menu
  $('.dropdown-submenu a').each(function() {

	$(this).click(function(e) {
	  console.log(this);
	  $(this).blur(); // remove focus per deselezionare
	  // $(this).css('background-color', '#ffffff').css();
	  e.stopPropagation(); // evita la chiusura del menu
	});

  });

  // caricamento linguaggi
  $(".languages a").click(function() {
	$.post(base_url + "locale/locale_rest.php", {
	  lang : $(this).data("language")
	}).done(function(data) {
	  location.reload();
	});
  });

  if (isSmartphone()) {
	$('#sidebar-left').remove();
	$("ul.navbar-right").css('background-color', 'white');
	$("ul.navbar-right a").css('color', 'black');
	$("#footer_information").parent().parent().next().prepend($("#footer_information"));
  }

  /* Widget Select */
  $('select').bootselect();

  // spazi fix
  // $('textarea').text($('textarea').text().trim());

  // sub menu principale fix per gli smartphone
  $('body').on('touchstart.dropdown', '.dropdown-menu', '.dropdown-submenu', function(e) {
	e.stopPropagation();
  });

  /* BootBox */
  $('a.delete').on('click', function() {
	message = 'Eliminare definitavemente il contenuto? Non sarà possile tornare indietro.';
	confirmbox("Eliminazione", message, this, function(button_input) {
	  // console.log($(button_input).parent().parent());
	  id = $(button_input).parent().parent().children()[0].innerHTML;
	  var tableEl = $(button_input).parent().parent().parent().parent();
	  console.log(tableEl);
	  $.ajax({

		type : "POST",
		data : {
		  "id" : id,
		  "table" : tableEl.data("name")
		},
		URL : "",

		success : function(msg) {

		  $(button_input).parent().parent().remove();

		}
	  });

	});

  });

  // Activates editor
  // $('#editor').summernote();

  // Activates the Carousel

  /*
   * $('.carousel').carousel({ interval : 3000 });
   */

  // Activates Tooltips for Social Links
  $('.tooltip-social').tooltip({
	selector : "a[data-toggle=tooltip]"
  });

});
