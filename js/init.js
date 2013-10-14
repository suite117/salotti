$(document).ready(function() {

    $('textarea').text($('textarea').text().trim());

    // Activates editor
    // $('#editor').summernote();

    // Activates the Carousel
    /*
     * $('.carousel').carousel({ interval : 5000 });
     */

    // Activates Tooltips for Social Links
    $('.tooltip-social').tooltip({
	selector : "a[data-toggle=tooltip]"
    });

    // Carousel #carousel-generic
    // Inizializzazione immagini slideshow
    $('.col-md-3 a img').each(function(index, image) {
	console.log(index, image);
	var image_path = $(image).attr("src");
	$('<div class="item"><img src=' + image_path + ' /></div>').appendTo(

	'.modal-body .carousel-inner');

    });

    // Comportamento al click sulla lente d'ingandimento
    $('.gallery-lightbox').click(function() {

	var zoom_in = $(this).parent().parent().parent().parent().children()[0];
	var active_image = $($(zoom_in).children()[0]).children()[0];
	var active_image_path = $(active_image).attr("src");
	var active_title = $($(this).parent().parent().children()[0]).text();
	
	console.log(active_title, active_image_path);
	$('.modal-title').html(active_title);

	// $('.modal-body img').empty();

	$('.carousel-indicators').each(function(index, value) {
	    console.log(index, value);
	});

	// Visualizza la finestra di dialogo per
	// lo slideshow
	$('#myModal').modal({
	    show : true
	});

    });

});
