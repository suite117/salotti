<?php require 'contact-submit.php'; ?>

<!-- Page Content -->

<div class="container">

	<div class="row">

		<div class="col-lg-12">
			<!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
			<iframe width="100%" height="300" frameborder="0" scrolling="no"
				marginheight="0" marginwidth="0"
				src="https://www.google.it/maps?t=m&amp;q=Alessi+Salotti+Di+Alessi+Giuseppe&amp;ie=UTF8&amp;hq=Alessi+Salotti+Di+Alessi+Giuseppe&amp;hnear=Palermo,+Sicilia&amp;ll=37.62623,13.64236&amp;spn=0.575741,1.352692&amp;z=10&amp;iwloc=A&amp;cid=15823759186442111769&amp;output=embed"></iframe>
			<br /> <small><a
				href="https://www.google.it/maps?t=m&amp;q=Alessi+Salotti+Di+Alessi+Giuseppe&amp;ie=UTF8&amp;hq=Alessi+Salotti+Di+Alessi+Giuseppe&amp;hnear=Palermo,+Sicilia&amp;ll=37.62623,13.64236&amp;spn=0.575741,1.352692&amp;z=10&amp;iwloc=A&amp;cid=15823759186442111769&amp;source=embed"
				style="color: #0000FF; text-align: left">Visualizzazione ingrandita
					della mappa</a> </small>
		</div>

	</div>
	<!-- /.row -->

	<div class="row">

		<div class="col-sm-8">
			<h3>Modulo di contatto</h3>
			<p>Compilando il modulo puoi inviarci qualsiasi richiesta di
				carattere informativo.</p>
			<?php
			// check for a successful form post
			if (isset($success))
				echo "<div class=\"alert alert-success\">" . $success . "</div>";

			// check for a form error
			elseif (isset($errors))
			foreach ($errors as $error)
				echo "<div class=\"alert alert-danger\">" . $error . "</div>";
			?>
			<form role="form" method="POST" action="">
				<div class="form-group col-lg-4">
					<label for="input1">Nome</label> <input type="text"
						name="contact_name" class="form-control" id="input1"
						value="<?=@$name ?>">

				</div>
				<div class="form-group col-lg-4">
					<label for="input2">Indirizzo email</label> <input type="email"
						name="contact_email" class="form-control" id="input2"
						value="<?=@$email_address ?>">
				</div>
				<div class="form-group col-lg-4">
					<label for="input3">Telefono</label> <input type="phone"
						name="contact_phone" class="form-control" id="input3"
						value="<?=@$phone ?>">
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-lg-12">
					<label for="input4">Messaggio</label>
					<textarea name="contact_message" class="form-control" rows="6"
						id="input4">
				<?=@$message ?>
			</textarea>
				</div>
				<div class="form-group col-lg-12">
					<input type="hidden" name="save" value="contact">
					<button type="submit" class="btn btn-primary">Invia messaggio</button>
				</div>
			</form>
		</div>

		<div class="col-sm-4">
			<h3>Alessi salotti</h3>
			<h4>bed and sofa</h4>
			<p>
				Indirizzo <br> 92020, San Giovanni Gemini (AG) <br>
			</p>
			<p>
				<span class="glyphicon glyphicon-phone"></span> 0922 xxxxx
			</p>
			<p>
				<span class="glyphicon glyphicon-envelope"></span> <a
					href="mailto:feedback@startbootstrap.com">feedback@startbootstrap.com</a>
			</p>
			<p>
				<span class="glyphicon glyphicon-time"></span> Lunedì - Venerdì:
				Dalle 9:00 alle 17:00
			</p>
			<ul class="list-unstyled list-inline list-social-icons">
				<li class="tooltip-social facebook-link"><a href="#facebook-page"
					data-toggle="tooltip" data-placement="top" title="Facebook"><i
						class="icon-facebook-sign icon-2x"></i> </a>
				</li>
				<li class="tooltip-social linkedin-link"><a
					href="#linkedin-company-page" data-toggle="tooltip"
					data-placement="top" title="LinkedIn"><i
						class="icon-linkedin-sign icon-2x"></i> </a>
				</li>
				<li class="tooltip-social twitter-link"><a href="#twitter-profile"
					data-toggle="tooltip" data-placement="top" title="Twitter"><i
						class="icon-twitter-sign icon-2x"></i> </a>
				</li>
				<li class="tooltip-social google-plus-link"><a
					href="#google-plus-page" data-toggle="tooltip" data-placement="top"
					title="Google+"><i class="icon-google-plus-sign icon-2x"></i> </a>
				</li>
			</ul>
		</div>

	</div>
	<!-- /.row -->

</div>
<!-- /.container -->
