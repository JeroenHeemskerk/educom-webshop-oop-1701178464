<?php

require_once "forms_doc.php";

class ContactDoc extends FormsDoc{

  protected function showTitle(){
    echo '<title>Contact</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">Contact</h1>';
  }

  protected function showFormContent(){
    $this -> showDropdownInput(array('Dhr.', 'Mvr.', 'Reiziger'), 'Aanhef', 'salutation', '');
    $this -> showTextInput('Naam', 'name');
    $this -> showTextInput('Emailadres', 'email');
    $this -> showTextInput('Telefoonnummer', 'phone');
    $this -> showTextInput('Straatnaam', 'street');
    $this -> showNumberInput('Huisnummer', 'house');
    $this -> showTextInput('Toevoeging huisnummer', 'addition');
    $this -> showTextInput('Postcode', 'zipcode');
    $this -> showTextInput('Woonplaats', 'residence');
    $this -> showRadioInput(array('email', 'phone', 'mail'), array('E-mail', 'Telefoon', 'Post'), 'Communicatievoorkeur', 'preference');
    $this -> showFieldInput('Voer hier uw bericht in:', 'message');
    $this -> showSubmit();
  }
  
}


?>