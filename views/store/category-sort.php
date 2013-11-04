 <div class="dd" id="njson"></div>


<script type="text/javascript">
// activate Nestable for list 1
$(document).ready(function() {
$.getJSON(base_url + 'rest/category_rest.php?nested=true', function(data) {
			

			$('#njson').bootnestable({
			  group : 1,
			  source : data,
			  label : 'category_name',
			  value : 'category_id',
			  parent_label : 'category_parent_id'
			}).on('change', function(e) {
				var list = e.length ? e : $(e.target);
				var output = $(this).bootnestable('serialize');
				console.log(output);
				// POST to server using $.post or $.ajax
				// POST to server using $.post or $.ajax
$.ajax({
    data: output,
    type: 'POST',
    url: base_url + 'rest/category_rest.php'
});
				
		       
	});
});
});
</script>


