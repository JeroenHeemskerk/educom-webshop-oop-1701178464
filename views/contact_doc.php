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
    $this -> showSubmit();
  }
  
}


?>