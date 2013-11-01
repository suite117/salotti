function isSmartphone() {
  if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i)
	  || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)
	  || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i)) {
	return true;
  }
  return false;
}

function confirmbox(message, button_input, callback) {

  buttons = '<button data-dismiss="modal" class="btn btn-default">Cancella</button><button data-dismiss="modal" class="btn-confirm btn btn-warning">Ok</button>';

  modalDiv = '#modalBox';

  $(modalDiv + ' .modal-footer').html(buttons);
  $(modalDiv + ' .btn-confirm').on('click', function() {
	callback(button_input, this);
  });

  $(modalDiv + ' .modal-body').html(message);

  $(modalDiv).modal({
	show : true
  });

}

$(document).ready(
	function() {

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
		confirmbox(message, this, function(button_input) {
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

	  // Carousel #carousel-generic
	  // Inizializzazione immagini slideshow
	  // $('.modal-body .carousel-inner').html('');
	  $('.col-md-3 a img').each(
		  function(index, image) {
			// console.log(index, image);
			var image_path = $(image).attr("src");
			$(
				'<div class="item"><img class="img-responsive" data-path="' + $(this).data("path")
					+ '" alt="' + $(this).attr("alt") + '" src="' + image_path + '" data-id="'
					+ $(this).data("id") + '"/></div>').appendTo('.modal-body .carousel-inner');

		  });

	  // Could be slid or slide (slide happens before animation,
	  // slid happens after)
	  $('#carousel-generic').bind(
		  'slid',
		  function() {

			// console.log($('.active img', this));
			var image = $('.active img', this);
			$('.modal-title').html(
				'<a href="' + image.data("path") + '">' + image.attr("alt") + '</a>');
		  });

	  // Comportamento al click sulla lente d'ingandimento
	  $('.gallery-lightbox').click(
		  function() {

			var cell = $(this).parent().parent().parent();
			var active_image = $($(cell).children()[0]).children()[0];

			// console.log(active_title, active_image);

			$('.modal-title').html(
				'<a href="' + $(active_image).data("path") + '">' + $(active_image).attr("alt")
					+ '</a>');

			$('.modal-body img').each(function(index, image) {
			  // console.log($(active_image).data("id"));
			  // console.log($(image).data("id"));

			  if ($(image).data("id") == $(active_image).data("id"))
				$(image).parent().addClass('active');
			  else
				$(image).parent().removeClass('active');
			});
			// $('.modal-body img').empty();

			// Visualizza la finestra di dialogo per
			// lo slideshow
			$('#modal-carousel').modal({
			  show : true
			});

		  });

	});
