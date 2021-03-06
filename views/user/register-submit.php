<?php

switch ($method) {
  case 'POST':
    if (empty($password) || empty($email))
      $errors[] = 'Devi compilare tutti i campi obbligatori.';

    #validating user's input with functions that we will create next
    if (strlen($password) < 6 | strlen($password) > 18)
      $errors[] = 'La password deve essere tra 6  e 18 caratteri';

    if($password !== $password_check)
      $errors[] = 'Le password devono coincidere.';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      $errors[] = 'Inserisci un\'email valida.';

    if ($users_dao -> email_exists($email))
      $errors[] = 'L\'email '. $email. ' esiste già.';

    if (empty($errors) === true) {
      
      $confirmed = false;
      if(!isset($username))
        $username = $email;
      
      $users_dao -> insert($confirmed, @$ragionesociale, @$partitaiva, $password, $email, @$firstname, @$lastname, @$indirizzo, @$numero_civico, @$citta, @$cap, @$telefono, @$cellulare, $username);

      $subject = "attivazione utente" . $email;
      $email_content = "Ciao, Un utente ha chiesto di registrarsi sul sito ,\r\n email" . $email ." ,\r\n partitaiva:" . $partitaiva .",\r\n Ragione sociale: " . $ragionesociale . " Clicca sul link sottostante per attivarlo :\r\n\r\nhttp://http://www.pulenergy.it/git/salotti/activate.html?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Example team";
      sendEmail($email, $site_email, $subject, $email_content);

      $success = 'Grazie per esserti registrato. Per favore controlla la tua email.';
    }
    break;
}


?>
