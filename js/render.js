function confirmbox(head, message, button_input, callback) {

  buttons = '<button data-dismiss="modal" class="btn btn-default">Cancella</button><button data-dismiss="modal" class="btn-confirm btn btn-warning">Ok</button>';

  modalDiv = '#modalBox';

  $(modalDiv + '.modal-title').html(head);
  $(modalDiv + ' .modal-footer').html(buttons);
  $(modalDiv + ' .btn-confirm').on('click', function() {
    callback(button_input, this);
  });

  $(modalDiv + ' .modal-body').html(message);

  $(modalDiv).modal({
    show : true
  });

}

JSON2List = function(destination_div_id, json_list, optionals) {

  var defaults = {
      "label" : "label",
      "value" : "value"
    };

    // make sure any supplied options take precedence over defaults
    if (optionals != null) {
      optionals = $.extend({}, defaults, optionals);
    }
  
  var ul = $('<ul>');
  $(json_list).each(function(index, item) {
    ul.append($(document.createElement('li')).text(item[optionals["label"]] + "(" + item[optionals["value"]] + ")"));
  });
  ul.appendTo('#' + destination_div_id);
  
};


JSON2SortableList = function(destination_div_id, json_list, optionals) {

  var defaults = {
      "label" : "label", // nome del campo etichetta di default
      "value" : "value" // nome del campo valore univoco di default
    };

    // make sure any supplied options take precedence over defaults
    if (optionals != null) {
      optionals = $.extend({}, defaults, optionals);
    }
  
  $(json_list).each(function(index, item) {
    var liText = '<li data-label="'+ item[optionals["label"]] +'" data-value="'+ item[optionals["value"]] +'" ';
    liText += 'class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' + item[optionals["label"]] + "(" + item[optionals["value"]] + ")" + '</li>';
    $('#' + destination_div_id).append(liText);
  });
  
};

SortableList2JSON = function(destination_div_id, optionals) {
  
  var items= [];
  $.each($('#' + destination_div_id).children(), function(index, item) {
    // costrusico l'oggetto per la lista json
    var new_item = {};
    new_item[optionals["label"]] = $(item).data('label');
    new_item[optionals["value"]] = $(item).data('value');
    items.push(new_item);
  });
  
  return items;
};


$.fn.justext = function(arg1) {
  return 
$(this).clone()    // clone the element
.children() // select all the children
.remove()   // remove all the children
.end()  // again go back to selected element
.text();
};
