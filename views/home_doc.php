<?php

include "basic_doc.php";

class HomeDoc extends BasicDoc{
  protected function showTitle(){
    echo '<title>Home</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">Home:</h1>';
  }

  protected function showContent(){
    echo '<p class="textstyle">Welkom op de homepagina van mijn webshop.</p>';
  }

}

?>