function confirmbox(message, button_input, callback) {

    buttons = '<button data-dismiss="modal" class="btn btn-default">Cancella</button><button data-dismiss="modal" class="btn-confirm btn btn-warning">Ok</button>';

    /*
     * $('body') .append( '<div role="dialog" id="modalBox" class="modal fade
     * in" tabindex="-1" style="display: block;" aria-hidden="true"><div
     * class="modal-dialog"><div class="modal-content"><div
     * class="modal-header"><button data-dismiss="modal" type="button"
     * class="close">×</button><h3 class="modal-title"><a href="prodotto/Nome
     * modello 1.html">Nome modello 1</a></h3></div><div
     * class="modal-body">' + message + '</div><div class="modal-footer">' +
     * buttons + '</div></div></div></div>');
     */
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

$(document)
	.ready(
		function() {

		    $('textarea').text($('textarea').text().trim());

		    /* BootBox */
		    $('a.delete')
			    .on(
				    'click',
				    function() {
					message = 'Eliminare definitavemente il contenuto? Non sarà possile tornare indietro.';
					confirmbox(message, this, function(
						button_input) {
					    console.log($(button_input)
						    .parent().parent());
					    $(button_input).parent().parent()
						    .remove();
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
					'<div class="item"><img class="img-responsive" data-path="'
						+ $(this).data("path")
						+ '" alt="'
						+ $(this).attr("alt")
						+ '" src="' + image_path
						+ '" data-id="'
						+ $(this).data("id")
						+ '"/></div>').appendTo(
					'.modal-body .carousel-inner');

			    });

		    // Could be slid or slide (slide happens before animation,
		    // slid happens after)
		    $('#carousel-generic').bind(
			    'slid',
			    function() {

				// console.log($('.active img', this));
				var image = $('.active img', this);
				$('.modal-title').html(
					'<a href="' + image.data("path") + '">'
						+ image.attr("alt") + '</a>');
			    });

		    // Comportamento al click sulla lente d'ingandimento
		    $('.gallery-lightbox').click(
			    function() {

				var cell = $(this).parent().parent().parent();
				var active_image = $($(cell).children()[0])
					.children()[0];

				// console.log(active_title, active_image);

				$('.modal-title').html(
					'<a href="'
						+ $(active_image).data("path")
						+ '">'
						+ $(active_image).attr("alt")
						+ '</a>');

				$('.modal-body img').each(
					function(index, image) {
					    // console.log($(active_image).data("id"));
					    // console.log($(image).data("id"));

					    if ($(image).data("id") == $(
						    active_image).data("id"))
						$(image).parent().addClass(
							'active');
					    else
						$(image).parent().removeClass(
							'active');
					});
				// $('.modal-body img').empty();

				// Visualizza la finestra di dialogo per
				// lo slideshow
				$('#myModal').modal({
				    show : true
				});

			    });

		});
