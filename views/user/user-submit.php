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
      $confirmed = true;
      $users_dao -> insert($confirmed, @$ragionesociale, @$partitaiva, $password, $email, @$firstname, @$lastname, @$indirizzo, @$numero_civico, @$citta, @$cap, @$telefono, @$cellulare, $username);

      $success = 'Utente con email ' . $email . ' aggiunto con successo.';
    }
    break;
}

?>
