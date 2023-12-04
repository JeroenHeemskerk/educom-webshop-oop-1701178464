<?php

require_once "forms_doc.php";

class LoginDoc extends FormsDoc{

  protected function showTitle(){
    echo '<title>Login</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">Login</h1>';
  }

  protected function showFormContent(){
    $this -> showTextInput('Emailadres', 'email');
    $this -> showPasswordInput('Wachtwoord', 'password');
    $this -> showSubmit();
  }
  
}


?>