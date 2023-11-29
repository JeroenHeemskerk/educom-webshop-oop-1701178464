<?php

require_once "basic_doc.php";

abstract class FormsDoc extends BasicDoc{
  private function showFormStart(){
    echo '<form class="contact" method="post" action = "'; echo htmlspecialchars($_SERVER["PHP_SELF"]); echo '">';
  }
  protected function showDropdownInput($options, $label, $name, $err){
    echo '<label for="'.$name.'">'.$label.':</label>
    <select type="select" id="'.$name.'" name="'.$name.'">
    <option value=""></option>';
    foreach($options as $value){
      echo '<option value="'.$value.'" '; if ($this -> data[$name] == $value){echo 'selected = "selected"';} echo $value.'</option>';
    }
    echo '</select>
    <span class="error">'.$err.'</span><br>';
  }
  protected function showTextInput($label, $name){
    echo '<label for="name">'.$label.':</label>
    <input type="text" id="'.$name.'" name="'.$name.'" value="'.$this -> data[$name].'"></input>
    <span class="error">'.$errs['name'].'</span><br>';
  }
  protected function showRadioInput(){

  }
  protected function showFieldInput(){}
  
  protected function showSubmit(){
    echo '<input type="submit" value="Submit">
  <input type="hidden" name="page" value="contact">';
  }
  private function showFormEnd(){ 
    echo '</form>';
  }

  protected function showFormContent(){}//override which inputs you need

  protected function showContent(){
    $this -> showFormStart();
    $this -> showFormContent();
    $this -> showFormEnd();
  }

}


?>