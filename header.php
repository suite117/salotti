<!DOCTYPE html>
<html lang="it">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<title><?= isset($page_title) ? 'Prodotto ' . $page_title : ''?> Alessi salotti</title>

<!-- JQuery core JavaScript -->
<?php if ($config['isOnline']) : ?>
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<?php else: ?>
<script type="text/javascript" src="<?= curUrl(). 'js/jquery.js' ?>"></script>
<?php endif; ?>

<!-- Bootstrap styles -->
<link href="<?=curURL() ?>css/bootstrap.min.css" rel="stylesheet">

<!-- Add custom CSS here -->
<link href="<?=curURL() ?>css/modern-business.css" rel="stylesheet">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" />
<link href="<?=curURL() ?>css/style.css" rel="stylesheet">

<!-- Google Prettify -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.css" type="text/css">

<!-- include summernote css/js-->
<link rel="stylesheet" href="<?=curURL() ?>css/summernote.css" />

<!--  ShareThis -->
<?php if ($config['isOnline']) : ?>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "d4fd2eca-29cc-4374-bbb3-f62b3fa033bf", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php endif; ?>
</head>

<?php if ($general -> logged_in() === true) : ?>
<body>
  <?php else : ?>


  
<body oncontextmenu="return false;">
  <?php endif;?>

  <div class=row>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-image: url('<?= CurUrl() ?>images/background_top.png')">
      <a class="navbar-brand" href="index.html"><img id="logo" src="<?=curURL() ?>images/logo.png" /> </a>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
          class="icon-bar"></span>
      </button>
      <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">


      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=curUrl() ?>index.html">Home</a><li><a href="<?=curUrl() ?>azienda.html">Azienda</a>
            </li>
            <?php if ($general -> logged_in() === true) : ?>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Prodotti <b class="caret"></b>
            </a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                <li><a href="<?=curUrl() ?>prodotti.html">Lista Prodotti</a>
                
                
            
            <li><a href="<?=curUrl() ?>aggiungi/prodotto.html">Aggiungi prodotto</a>
            
            </li>
            <li><a href="<?=curUrl() ?>aggiungi/categoria.html">Aggiungi categoria</a>
            </li>
            <li><a href="<?=curUrl() ?>lista-categorie.html">Lista categorie</a>
            
            </li>
                <li class="divider"></li>
                <li class="dropdown-submenu"><a tabindex="-1" href="#">Divani</a>
                  <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="<?=curUrl() ?>prodotti/divani/" alt="sofa">Tutti i divani</a>
                
                </li>
                    <li><a tabindex="-1" href="<?=curUrl() ?>prodotti/divani/divani-moderni/">Divani moderni</a>
                
                </li>
                    <li><a tabindex="-1" href="<?=curUrl() ?>prodotti/divani/divani-classici/">Divani classici</a>
                
                </li>
                    <li><a tabindex="-1" href="<?=curUrl() ?>prodotti/divani/divani-letto/">Divani letto</a>
                
                </li>
                  </ul>
                </li>
                <li><a href="<?=curUrl() ?>prodotti/letti/" alt="sofa"">Letti</a>
              
              
          
          </ul>
        
        </li>

            <?php if($general -> logged_in()) : ?>

            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Amministrazione<b
            class="caret"></b>
            </a>
              <ul class="dropdown-menu">
                <?php  if($general -> isAdmin() === true): ?>
                <li><a href="<?=curUrl() ?>lista-utenti.html">Lista utenti</a>
            
            </li>
                <?php endif; ?>
                <?php if ($general -> logged_in() === true) : ?>
                <li><a href="<?=curUrl() ?>lista-utenti.html">Il mio profilo</a>
            
            </li>
                <?php endif;?>
              </ul>
            </li>

            <?php endif; ?>

            <?php  else:?>
            <li><a href="<?=curUrl() ?>prodotti.html">Prodotti</a> <?php endif;?>
            
            
        
        <li><a href="<?=curUrl() ?>contatti.html">Contatti</a> <?php if ($general -> logged_in() === true) : ?>
            
            
        
        <li><a href="<?=curUrl() ?>logout.html">Esci</a> <?php else : ?>
            
            
        
        <li><a href="<?=curUrl() ?>login.html">Accedi</a>
            </li>
            </li>
            <?php endif; ?>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

