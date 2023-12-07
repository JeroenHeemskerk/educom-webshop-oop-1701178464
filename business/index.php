<?php
  include('../controllers/page_controller.php');
  session_start();

  $controller = new PageController();
  $controller -> handleRequest();
?>