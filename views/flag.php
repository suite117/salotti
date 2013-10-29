<div class="container">
  <div class="bfh-selectbox bfh-languages" data-language="en_US" data-available="en_US,it_IT" data-flags="true">
    <input type="hidden" value=""> <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#"> <span
      class="bfh-selectbox-option bfh-selectbox-medium" data-option=""></span> <b class="caret"></b>
    </a>
    <div class="bfh-selectbox-options">
      <div role="listbox">
        <ul role="option">
        </ul>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function() {
$(".bfh-selectbox-options a").click(function() {
	  console.log($(this));

$.post( "test.php", { name: "John", time: "2pm" }).done(function( data ) {
alert( "Data Loaded: " + data );
});}); 
});

</script>
