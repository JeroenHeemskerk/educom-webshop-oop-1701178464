<?php

require_once "basic_doc.php";

abstract class FormsDoc extends BasicDoc{
  private function showFormStart(){
    echo '<form class="contact" method="post" action = "'; echo htmlspecialchars($_SERVER["PHP_SELF"]); echo '">';
  }
  protected function showDropdownInput($options, $label, $name){
    echo '<label for="'.$name.'">'.$label.':</label>
    <select type="select" id="'.$name.'" name="'.$name.'">
    <option value=""></option>';
    for($x = 0; $x !== count($options); $x++){
      echo '<option value="'.$options[$x].'" '; if ($this -> model -> inputs[$name] == $options[$x]){echo 'selected = "selected"';} echo '>'.$options[$x].'</option>';
    }
    echo '</select>
    <span class="error">'.$this -> model -> errs[$name].'</span><br>';
  }
  protected function showTextInput($label, $name){
    echo '<label for='.$name.'>'.$label.':</label>
    <input type="text" id="'.$this -> model -> inputs[$name].'" name="'.$name.'" value="'.$this -> model -> inputs[$name].'"></input>
    <span class="error">'.$this -> model -> errs[$name].'</span><br>';
  }
  protected function showNumberInput($label, $name){
    echo '<label for='.$name.'>'.$label.':</label>
    <input type="number" id="'.$this -> model -> inputs[$name].'" name="'.$name.'" value="'.$this -> model -> inputs[$name].'"></input>
    <span class="error">'.$this -> model -> errs[$name].'</span><br>';
  }
  protected function showRadioInput($options, $optionLabels, $label, $name){
    echo '<label for="preference">'.$label.'</label>';
    for($x = 0; $x!== count($options); $x++){
      echo '<input type="radio" id="'.$options[$x].'" name="'.$name.'" '; 
      if (isset($this -> model -> inputs[$name]) && $this -> model -> inputs[$name]==$options[$x]) {
        echo "checked = checked";
      } 
      echo 'value="'.$options[$x].'">
      <label for="'.$options[$x]. '">'.$optionLabels[$x].'</label>';
    }
    echo '<span class="error">'.$this -> model -> errs[$name].'<br></span><br>';
  }
  protected function showFieldInput($label, $name){
    echo '<br><label for='.$name.'>'.$label.'</label>
    <textarea name="'.$name.'" rows="10" cols="30">'.$this -> model -> inputs[$name].'</textarea>
    <span class="error">'.$this -> model -> errs[$name].'</span><br>';
  }
  protected function showPasswordInput($label, $name){
    echo '<label for="'.$name.'">'.$label.':</label>
    <input type="password" id="'.$name.'" name="'.$name.'" value="'.$this -> model -> inputs[$name].'"></input>
    <span class="error">'.$this -> model -> errs[$name].'</span><br>';
  }
  protected function showSubmit(){
    echo '<input type="submit" value="Submit">
    <input type="hidden" name="page" value="contact">';
  }
  private function showHidden(){
    echo '<input type="hidden" name="page" value="'.$this -> model -> page.'">';
  }
  private function showFormEnd(){ 
    echo '</form>';
  }
  protected function showFormContent(){}//override which inputs you need

  protected function showContent(){
    $this -> showFormStart();
    $this -> showFormContent();
    $this -> showHidden();
    $this -> showFormEnd();
  }

}


?>