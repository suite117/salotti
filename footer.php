</div>



<footer style="background-image: url('<?= BASE_URL ?>images/footer.png'); background-repeat:repeat-x">

  <div class="row first">
    <div class="col-sx-1 col-md-4">
      <table>
        <tbody>
          <tr>
            <td><ul>
                <li><b>SOFA</b></li>
                <li>&nbsp;</li>
                <li>Divani moderni</li>
                <li>Divani classici</li>
                <li>Divani letto</li>
              </ul></td>
            <td>
              <ul>
                <li><b>BED</b></li>
                <li>&nbsp;</li>
                <li>Letti</li>
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="col-sx-1 col-md-4 text-center">
      <!-- AddThis Widget -->
      <p>Seguici su</p>
      <div class="addthis_toolbox addthis_32x32_style addthis_default_style">
        <a class="addthis_button_facebook_follow" addthis:userid="YOUR-PROFILE" alt="Seguici su Facebook"></a> <a
          class="addthis_button_twitter_follow" addthis:userid="YOUR-USERNAME"></a> <a
          class="addthis_button_google_follow" addthis:userid="googt"></a> <a class="addthis_button_pinterest_follow"
          addthis:userid="pinttes"></a>
      </div>
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-526e58b6283c3045"></script>
      <!-- AddThis Follow END -->
    </div>
    <div class="col-sx-0 col-md-1"></div>
    <div id="footer_information" class="col-sx-1 col-md-2" style="font-size: 10px;">
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

<!-- Bootstrap 3.0 core JavaScript -->
<?php if ($config['isOnline']) : ?>
<script type="text/javascript"
  src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<?php else: ?>
<script type="text/javascript"
  src="<?=BASE_URL. 'js/bootstrap.min.js' ?>"></script>
<?php endif; ?>

<!-- Bootstrap Form Helpers -->
<script src="<?=BASE_URL ?>js/bootstrap-formhelpers.js"></script>

<!-- Plugin multiselect per la selezione multipla -->
<script type="text/javascript"
  src="<?=BASE_URL ?>js/bootstrap-multiselect.js"></script>
<link rel="stylesheet"
  href="<?=BASE_URL ?>css/bootstrap-multiselect.css" type="text/css" />

<!-- Plugin PekeUpload per l'upload di immagini-->
<script type="text/javascript" src="<?=BASE_URL ?>js/pekeUpload.js"></script>
<!-- Wrapper plugin PekeUpload -->
<script type="text/javascript"
  src="<?=BASE_URL ?>js/bootupload.js"></script>

<!-- Nestable Plugin 2.0 -->
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery.nestable.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/bootnestable.js"></script>

<!-- BootBox 4.1.0 -->
<script src="<?= BASE_URL ?>js/bootbox.js"></script>

<!-- Left Menu Scrollspy -->

<!-- Main -->
<script src="<?= BASE_URL ?>js/init.js"></script>
<!-- Classe Render per la conversione JSON/ELEMENTI HTML -->
<script src="<?= BASE_URL ?>js/render.js"></script>
<!--

//-->
</script>
</body>
</html>
