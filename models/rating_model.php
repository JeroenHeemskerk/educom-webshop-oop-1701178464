<?php

require_once "product_rating.php";

class RatingModel extends PageModel{
  public $avgRatings = array();
  public $myRatings = array();
  public $order = array();
  public $isLoggedIn;
  public $action;
  public $ratingData;
  public $newRating;
  public $productId;
  public $output;
  public $requestData;

  public function __construct($crud, $pageModel){
    PARENT::__construct($pageModel);
    $this -> crud = $crud;
  }  

  public function getRequestedAction(){
    $this -> isPost = ($_SERVER['REQUEST_METHOD'] == 'POST');
    $this -> isLoggedin = $this -> sessionManager -> isLoggedin();
    if ($this -> isPost){
      $this -> action = $this -> getPostVar('action', '');
      $this -> ratingData = $this -> getPostVar('productRating', '');
      $this -> newRating = substr($this -> ratingData, -1);
      $this -> productId = preg_replace('~\D~', '', substr($this -> ratingData, 0, -1));
      if ($this -> sessionManager -> isLoggedIn()){
        $this -> user['id'] = $this -> sessionManager -> getUserId();
      }
    } else {
      $this -> ratingData = $this -> getUrlVar('id', '00');
      $this -> action = $this -> getUrlVar('action', '');
      $this -> productId = preg_replace('~\D~', '', substr($this -> ratingData, 0, -1));
      if ($this -> sessionManager -> isLoggedIn()){
        $this -> user['id'] = $this -> sessionManager -> getUserId();
      }
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
    foreach ($this -> crud -> readAllRatingsByUser($this -> user['id']) as $value){
      $this -> myRatings[] = new ProductRating($value -> product_id, $value -> rating);
    }
  }

  public function rateProduct(){
    $rating = $this -> crud -> readRatingByUserAndProduct($this -> user['id'], $this -> productId);
    if ($rating){
      $test = $this -> crud -> updateRating($this -> sessionManager -> user['id'], $this -> productId, $this -> newRating);
    } else {
      $this -> crud -> createRating($this -> sessionManager -> user['id'], $this -> productId, $this -> newRating);
    }
    $this -> myRatings[] = new ProductRating($this -> productId, $this -> newRating);
  }

  public function getRating(){
    if ($this -> isLoggedIn){
      $rating = $this -> crud -> readRatingByUserAndProduct($this -> user['id'], $this -> productId);
      $this -> output = new ProductRating($rating -> product_id, $rating -> average);
    }
    $rating = $this -> crud -> readAverageRating($this -> productId);
    $this -> output[] = new ProductRating($rating -> product_id, $rating -> rating);
  }

}



?>