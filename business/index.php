<?php
  include('getRequestedPage.php');
  include('../presentation/showResponsePage.php');
  include('../data/dataRead.php');
  include('processRequest.php');
  include('initiate.php');
  session_start();
  $data = getrequestedPage();
  showResponsePage($data);
?>