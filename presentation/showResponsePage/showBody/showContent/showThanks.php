<?php

function showThanks($inputs){
  echo '<p>Bedankt voor uw bericht.<br>Uw gegevens zijn:<br>';
  $labels = array('Aanhef', 'Naam', 'E-mailadres', 'Telefoonnummer', 'Straat', 'Huisnummer', 'Toevoeging', 'Postcode', 'Woonplaats', 'Communicatievoorkeur', 'Bericht');
  $index = 0;
  foreach($inputs as $key => $value){
  echo $labels[$index] . ': ' . $value . '<br>';
  $index++;
  }
  echo '</p>';
}

?>