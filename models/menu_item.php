<?php

class MenuItem{
  public $pageName = '';
  public $buttonName = '';

  public function __construct($pageName, $buttonName){
    $this -> setPageName($pageName);
    $this -> setButtonName($buttonName);
  }

  private function setPageName($name){
    $this -> pageName = $name;
  }

  private function setButtonName($name){
    $this -> buttonName = $name;
  }
}



?>