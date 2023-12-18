<?php

class RatingCrud{
  public $baseCrud;

  public function __construct($crud){
    $this -> baseCrud = $crud;
  }

  public function createRating($userId, $productId, $rating){
    return $this -> baseCrud -> createRow('INSERT INTO ratings (user_id, product_id, rating) VALUES 
      (:userId, :productId, :rating)', array(':userId' => $userId, ':productId' => $productId, ':rating' => $rating));
  }

  public function updateRating($userId, $productId, $rating){
    $this -> baseCrud -> updateRow('UPDATE ratings SET rating = :rating WHERE user_id = :userId and product_id = :productId', 
    array(':userId' => $userId, ':productId' => $productId, ':rating' => $rating));
  }

  public function readAllAverageRatings(){
    return $this -> baseCrud -> readManyRows('SELECT AVG(rating) AS average, product_id FROM ratings GROUP BY product_id ORDER BY product_id',
    array());
  }

  public function readAverageRating($productId){
    return $this -> baseCrud -> readOneRow('SELECT AVG(rating) AS average, product_id FROM ratings WHERE product_id = :productId', 
    array(':productId' => $productId));
  }

  public function readAllRatingsByUser($userId){
    return $this -> baseCrud -> readManyRows('SELECT * FROM ratings WHERE user_id = :userId', 
    array(':userId' => $userId));
  }

  public function readRatingByUserAndProduct($userId, $productId){
    return $this -> baseCrud -> readOneRow('SELECT * FROM ratings WHERE user_id = :userId and product_id = :productId',
    array(':userId' => $userId, ':productId' => $productId));
  }
}

?>