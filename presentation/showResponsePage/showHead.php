<?php
include('showHead/startTagHead.php');
include('showHead/showTitle.php');
include('showHead/setStyle.php');
include('showHead/endTagHead.php');

function showHead($page){
  startTagHead();
  showTitle($page);
  setStyle();
  endTagHead();
}
?>