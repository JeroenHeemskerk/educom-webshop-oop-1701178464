<?php

function processRequest($inputs, $errs, $page){
  foreach ($inputs as $key => $value){
    if (isset($_POST[$key])){
      $inputs[$key] = testInput($_POST[$key]);
    }
  }
  switch ($page){
    case 'contact':
      $errs = processContact($inputs, $errs);
      break;
    case 'register':
      $errs = processRegister($inputs, $errs);
      break;
    case 'login':
      $errs = processLogin($inputs, $errs);
  }
  return array($inputs, $errs);
}

function testInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function processLogin($inputs, $errs){
  $errs = emptyCheck(array('email', 'password'), $errs, $inputs);
  if (empty($errs['email']) && empty($errs['password'])){
    list($errs, $id) = validLogin($inputs['email'], $inputs['password'], $errs);
  }
  if (empty($errs['email']) && empty($errs['password'])){
    $_SESSION['user'] = array('name'=> getName($inputs['email']), 'email' => $inputs['email'], 'id' => $id);
  }
  return($errs);
}

function validLogin($email, $password, $errs){
  if (!emailExists($email)){
    $errs['email'] = 'Er is geen account geassociëerd met dit e-mailadres.';
    return array($errs, '');
  } else {
    $rightPass = getPass($email);
    if ($password == $rightPass){
      $id = getID($email);
      return(array($errs, $id));
    }
  }
  $errs['password'] = 'Onjuist wachtwoord.';
  return array($errs, '');
}

function emptyCheck($checks, $errs, $inputs){
  foreach($checks as $value){
    if (empty($inputs[$value]) && isset($inputs[$value])){
      $errs[$value] = $value.' veld mag niet leeg zijn.';
    }
  }
  return $errs;
}

function processContact($inputs, $errs){
  if (empty($inputs["salutation"])) {
    $errs['salutation'] = "Aanhef is verplicht";
  } 
  if (empty($inputs["name"])) {
    $errs['name'] = "Naam is verplicht";
  }
    
  if (empty($inputs["preference"])) {
    $errs['preference'] = "Communicatievoorkeur is verplicht";
  }
    
  if (empty($inputs["message"])) {
    $errs['message'] = "Bericht is verplicht";
  } 
    
  if (empty($inputs["email"])) {
    if ($inputs['preference'] == "email"){
      $errs['email'] = "E-mailadres is verplicht";
    }
  }
    
  if (empty($inputs["phone"])) {
    if ($inputs['preference'] == "phone"){
      $errs['phone'] = "Telefoon is verplicht";
    }
  }
  
  $address = false;
  $adress = ($inputs['preference'] == 'mail' || !empty($inputs['street']) || !empty($inputs['house']) || !empty($inputs['addition']) || 
                                         !empty($inputs['zipcode']) || !empty($inputs['residence']));
  if ($address){
    if (empty($inputs["street"])){
      $errs['street'] = "Vul a.u.b. straat in.";
    }
    if (empty($inputs["house"] )) {
      $errs['house'] = "Vul a.u.b. huisnummer in.";
    }
    if (empty($inputs["zipcode"] )) {
      $errs['zipcode'] = "Vul a.u.b. postcode in.";
    } 
    if (empty($inputs["residence"] )) {
      $errs['residence'] = "Vul a.u.b. woonplaats in.";
    } 
  }
  return $errs;
}

function validate($valid, $errs, $page, $inputs){
  if(!array_filter($errs)){
	  $valid = true;
      switch ($page){
      case 'contact':
        $page = 'thanks';
        break;
      case 'register':
        dataWrite($inputs['email'], $inputs['name'], $inputs['password']);
        $page = 'login';
        break;
      case 'login':
        $page = 'home';
        break;
      }
  }
  return(array($page, $valid));
}

function processRegister($inputs, $errs){
  if (empty($inputs['email'])){
      $errs['email'] = 'vul a.u.b. uw e-mailadres in.';
    } else if (emailExists($inputs['email'])){
      $errs['email'] = 'Dit e-mailadres is al in gebruik.';
    }
    if (empty($inputs['name'])){
      $errs['name'] = 'Vul a.u.b. uw naam in.';
    }
    if (empty($inputs['password'])){
      $errs['pass1'] = 'Vul a.u.b. een wachtwoord in.';
    }
    if ($inputs['pass2'] != $inputs['password']){
      $errs['pass2'] = 'Moet overeenkomen met wachtwoord.';
    }
  return $errs;
}

function addToCart($id){
  $_SESSION['cart'][$id] += 1;
}

function logout(){
  unset($_SESSION['user']);
  if (isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
  }
}

function getUrlVar($varName, $default){
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST[$varName])) {
      return $_POST[$varName];
    } 
      return $default;
  } else {
    if(isset($_GET[$varName])) {
      return $_GET[$varName];
    } 
      return $default;
  }
}

?>