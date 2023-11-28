<?php

function showForm($inputs, $errs){
  echo '<form class="contact" method="post" action = "'; echo htmlspecialchars($_SERVER["PHP_SELF"]); echo '">
  <label for="salutation">Aanhef:</label>
  <select type="select" id="salutation" name="salutation">
   <option value=""></option>
   <option value="Dhr." '; if ($inputs['salutation'] == "Dhr."){echo 'selected = "selected"';} echo '>Dhr.</option>
   <option value="Mvr." '; if ($inputs['salutation'] == "Mvr."){echo 'selected = "selected"';} echo '>Mvr.</option>
   <option value="Reiziger" '; if ($inputs['salutation'] == "Reiziger"){echo 'selected = "selected"';} echo '>Reiziger</option>
  </select>
  <span class="error">'.$errs['salutation'].'</span><br>
  
  <label for="name">Naam:</label>
  <input type="text" id="name" name="name" value="'.$inputs['name'].'"></input>
  <span class="error">'.$errs['name'].'</span><br>
  
  <label for="email">E-mailadres:</label>
  <input type="text" id="email" name="email" value="'.$inputs['email'].'"></input>
  <span class="error">'.$errs['email'].'</span><br>
  
  <label for="phone">Telefoonnummer:</label>
  <input type="text" id="phone" name="phone" value="'.$inputs['phone'].'"></input>
  <span class="error">'.$errs['phone'].'</span><br>
  
  <label for="street">Straat:</label>
  <input type="text" id="street" name="street" value="'.$inputs['street'].'"></input>
  <span class="error">'.$errs['street'].'</span><br>
  
  <label for="house">Huisnummer:</label>
  <input type="number" id="house" name="house" value="'.$inputs['house'].'"></input>
  <span class="error">'.$errs['house'].'</span><br>
  
  <label for="addition">Toevoeging:</label>
  <input type="text" id="addition" name="addition" value="'.$inputs['addition'].'"></input>
  <span class="error">'.$errs['addition'].'</span><br>
  
  <label for="zipcode">Postcode:</label>
  <input type="text" id="zipcode" name="zipcode" value="'.$inputs['zipcode'].'"></input>
  <span class="error">'.$errs['zipcode'].'</span><br>
  
  <label for="residence">Woonplaats:</label>
  <input type="text" id="residence" name="residence" value="'. $inputs['residence'].'"></input>
  <span class="error">'.$errs['residence'].'</span><br>
  
  <label for="preference">Communicatievoorkeur</label>
  <input type="radio" id="email" name="preference" '; 
  if (isset($inputs['preference']) && $inputs['preference']=="email") {echo "checked = checked";} echo 'value="email">
  <label for="email">E-mail</label>
  <input type="radio" id="phone" name="preference" '; 
  if (isset($inputs['preference']) && $inputs['preference']=="phone") {echo "checked = checked";} echo 'value="phone">
  <label for="phone">Telefoon</label>
  <input type="radio" id="mail" name="preference" '; 
  if (isset($inputs['preference']) && $inputs['preference']=="mail") {echo "checked = checked";} echo 'value="mail">
  <label for="mail">Post</label>
  <span class="error">'.$errs['preference'].'</span><br>
  
  <label for="message">Waar wilt u contact over opnemen?</label>
  <textarea name="message" rows="10" cols="30">'.$inputs['message'].'</textarea>
  <span class="error">'.$errs['message'].'</span><br>

  
  <input type="submit" value="Submit">
  <input type="hidden" name="page" value="contact">
 </form>
 
 ';}
?>