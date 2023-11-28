<?php

function showRegForm($inputs, $errs){
  echo '<form class="contact" method="post" action = "'; echo htmlspecialchars($_SERVER["PHP_SELF"]); echo '">
  
  <label for="name">Naam:</label>
  <input type="text" id="name" name="name" value="'.$inputs['name'].'"></input>
  <span class="error">'.$errs['name'].'</span><br>
  
  <label for="email">E-mailadres:</label>
  <input type="text" id="email" name="email" value="'.$inputs['email'].'"></input>
  <span class="error">'.$errs['email'].'</span><br>
  
  <label for="pass1">Wachtwoord:</label>
  <input type="password" id="password" name="password" value="'.$inputs['password'].'"></input>
  <span class="error">'.$errs['password'].'</span><br>
  
  <label for="pass2">Wachtwoord:</label>
  <input type="password" id="pass2" name="pass2" value="'.$inputs['pass2'].'"></input>
  <span class="error">'.$errs['pass2'].'</span><br>
  
  <input type="submit" value="Submit">
  <input type="hidden" name="page" value="register">
 </form>
 
 ';}

?>