<script type="text/javascript">
$(document).ready(function() {

$.getJSON( "<?= curUrl() ?>rest/category_rest.php", function( data ) {
var items = [];
$.each( data, function( key, val ) {
items.push( "<li id='" + key + "'>" + val + "</li>" );
});
$( "<ul/>", {
"class": "my-new-list",
html: items.join( "" )
}).appendTo( "body" );
});
});

</script>
