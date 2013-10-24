<script type="text/javascript">
$(document).ready(function() {

	$.getJSON( "<?= curUrl() ?>rest/category_rest.php", function( list ) {
	   console.log(list);
		var items = [];
		$.each( list, function( index, element ) {


			
			$.each(element, function(property, value ){
			    items.push( value );
				});
			
		});
		console.log(items);
		$( "#content" ).append(items);
		
	}); 
});

</script>
