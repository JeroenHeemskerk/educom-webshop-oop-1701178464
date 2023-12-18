<?php

class AjaxView{

  private $model;

  public function __construct($model){
    $this -> model = $model;
  }

  public function show(){
    echo json_encode($this -> model -> output);
  }


}

?>