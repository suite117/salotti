<div class="container">

	<hr>

	<footer>
		<div class="row">
			<div class="col-lg-12">
				<p>
					Copyright &copy; Company 2013
				</p>
			</div>
		</div>
	</footer>

</div><!-- /.container -->

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Bootstrap lightbox -->
<script src="//rawgithub.com/ashleydw/lightbox/master/js/ekko-lightbox.js"></script>
<script type="text/javascript">
    $(document).ready(function($) {
        $('#open-image').click(function(e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
        $('#open-youtube').click(function(e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
        $('#open-source-image').click(function(e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
        $('#open-source-youtube').click(function(e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
    });
</script>
<!-- Bootstrap Core -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=curURL() ?>js/summernote.min.js"></script>

<!-- Main -->
<script src="<?= curUrl() ?>js/init.js"></script>

</body>
</html>