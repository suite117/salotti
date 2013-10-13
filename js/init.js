$(document).ready(function() {
	
	$('textarea').text($('textarea').text().trim());
	
	// Activates editor
	$('#editor').summernote();

	// Activates the Carousel
	/* $('.carousel').carousel({
	interval : 5000
	});
	*/

	// Activates Tooltips for Social Links
	$('.tooltip-social').tooltip({
		selector : "a[data-toggle=tooltip]"
	});

	$('.gallery-lightbox').click(function() {

		var cell = $(this).parent().parent().parent().parent().children()[0];
		var image = $($(cell).children()[0]).children()[0];
		var image_path = $(image).attr("src");
		var title = $($(this).parent().parent().children()[0]).text();
		console.log(title);
		$('.modal-title').html(title);

		//$('.modal-body img').empty();

		//$(image).appendTo('.modal-body');
		//$('<img class="img-responsive" src="' + image_path + '"></img>').appendTo('.modal-body');
		$('#myModal').modal({
			show : true
		});

	});

});
