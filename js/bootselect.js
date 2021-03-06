$.fn.bootselect = function(arg1, arg2, optionals) {

  if (arg1 == null) {
    this.selectpicker();
    return this;
  }

  var defaults = {
    "label" : "label",
    "value" : "value"
  };

  // make sure any supplied options take precedence over defaults

  if (optionals != null) {
    optionals = $.extend({}, defaults, optionals);
    this.data("label", optionals["label"]);
    this.data("value", optionals["value"]);
    this.data("callback", optionals["callback"]);
  }

  // console.log(this, arg1, arg2);

  switch (arg1) {
    case 'source':
      
      var options = arg2;
      //console.log(this);
      $('.bootstrap-select', this).remove();
      
      this.html('');
      if (!optionals.selected)
        this.append('<option value="">Nessuno</option>');

      for ( var i in options) {
        // console.log(options[i]);
        this.append($('<option>', {
          value : options[i][$(this).data("value")],
          text : options[i][$(this).data("label")]
        }));
      }
    
      break;
    case 'select':
      $select = this;
      selecteds = arg2;
      // console.log(selecteds);
      $.each(selecteds, function(index, selected) {
        $("option", $.fn.$select).each(function() {
          // console.log('selected', $select.data("value"),
          // selected[$select.data("value")], $(this).val());

          if ($(this).val() == selected[$select.data("value")])
            $(this).attr("selected", true);
        });
      });
      break;
    case 'onchange':
      console.log("tihs", this);
      $(this).callback = arg2;
      break;
  }

  this.selectpicker('refresh');
  return this;
};
