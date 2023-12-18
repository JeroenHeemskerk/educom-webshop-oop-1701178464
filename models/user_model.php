<?php

require_once 'page_model.php';

class UserModel extends PageModel{
  public $inputs = array('name' => '', 'email' => '', 'password' => '', 'pass2' => '', 
  'salutation' => '', 'name' => '', 'preference' => '', 
  'message' => '', 'email' => '', 'phone' => '', 'street' => '', 
  'house' => '', 'addition' => '', 'zipcode' => '', 'residence' => '');
  
  public $errs = array('name' => '', 'email' => '', 'password' => '', 'pass2' => '', 'salutation' => '', 
  'name' => '', 'preference' => '', 'message' => '', 'email' => '', 'phone' => '', 
  'street' => '', 'house' => '', 'addition' => '', 'zipcode' => '', 'residence' => '');
  
  public $user;
  private $userId = 0;
  public $valid = false;
  public $userCrud;
  
  public function __construct($crud, $pageModel){
    PARENT::__construct($pageModel);
    $this -> userCrud = $crud;
  }

  public function processForm(){
    $this -> setInputs();
    if ($this -> isPost){
      $this -> validateAndProcess();
    }
  }

  public function testInput($inputs){
    $inputs = trim($inputs);
    $inputs = stripslashes($inputs);
    $inputs = htmlspecialchars($inputs);
    return $inputs;
  }

  private function setInputs(){
    foreach ($this -> inputs as $key => $value){
      if (isset($_POST[$key])){
        $this -> inputs[$key] = $this -> testInput($_POST[$key]);
      }
    }
  }

  private function validateAndProcess(){
    switch ($this -> page){
      case 'contact':
        $this -> validateContact();
        if ($this -> valid){
          $this -> page = 'thanks';
        }
        break;
      case 'register':
        $this -> validateRegister();
        if ($this -> valid){
          if ($this -> userCrud-> readUserByEmail($this -> inputs['email'])){
            $this -> errs['email'] = 'Dit e-mailadres is al in gebruik.';
          } else {
            $this -> userCrud -> createUser($this -> inputs['name'], $this -> inputs['email'], $this -> inputs['password']);
            $this -> page = 'login';
          }
        }
        break;
      case 'login':
        $this -> validateLogin();
        if ($this -> valid){
          $this -> user = $this -> userCrud -> readUserByEmail($this -> inputs['email']);
          if ($this -> user && $this -> inputs['password'] == $this -> user -> password){
              $this -> sessionManager -> loginUser($this -> user -> name, $this -> user -> id);
              $this -> page = 'home';
          }
          else{
            $this -> valid = false;
            $this -> errs['password'] = 'Onjuist wachtwoord.';
          }
        }
        break;
    }
  }

  private function validateContact(){
    if (empty($this -> inputs["salutation"])) {
      $this -> errs['salutation'] = "Aanhef is verplicht";
    } 
    if (empty($this -> inputs["name"])) {
      $this -> errs['name'] = "Naam is verplicht";
    }
      
    if (empty($this -> inputs["preference"])) {
      $this -> errs['preference'] = "Communicatievoorkeur is verplicht";
    }
      
    if (empty($this -> inputs["message"])) {
      $this -> errs['message'] = "Bericht is verplicht";
    } 
      
    if (empty($this -> inputs["email"])) {
      if ($this -> inputs['preference'] == "email"){
        $this -> errs['email'] = "E-mailadres is verplicht";
      }
    }
      
    if (empty($this -> inputs["phone"])) {
      if ($this -> inputs['preference'] == "phone"){
        $this -> errs['phone'] = "Telefoon is verplicht";
      }
    }

    $address = false;
    $this -> address = ($this -> inputs['preference'] == 'mail' || !empty($this -> inputs['street']) || 
                        !empty($this -> inputs['house']) || !empty($this -> inputs['addition']) || 
                                         !empty($this -> inputs['zipcode']) || !empty($this -> inputs['residence']));
    if ($this -> address){
      if (empty($this -> inputs["street"])){
        $this -> errs['street'] = "Vul a.u.b. straat in.";
      }
      if (empty($this -> inputs["house"] )) {
        $this -> errs['house'] = "Vul a.u.b. huisnummer in.";
      }
      if (empty($this -> inputs["zipcode"] )) {
        $this -> errs['zipcode'] = "Vul a.u.b. postcode in.";
      } 
      if (empty($this -> inputs["residence"] )) {
        $this -> errs['residence'] = "Vul a.u.b. woonplaats in.";
      } 
    }
    if (!array_filter($this -> errs)){
      $this -> valid = true;
    }
  }

  private function validateRegister(){
    if (empty($this -> inputs['email'])){
      $this -> errs['email'] = 'vul a.u.b. uw e-mailadres in.';
    } else if (emailExists($this -> inputs['email'])){
      $this -> errs['email'] = 'Dit e-mailadres is al in gebruik.';
    }
    if (empty($this -> inputs['name'])){
      $this -> errs['name'] = 'Vul a.u.b. uw naam in.';
    }
    if (empty($this -> inputs['password'])){
      $this -> errs['password'] = 'Vul a.u.b. een wachtwoord in.';
    }
    if ($this -> inputs['pass2'] != $this -> inputs['password']){
      $this -> errs['pass2'] = 'Moet overeenkomen met wachtwoord.';
    }
    if (!array_filter($this -> errs)){
      $this -> valid = true;
    }
  }

  private function validateLogin(){
    if (empty($this -> inputs['email'])){
      $this -> errs['email'] = 'Vul a.u.b. uw e-mailadres in.';
    }
    if (empty($this -> inputs['password'])){
      $this -> errs['password'] = 'Vul a.u.b. uw wachtwoord in.';
    }
    if (!array_filter($this -> errs)){
      $this -> valid = true;
    }
  }
  
}


?>