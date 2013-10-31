$.fn.bootupload = function(optionals) {

  var defaults = {
	theme : 'bootstrap',
	multi : false,
	allowedExtensions : "jpeg|jpg|png|gif",
	base_url : "/",
	relative_url : 'files/',
	type : "file",
	readonly : true,
	input_text_id : this.attr("id")
  };

  optionals = $.extend({}, defaults, optionals);

  if (optionals.readonly == true)
	this.attr("readonly", true);

  var id = this.attr("id") + '-file';
  this.after('<span class="input-group-btn"><input type="file" id="' + id
	  + '" name="file" /></span>');

  // console.log($("#" + id));
  if (optionals.type == 'image') {
	var file_name = $("#" + optionals.input_text_id).val();
	if (file_name.length != 0) {
	  var img = '<img class="img-responsive" src="' + optionals.base_url + optionals.relative_url
		  + file_name + '" />';
	  $("#" + optionals.preview_id).html(img);
	}
  }

  $('#' + id).pekeUpload(optionals);
  return this;
};