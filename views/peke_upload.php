<div class="container">

  <div id="header">
    <h1>PekeUpload jQuery Plugin</h1>
  </div>

  <div id="content">
    <h2>Demos</h2>

    <form class="form-horizontal" role="form" method="post" action="">
      <div class="form-group">
        <label for="name" class="col-md-2">Immagine</label>
        <div class="col-md-6">
          <div class="input-group">
            <input type="text" readonly class="form-control filename"> <span class="input-group-btn"><input type="file"
              id="file" name="file" /> </span>
          </div>
          <!-- /input-group -->
        </div>
        <div class="col-md-2 col-lg-4">
          <div class="upload-image"></div>
        </div>
      </div>
      <!-- /.form-group -->

    </form>
  </div>



  <script type="text/javascript">
function fileError(file,error){
    alert("Errore sul file: "+file.name+" Errore: "+error+"");
   }

    $(document).ready(function(){ 
	$("#file").pekeUpload({theme:'bootstrap', multi: false, allowedExtensions:"jpeg|jpg|png|gif", base_url: "<?=curUrl() ?>", relative_url : 'uploads/'});
      
    });
  </script>