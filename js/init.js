$(document).ready(
	function() {

	    $('textarea').text($('textarea').text().trim());

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
					+ $(this).data("path") + '" alt="'
					+ $(this).attr("alt") + '" src="'
					+ image_path + '" data-id="'
					+ $(this).data("id") + '"/></div>')
				.appendTo('.modal-body .carousel-inner');

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
	    $('.gallery-lightbox')
		    .click(
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
