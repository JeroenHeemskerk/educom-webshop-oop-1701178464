<?php
  include('../controllers/page_controller.php');

  $page = new PageController();
  $page -> handleRequest();
?>