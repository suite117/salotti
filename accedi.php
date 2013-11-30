<?

//richiamo la facebook php sdk
require 'facebook/src/facebook.php';

//mi collego a facebook, sostituisco i parametri AppID e AppSecret con quelli della mia App
$app_id = '538820556212922';
$app_secret = '2f8ebda7f834b9e33946acb1e2e426c5';
$facebook = new Facebook(array(
		'appId' => $app_id,
		'secret' => $app_secret,
));

// Verifico se l'utente è connesso altrimenti lo collego
$user = $facebook->getUser();

//Controlla se l'utente è loggato su Facebook
if ($user) {
	try {
		 
		// Cose da fare se l'utente è connesso
		// Stampo informazioni dell'utente

		$user_profile = $facebook->api('/me');

		$first = $user_profile['first_name'];
		echo "Benvenuto ";
		echo $first;
		echo " ";
		$last = $user_profile['last_name'];
		echo $last;
		echo "<p>";

		$FB_ID = $user_profile['id'];
		echo "Il tuo Facebook ID e': ";
		echo $FB_ID;
		echo "<p>";

		$FB_LINK = $user_profile['link'];
		echo "Il tuo Facebook Link e': ";
		echo $FB_LINK;
		echo "<p>";

		$compleanno = $user_profile['birthday'];
		echo "Sei nato il: ";

		$separatore="/";
		$suddivisa=explode($separatore, $compleanno);
		$mese=$suddivisa[0];
		$giorno=$suddivisa[1];
		$anno=$suddivisa[2];

		echo $giorno;
		echo"/";
		echo $mese;
		echo "/";
		echo $anno;
		echo "<p>";

		$citta = $user_profile['location']['name'];

		echo "Vivi a : ";
		echo $citta;
		echo "<p>";

		$cittanatale = $user_profile['hometown']['name'];
		if($cittanatale){
			echo "Sei nato a : ";
			echo $cittanatale;
			echo "<p>";
		}
		$istruzione = $user_profile['education'][0]['school']['name'];
		if($istruzione){
			echo "Istruzione : ";
			echo $istruzione;
			echo "<p>";
		}

		$sesso = $user_profile['gender'];
		echo "Sei: ";
		if($sesso=="male"){
			$sesso="Maschio";
		}
		else if($sesso=="female"){
			$sesso="Femmina";
		}
		echo $sesso;
		echo "<p>";

		$lingua = $user_profile['locale'];
		echo "Lingua: ";
		$intermezzo="_";
		$tokenlingua=explode($intermezzo, $lingua);
		$lingua=$tokenlingua[1];
		echo $lingua;
		echo "<p>";

		echo "<img src='http://graph.facebook.com/$FB_ID/picture'/>";

		echo "<p>";

	} catch (FacebookApiException $e) {
		 
		//se avviene qualche errore lo segnalo
		error_log($e);
		$user = null;
	}
} else {
	 
	//se l'utente non è loggato faccio fare il login automatico
	$params = array(
			'scope' => 'user_birthday',
	);
	$loginUrl = $facebook->getLoginUrl($params);
	echo("<script> top.location.href='" . $loginUrl . "'</script>");
}
?>