<?php
require 'views/core/init.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<title><?php
if (isset($page_title))
	echo 'Prodotto ' . $page_title;
?> Alessi salotti</title>

<!-- Bootstrap core CSS -->
<link href="<?=curURL() ?>css/bootstrap.min.css" rel="stylesheet">

<!-- Add custom CSS here -->
<link href="<?=curURL() ?>css/modern-business.css" rel="stylesheet">
<link rel="stylesheet"
	href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" />
<link href="<?=curURL() ?>css/style.css" rel="stylesheet">

<!-- Google Prettify -->
<link
	href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.css"
	type="text/css">

<!-- include summernote css/js-->
<link rel="stylesheet" href="<?=curURL() ?>css/summernote.css" />

</head>

<?php if ($general -> logged_in() === true) : ?>
<body>
	<?php else : ?>


<body oncontextmenu="return false;">
	<?php endif;?>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-image: url('<?= CurUrl() ?>images/background_top.png')">
		<a class="navbar-brand" href="index.html"><img id="logo"
			src="<?=curURL() ?>images/logo.png" /> </a>
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?=curUrl() ?>index.php">Home</a>
					</li>
					<?php if ($general -> logged_in() === true) : ?>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown">Prodotti <b class="caret"></b>
					</a>
						<ul class="dropdown-menu">
							<li><a href="<?=curUrl() ?>prodotti.html">Lista Prodotti</a>
							
							<li><a href="<?=curUrl() ?>aggiungi/prodotto.html">Aggiungi
									prodotto</a></li>
					
					</li>
					<li><a href="<?=curUrl() ?>prodotto/sofa/divano1.html">Sofa</a>
					</li>
					<li><a href="<?=curUrl() ?>prodotto/bed/letto1.html">Bed</a>
					</li>
				</ul>
				</li>
				
				<?php
							
							if($general -> isAdmin() === true) : ?>
				
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown">Amministrazione<b class="caret"></b>
				</a>
					<ul class="dropdown-menu">
						<li><a href="<?=curUrl() ?>lista-utenti.html">Lista utenti</a></li>
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

	<div style="height: 40px;">&nbsp;</div>