<?php 
require 'core/init.php';
//$general->logged_out_protect();
$members 		=$users->get_users(); //Array di utenti
$member_count 	= count($members);
print_r($members) ;
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Members</title>
</head>
<body>	
	<div id="container">
		<?php // include 'includes/menu.php';?>
		<h1>Our members</h1>
		<p>We have a total of <strong><?php echo $member_count; ?></strong> registered users. </p>
 
		<?php 
 
		foreach ($members as $member) {
			$email = $member['email'];
			?>
 
			<p><a href="profile.php?email=<?php echo $email; ?>"><?php echo $email?></a> Iscritto: <?php echo date('F j, Y', $member['time']) ?></p>
			<?php
		}
 
		?>
	</div>
</body>
</html>