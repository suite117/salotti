function isSmartphone() {
  if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i)
      || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)
      || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i)) {
    return true;
  }
  return false;
}

$(document).ready(function() {

  // fix top menu
  $('.dropdown-submenu a').each(function() {

    $(this).click(function(e) {
      console.log(this);
      $(this).blur(); // remove focus per deselezionare
      // $(this).css('background-color', '#ffffff').css();
      e.stopPropagation(); // evita la chiusura del menu
    });

  });

  // caricamento linguaggi
  $(".languages a").click(function() {
    $.post(base_url + "locale/locale_rest.php", {
      lang : $(this).data("language")
    }).done(function(data) {
      location.reload();
    });
  });

  if (isSmartphone()) {
    
    // rimozione della barra sinistra
    $('#sidebar-left').remove();
    
    // fix per lo smartphone
    $("ul.navbar-right").css('background-color', 'black');
    $("ul.navbar-right a").css('color', 'white');
    $("#footer_information").parent().parent().next().prepend($("#footer_information"));
  }

  /* Widget Select */
  $('select').bootselect();

  // spazi fix
  // $('textarea').text($('textarea').text().trim());

  // sub menu principale fix per gli smartphone
  $('body').on('touchstart.dropdown', '.dropdown-menu', '.dropdown-submenu', function(e) {
    e.stopPropagation();
  });

  // Activates editor
  // $('#editor').summernote();

  // Activates the Carousel

  /*
   * $('.carousel').carousel({ interval : 3000 });
   */

  // Activates Tooltips for Social Links
  $('.tooltip-social').tooltip({
    selector : "a[data-toggle=tooltip]"
  });

});