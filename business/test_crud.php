<?php
require_once 'crud.php';
require_once 'user_crud.php';
require_once 'shop_crud.php';
require_once 'rating_crud.php';

$testCrud = new Crud();
$testRatingCrud = new RatingCrud($testCrud);

#$ratingId = $testRatingCrud -> createRating(27, 2, 5);
#var_dump($testRatingCrud -> readAllAverageRatings());
#$testRatingCrud -> updateRating(27, 1, 4);
#var_dump($testRatingCrud -> readAverageRating(2));
var_dump($testRatingCrud -> readAllRatingsByUser(1));
#var_dump($testRatingCrud -> readAllAverageRatings());
?>