<?php

function showLoginForm($inputs, $errs){
  echo '<form class="contact" method="post" action = "'; echo htmlspecialchars($_SERVER["PHP_SELF"]); echo '">
  
  <label for="email">E-mailadres:</label>
  <input type="text" id="email" name="email" value="'.$inputs['email'].'"></input>
  <span class="error">'.$errs['email'].'</span><br>
  
  <label for="pass">Wachtwoord:</label>
  <input type="password" id="password" name="password" value="'.$inputs['password'].'"></input>
  <span class="error">'.$errs['password'].'</span><br>
  
  <input type="submit" value="Submit">
  <input type="hidden" name="page" value="login">
 </form>
 
 ';}

?>