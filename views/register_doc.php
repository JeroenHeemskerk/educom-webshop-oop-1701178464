<?php

require_once "forms_doc.php";

class RegisterDoc extends FormsDoc{

  protected function showTitle(){
    echo '<title>Register</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">Register</h1>';
  }

  protected function showFormContent(){
    $this -> showTextInput('Naam', 'name');
    $this -> showTextInput('Emailadres', 'email');
    $this -> showPasswordInput('Wachtwoord', 'password');
    $this -> showPasswordInput('Herhaal wachtwoord', 'pass2');
    $this -> showSubmit();
  }
  
}


?>