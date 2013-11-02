
<script>
		$(document)
			.on('change', '.btn-file :file', function() {
				var input = $(this),
				numFiles = input.get(0).files ? input.get(0).files.length : 1,
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [numFiles, label]);
		});
		
		$(document).ready( function() {
			$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
				
				var input = $(this).parents('.input-group').find(':text'),
					log = numFiles > 1 ? numFiles + ' files selected' : label;
				
				if( input.length ) {
					input.val(log);
				} else {
					if( log ) alert(log);
				}
				
			});
		});		
	</script>

<body>

  <div class="container" style="margin-top: 20px;">
    <div class="row">

      <div class="col-lg-6 col-sm-6 col-12">
        <div class="jumbotron">
          <h1>Bootstrap File Input Demo</h1>
          <p class="text-muted">Requires Bootstrap 3</p>
        </div>
      </div>

      <div class="col-lg-6 col-sm-6 col-12">
        <h4>Standard Button</h4>
        <span class="file-input btn btn-primary btn-file"> Browse&hellip; <input type="file" multiple>
        </span>
      </div>
      <div class="col-lg-6 col-sm-6 col-12">
        <h4>
          Block-level Button <span class="file-input btn btn-block btn-primary btn-file"> Browse&hellip; <input
            type="file" multiple>
          </span>
      
      </div>

      <div class="col-lg-6 col-sm-6 col-12">
        <h4>Button Groups</h4>
        <div class="btn-group">
          <a href="#" class="btn btn-primary">Action 1</a> <a href="#" class="btn btn-primary">Action 2</a> <span
            class="btn btn-primary btn-file"> Browse&hellip; <input type="file" multiple>
          </span>
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 col-12">
        <h4>Input Groups</h4>
        <div class="input-group">
          <span class="input-group-btn"> <span class="btn btn-primary btn-file"> Browse&hellip; <input type="file"
              multiple>
          </span>
          </span> <input type="text" class="form-control" readonly>
        </div>
        <span class="help-block"> Try selecting one or more files and watch the feedback </span>
      </div>

      <hr>

      <div class="col-12" style="margin-bottom: 20px;">
        <a class="btn btn-default"
          href="http://www.abeautifulsite.net/blog/2013/08/whipping-file-inputs-into-shape-with-bootstrap-3/"> &laquo;
          Back to the blog </a>
      </div>

    </div>
  </div>