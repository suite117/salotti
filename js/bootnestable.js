$.fn.bootnestable = function(arg1) {

  // var $container = $(this);
  function getList(item, $list, optionals) {

    if ($.isArray(item)) {
      $.each(item, function(key, value) {
        getList(value, $list, optionals);
      });
      return;
    }

    var tagName = $list.prop("tagName");

    if (item) {
      // console.log(item[optionals.value]);
      var $li = $('<li data-id="' + item[optionals.value] + '" />').addClass(optionals.item_class);

      if (item[optionals.label]) {
        // $li.append($('<a href="#">' + item[field_name] + '</a>'));
        $li.append($('<div class="dd-handle" data-id="' + item[optionals.value] + '">' + item[optionals.label]
            + '</div>'));

      }
      if (item.children && item.children.length) {

        var $sublist = $("<" + tagName + "/>").addClass(optionals.list_class);// $("<ul/>");
        getList(item.children, $sublist, optionals);
        $li.append($sublist);
      }
      $list.append($li);
    }
  }

  function menuClick(e) {
    var target = $(e.target);
    var action = target.data('action');
    var target_id = target.data('target-id');

    $('#' + target_id + " button").toggle();
    $('#' + target_id).nestable(action);

  }

  if (jQuery.isPlainObject(arg1)) {
    $.fn.optionals = arg1;

    var $bt1 = $('<button type="button" data-action="expandAll" class="btn btn-default">Espandi tutto</button>')
        .data("target-id", this.attr("id"));
    var $bt2 = $('<button type="button" data-action="collapseAll" class="btn btn-default">Comprimi tutto</button>')
        .data("target-id", this.attr("id"));

    var $menu = $('<menu class="nestable-menu" />').append($bt1).append($bt2);

    $bt1.on('click', menuClick).hide();
    $bt2.on('click', menuClick);

    this.prepend($menu);

    var defaults = {

      list_class : "dd-list",
      item_class : "dd-item"
    };
    if ($.fn.optionals != null) {
      if ($.fn.optionals.source != null) {
        $.fn.optionals = $.extend({}, defaults, $.fn.optionals);
        var $ol = $('<ol></ol>').addClass($.fn.optionals.list_class);

        getList($.fn.optionals.source, $ol, $.fn.optionals);
        $ol.appendTo(this);
      }

      return this.nestable($.fn.optionals);

    } else {
      return this.nestable();

    }
  } else {
    switch (arg1) {
      // creazione json di uscita
      case 'serialize':

        var items = [];
        var $li_arr = this.find("li");
        $.each($li_arr, function(index, li) {
          // console.log(li);
          var item = {};
          // console.log("first", $($(li).children()[0]).text());
          item[$.fn.optionals.label] = $($(li).children()[0]).text();
          item[$.fn.optionals.value] = $(li).data("id");
          item[$.fn.optionals.parent_label] = $(li).parent().parent().data("id");
          items.push(item);
        });
        // console.log(items);
        return items;
        break;
    }
  }

  return this;
};