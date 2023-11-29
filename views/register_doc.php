<?php

require_once "forms_doc.php";

class RegisterDoc extends FormsDoc{

  protected function showTitle(){
    echo '<title>Register</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">Register</h1>';
  }

  private function showFormContent{
    showTextInput('Naam', 'name');
    showTextInput('Emailadres', 'email');
    showSubmit();
  }
  
}


?>