<?php
include('showResponsePage/showHead.php');
include('showResponsePage/showBody.php');
include('showResponsePage/showDocumentEnd.php');

function showDocumentStart(){
  echo '<!DOCTYPE html> <html>';
}

function showResponsePage($page, $inputs, $errs){
  showDocumentStart();
  showHead($page);
  showBody($page, $inputs, $errs);
  showDocumentEnd();
}


?>