/*
 *  PekeUpload 1.0.6 - jQuery plugin
 *  written by Pedro Molina
 *  http://www.pekebyte.com/
 *
 *  Copyright (c) 2013 Pedro Molina (http://pekebyte.com)
 *  Dual licensed under the MIT (MIT-LICENSE.txt)
 *  and GPL (GPL-LICENSE.txt) licenses.
 *
 *  Built for jQuery library
 *  http://jquery.com
 *
 */
(function($) {

    $.fn.pekeUpload = function(options) {

	// default configuration properties
	var defaults = {
	    onSubmit : false,
	    btnText : "Sfoglia...",
	    url : "upload.php",
	    theme : "custom",
	    field : "file",
	    data : null,
	    multi : false,
	    showFilename : true,
	    showPercent : true,
	    showErrorAlerts : true,
	    allowedExtensions : "",
	    invalidExtError : "Invalid File Type",
	    maxSize : 0,
	    sizeError : "Size of the file is greather than allowed",
	    onFileError : function(file, error) {
	    },
	    onFileSuccess : function(file, data) {
	    }
	};

	var options = $.extend(defaults, options);

	// Main function
	var obj;
	var file = new Object();
	var fileinput = this;
	this
		.each(function() {
		    obj = $(this);
		    // HTML code depends of theme

		    if (options.theme == "bootstrap") {
			var html = '<a href="javascript:void(0)" class="btn btn-primary btn-file"> <span class="icon-upload icon-white"></span> '
				+ options.btnText
				+ '</a><div class="help-block"></div>';
		    }

		    obj.after(html);
		    obj.hide();
		    // Event when clicked the newly created link
		    obj.next('a').click(function() {
			obj.click();
		    });
		    // Event when user select a file
		    obj
			    .change(function() {

				file.name = obj.val().split('\\').pop();
				file.size = (obj[0].files[0].size / 1024) / 1024;

				$(".filename", obj.parent().parent()).val(
					file.name);
				// console.log($(".filename",
				// obj.parent().parent()));

				if (validateresult() == true) {
				    if (options.onSubmit == false) {
					UploadFile();
					$(
						".upload-image",
						obj.parent().parent().parent()
							.parent()).html(
						'<img class="img-responsive" src="'
							+ options.base_url
							+ options.relative_url
							+ file.name + '" />');
				    } else {
					/*
					 * obj.next('a').next('div').prepend( '<input
					 * type="text" readonly
					 * class="form-control" value="' +
					 * file.name + '">');
					 */
					obj.parent('form').bind(
						'submit',
						function() {
						    obj.next('a').next('div')
							    .html('');
						    UploadFile();
						});
				    }
				}
			    });
		});
	// Function that uploads a file
	function UploadFile() {
	    var error = true;
	    if (options.theme == "bootstrap") {

		var htmlprogress = '<div class="progress progress-striped"><div class="progress-bar pekeup-progress-bar" style="width: 0%;"><span class="badge badge-info"></span></div></div>';
	    }
	    obj.next('a').next('div').html(htmlprogress);
	    var formData = new FormData();
	    formData.append(options.field, obj[0].files[0]);
	    formData.append('data', options.data);
	    $
		    .ajax({
			url : options.base_url
				+ options.url
				+ (options.relative_url != null ? '?path='
					+ options.relative_url : ''),
			type : 'POST',
			data : formData,
			// dataType: 'json',
			success : function(data) {
			    var percent = 100;
			    obj.next('a').next('div').find(
				    '.pekeup-progress-bar:first').width(
				    percent + '%');
			    obj.next('a').next('div').find(
				    '.pekeup-progress-bar:first').text(
				    percent + "%");
			    if (data == 1) {
				if (options.multi == false) {
				    obj.attr('disabled', 'disabled');
				}
				options.onFileSuccess(file, data);
			    } else {
				options.onFileError(file, data);
				obj.next('a').next('div').find('.file:first')
					.remove();
				if ((options.theme == "bootstrap")
					&& (options.showErrorAlerts == true)) {
				    obj
					    .next('a')
					    .next('div')
					    .prepend(
						    '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> '
							    + data + '</div>');
				    bootstrapclosenotification();
				}
				if ((options.theme == "custom")
					&& (options.showErrorAlerts == true)) {

				    obj
					    .next('a')
					    .next('div')
					    .prepend(
						    '<div class="alert-pekeupload"><button type="button" class="close" data-dismiss="alert">&times;</button> '
							    + data + '</div>');
				    customclosenotification();
				}
				error = false;
			    }
			},
			xhr : function() { // custom xhr
			    myXhr = $.ajaxSettings.xhr();
			    if (myXhr.upload) { // check if upload property
				// exists
				myXhr.upload.addEventListener('progress',
					progressHandlingFunction, false); // for
				// handling
				// the
				// progress
				// of
				// the
				// upload
			    }
			    return myXhr;
			},
			cache : false,
			contentType : false,
			processData : false
		    });
	    return error;
	}
	// Function that updates bars progress
	function progressHandlingFunction(e) {
	    if (e.lengthComputable) {
		var total = e.total;
		var loaded = e.loaded;
		if (options.showFilename == true) {
		    // console.log(obj.parent().parent());
		    $(".filename", obj.parent().parent()).val(file.name);

		    // obj.next('a').next('div').find('.file').first().find(
		    // '.filename:first').text(file.name);
		}
		if (options.showPercent == true) {
		    var percent = Number(((e.loaded * 100) / e.total)
			    .toFixed(2));
		    obj.next('a').next('div').find('.file').first().find(
			    '.pekeup-progress-bar:first').width(percent + '%');
		}
		obj.next('a').next('div').find('.file').first().find(
			'.pekeup-progress-bar:first').html(
			'<center>' + percent + "%</center>");
	    }
	}
	// Validate master
	function validateresult() {
	    var canUpload = true;
	    if (options.allowedExtensions != "") {
		var validationresult = validateExtension();
		if (validationresult == false) {
		    canUpload = false;
		    if ((options.theme == "bootstrap")
			    && (options.showErrorAlerts == true)) {
			obj
				.next('a')
				.next('div')
				.prepend(
					'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> '
						+ options.invalidExtError
						+ '</div>');
			bootstrapclosenotification();
		    }
		    if ((options.theme == "custom")
			    && (options.showErrorAlerts == true)) {
			obj
				.next('a')
				.next('div')
				.prepend(
					'<div class="alert-pekeupload"><button type="button" class="close">&times;</button> '
						+ options.invalidExtError
						+ '</div>');
			customclosenotification();
		    }
		    options.onFileError(file, options.invalidExtError);
		} else {
		    canUpload = true;
		}
	    }
	    if (options.maxSize > 0) {
		var validationresult = validateSize();
		if (validationresult == false) {
		    canUpload = false;
		    if ((options.theme == "bootstrap")
			    && (options.showErrorAlerts == true)) {
			obj
				.next('a')
				.next('div')
				.prepend(
					'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> '
						+ options.sizeError + '</div>');
			bootstrapclosenotification();
		    }
		    if ((options.theme == "custom")
			    && (options.showErrorAlerts == true)) {
			obj
				.next('a')
				.next('div')
				.prepend(
					'<div class="alert-pekeupload"><button type="button" class="close" data-dismiss="alert">&times;</button> '
						+ options.sizeError + '</div>');
			customclosenotification();
		    }
		    options.onFileError(file, options.sizeError);
		} else {
		    canUpload = true;
		}
	    }
	    return canUpload
	}
	// Validate extension of file
	function validateExtension() {
	    var ext = obj.val().split('.').pop().toLowerCase();
	    var allowed = options.allowedExtensions.split("|");
	    if ($.inArray(ext, allowed) == -1) {
		return false;
	    } else {
		return true;
	    }
	}
	// Validate Size of the file
	function validateSize() {
	    if (file.size > options.maxSize) {
		return false;
	    } else {
		return true;
	    }
	}
	// Function that allows close alerts of bootstap
	function bootstrapclosenotification() {
	    obj.next('a').next('div').find('.alert-error').click(function() {
		$(this).remove();
	    });
	}
	function customclosenotification() {
	    obj.next('a').next('div').find('.alert-pekeupload').click(
		    function() {
			$(this).remove();
		    });
	}
    };

})(jQuery);