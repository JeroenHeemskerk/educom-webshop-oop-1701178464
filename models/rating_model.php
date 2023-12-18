<?php

require_once "product_rating.php";

class RatingModel extends PageModel{
  public $avgRatings = array();
  public $myRatings = array();
  public $order = array();
  public $isLoggedIn;
  public $action;
  public $newRating;
  public $productId;
  public $output;

  public function __construct($crud, $pageModel){
    PARENT::__construct($pageModel);
    $this -> crud = $crud;
  }  

  public function getRequestedAction(){
    $this -> isPost = ($_SERVER['REQUEST_METHOD'] == 'POST');
    $this -> isLoggedin = $this -> sessionManager -> isLoggedin();
    if ($this -> isPost){
      $this -> action = $this -> getPostVar('action', '');
      $this -> newRating = $this -> getPostVar('rating', 0);
      $this -> productId = $this -> getPostVar('productId', 0);
      $this -> user['id'] = $this -> sessionManager -> getUserId();
    } else {
      $this -> action = $this -> getUrlVar('action', '');
      $this -> newRating = $this -> getUrlVar('rating', 0);
      $this -> productId = $this -> getUrlVar('productId', 0);
      $this -> user['id'] = $this -> sessionManager -> getUserId();
    }
  }

  public function getRatings(){
    if ($this -> isLoggedIn){
      $this -> getMyRatings();
    }
    $this -> getAverageRatings();
    $this -> output = array($this -> avgRatings, $this -> myRatings);
  }

  public function getAverageRatings(){
    foreach ($this -> crud -> readAllAverageRatings() as $value){
      $this -> avgRatings[] = new ProductRating($value -> product_id, $value -> average);
    }
  }

  public function getMyRatings(){
    foreach ($this -> crud -> readAllRatingsByUser($this -> sessionManager -> getUserId()) as $value){
      $this -> myRatings[] = new ProductRating($value -> product_id, $value -> rating);
    }
  }

  public function rateProduct(){
    if (isset($this -> myRatings[$this -> productId])){
      $this -> crud -> updateRating($this -> sessionManager -> getUserId(), $this -> productId, $this -> newRating);
    } else {
      $this -> crud -> createRating($this -> sessionManager -> getUserId(), $this -> productId, $this -> newRating);
    }
    $this -> myRatings[] = new ProductRating($this -> productId, $this -> newRating);
  }

  public function getRating(){
    if ($this -> isLoggedIn){
      $this -> crud -> readRatingByUserAndProduct($this -> sessionManager -> getUserId(), $this -> productId);
    }
    $this -> crud -> getAverageRating($this -> productId);
    $this -> output = array($this -> avgRatings, $this -> myRatings);
  }

}



?>