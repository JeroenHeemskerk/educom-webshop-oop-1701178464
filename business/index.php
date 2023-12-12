<?php
  require_once('../controllers/page_controller.php');
  require_once('model_factory.php');

  session_start();
  $crud = new Crud();
  $factory = new ModelFactory($crud);
  $factory -> createModel('page');
  $controller = new PageController($factory);
  $controller -> handleRequest();
?>