$.fn.bootupload = function(optionals) {

  var defaults = {
	theme : 'bootstrap',
	multi : false,
	allowedExtensions : "jpeg|jpg|png|gif",
	base_url : "./",
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

  //console.log($("#" + id));
  

  $("#" + optionals.preview_id).append();

  $('#' + id).pekeUpload(optionals);
  return this;
};