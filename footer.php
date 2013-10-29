</div>

<hr>

<footer style="background-image: url('<?= CurUrl() ?>images/footer.png')">

  <div class="row" style="padding: 85px 60px;">
    <div class="col-sx-1 col-md-2">
      <ul>
        <li><b>SOFA</b></li>
        <li>&nbsp;</li>
        <li>Divani moderni</li>
        <li>Divani classici</li>
        <li>Divani letto</li>
      </ul>
    </div>
    <div class="col-sx-1 col-md-3">
      <ul>
        <li><b>BED</b></li>
        <li>&nbsp;</li>
        <li>Letti</li>
      </ul>
    </div>
    <div class="col-sx-1 col-md-4">
      <br> <span class='st_facebook_large' displayText='Facebook'></span> <span class='st_twitter_large'
        displayText='Tweet'></span> <span class='st_pinterest_large' displayText='Pinterest'></span> <span
        class='st_googleplus_large' displayText='Google +'></span>
    </div>
    <div class="col-sx-0 col-md-1"></div>
    <div class="col-sx-1 col-md-2" style="font-size: 10px;">
      <b>ALESSI SALOTTI</b><br>di Alessi Giuseppe<br> <br>contrada Cultrera<br>San Giovanni Gemini, AG 92020<br>
      telefono : 0922 901540<br>e-mail : <br>P. IVA :
    </div>
  </div>
  <!-- /.row -->
</footer>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <p>Copyright &copy; Company 2013</p>
    </div>
  </div>
</div>
<!-- Placed at the end of the document so the pages load faster -->

<!-- JQuery UI core JavaScript -->
<script type="text/javascript"
  src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<!-- Bootstrap core JavaScript -->
<?php if ($config['isOnline']) : ?>
<script type="text/javascript"
  src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<?php else: ?>
<script type="text/javascript" src="<?=curUrl(). 'js/bootstrap.min.js' ?>"></script>
<?php endif; ?>

<!-- Bootstrap Form Helpers -->
<script src="<?=curUrl() ?>js/bootstrap-formhelpers.min.js"></script>

<!-- Plugin multiselect per la selezione multipla -->
<script type="text/javascript"
  src="<?=curUrl() ?>js/bootstrap-multiselect.js"></script>
<link rel="stylesheet"
  href="<?=curUrl() ?>css/bootstrap-multiselect.css" type="text/css" />

<!-- Plugin PekeUpload per l'upload di immagini-->
<script type="text/javascript"
  src="<?=curUrl() ?>js/pekeUpload.js"></script>

<!-- BootBox 4.1.0 -->
<script src="<?= curUrl() ?>js/bootbox.js"></script>

<!-- Main -->
<script src="<?= curUrl() ?>js/init.js"></script>
</body>
</html>
