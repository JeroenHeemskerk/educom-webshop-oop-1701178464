<?php
  require_once('../controllers/page_controller.php');
  require_once('model_factory.php');

  session_start();
  $crud = new Crud();
  $factory = new ModelFactory($crud);
  $controller = new PageController($factory);
  $controller -> handleRequest();
?>