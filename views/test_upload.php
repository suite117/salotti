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
          <div class="input-group"> <!-- form immagine -->
            <input id="image" name="image" type="text" class="form-control">
          </div>
          <!-- /input-group -->
        </div>
        <div class="col-md-2 col-lg-4">
          <div id="image-thumbnail"></div> <!-- div destinzione dell'anteprima -->
        </div>
      </div>
      <!-- /.form-group -->

    </form>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){ 
      
		$("#image").bootupload({base_url : base_url, type : "image", preview_id : 'image-thumbnail', multi : true });
    });
  </script>