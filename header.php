<!DOCTYPE html>
<html>
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">

<title><?= @$page_title ?></title>

<!-- JQuery core JavaScript -->
<?php if ($config['isOnline']) : ?>
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<?php else: ?>
<script type="text/javascript" src="<?= BASE_URL. 'js/jquery.js' ?>"></script>
<?php endif; ?>

<!--  Select plugin -->
<script type="text/javascript" src="<?=BASE_URL ?>js/bootstrap-select.js"></script>
<!-- Wrapper Select plugin -->
<script type="text/javascript" src="<?=BASE_URL ?>js/bootselect.js"></script>
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>css/bootstrap-select.css">

<!-- Bootstrap styles 3.0 -->
<?php if ($config['isOnline']) : ?>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<?php else: ?>
<link href="<?=BASE_URL ?>css/bootstrap.min.css" rel="stylesheet">
<?php endif; ?>

<!-- Add custom CSS here -->
<link href="<?=BASE_URL ?>css/modern-business.css" rel="stylesheet">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" />
<link href="<?=BASE_URL ?>css/style.css" rel="stylesheet">

<!-- Google Prettify -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.css" rel="stylesheet">

<!-- include summernote css/js-->
<link rel="stylesheet" href="<?=BASE_URL ?>css/summernote.css" />

<!--  ShareThis -->
<?php if ($config['isOnline']) : ?>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "d4fd2eca-29cc-4374-bbb3-f62b3fa033bf", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php endif; ?>

<!-- Bootstrap Form Helpers -->
<link href="<?=BASE_URL ?>css/bootstrap-formhelpers.min.css" rel="stylesheet" media="screen">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="<?=BASE_URL ?>js/html5shiv.js"></script>
      <script src="<?=BASE_URL ?>js/respond.min.js"></script>
    <![endif]-->


<!-- 2.3.2
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.js"></script>
    -->

<?php if ($general -> logged_in() === true) : ?>


<body data-base_url="<?= BASE_URL ?>">
  <?php else : ?>


<body oncontextmenu="return false;" data-base_url="<?= BASE_URL ?>">
  <?php endif;?>

  <script type="text/javascript">
//prepara l'url base per javascript
//l'url base per javascript
  var base_url = $("body").data("base_url");
</script>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-image: url('<?= BASE_URL ?>images/background_top.png')">
    <a class="navbar-brand" href="index.html"><img id="logo" src="<?=BASE_URL ?>images/logo.png" /> </a>
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only"><?= _("Toggle navigation")?> </span> <span class="icon-bar"></span> <span
            class="icon-bar"></span> <span class="icon-bar"></span>
        </button>
        <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">

        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?=BASE_URL ."index.html"?>"><?=_("Home")?> </a>
          
          <li><a hr ef="<?=BASE_URL
          
          ."azienda.html"?>"><?= _("Company") ?> </a>
          </li>
          <?php if ($general -> logged_in() === true) : ?>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=_("Products") ?><b
              class="caret"></b> </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
              <li><a href="<?=BASE_URL . "prodotti.html"?>"><?= _("Products list") ?> </a>
              
              <li><a href="<?=BASE_URL . "aggiungi"."/"."prodotto.html" ?>"><?= _("Add product") ?> </a>
              </li>
              <li><a href="<?=BASE_URL . "aggiungi"."/"."categoria.html"?>"><?= _("Add category") ?> </a>
              </li>
              <li><a href="<?=BASE_URL ?>lista-categorie.html"><?= _("Category list") ?> </a>
              </li>
              <li class="divider"></li>
              <li class="dropdown-submenu"><a tabindex="-1" href="#">Divani</a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="<?=BASE_URL . "prodotti"."/"."divani/"?>" alt="sofa"><?= _("All sofas") ?>
                  </a>
                  </li>
                  <li><a tabindex="-1" href="<?=BASE_URL . "prodotti"."/"."divani/divani-moderni/"?>"><?= _("All modern sofas") ?>
                  </a>
                  </li>
                  <li><a tabindex="-1" href="<?=BASE_URL . "prodotti"."/"."divani/divani-classici/"?>"><?= _("All classic sofa") ?>
                  </a>
                  </li>
                  <li><a tabindex="-1" href="<?=BASE_URL . "prodotti"."/"."divani/divani-letto/"?>"><?= _("Sofa beds") ?>
                  </a>
                  </li>
                </ul>
              </li>
              <li><a href="<?=BASE_URL ."prodotti"."/"."letti/"?>" alt="sofa"><?= _("Beds") ?> </a>
            
            </ul>
          </li>
          <?php if($general -> logged_in()) : ?>

          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= _("Administration") ?><b
              class="caret"></b> </a>
            <ul class="dropdown-menu">
              <?php  if($general -> isAdmin() === true): ?>
              <li><a href="<?=BASE_URL ?>lista-utenti.html"><?= _("User list") ?> </a>
              </li>
              <?php endif; ?>
              <?php if ($general -> logged_in() === true) : ?>
              <li><a href="<?=BASE_URL ?>lista-utenti.html"><?= _("My profile") ?> </a>
              </li>
              <?php endif;?>

            </ul>
          </li>
          <?php endif; ?>
          <?php  else:?>
          <li><a href="<?=BASE_URL. "prodotti.html"?>"><?= _("Products")?> </a>
          </li>
          <?php endif;?>

          <li><a href="<?=BASE_URL ."contatti.html" ?>"><?= _("Contacts") ?> </a>
          </li>
          <?php if ($general -> logged_in() === true) : ?>

          <li><a href="<?=BASE_URL. "logout.html"?>"><?= _("Logout") ?> </a>
          </li>
          <?php else : ?>

          <li><a href="<?=BASE_URL ?>login.html"><?= _("Login") ?> </a>
          </li>


          <?php endif; ?>

        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>