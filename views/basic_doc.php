<?php

include "html_doc.php";

class BasicDoc extends HtmlDoc{
  protected $data;
  
  public function __construct($myData){
    $this -> data = $myData;
  }

  protected function showTitle(){
    echo '<title>404</title>';
  }

  private function showCSSLink(){
    echo '<link rel="stylesheet" href="CSS/stylesheet.css">';
  }

  protected function showHeader(){
    echo '<h1 class="title">Error 404:</h1>';
  }

  private function showMenu(){
    echo '<ul class = "menu">';
    echo '<li>hoi</li>';
    echo '</ul>';
  }

  protected function showContent(){
    echo 'hallo';
  }

  private function showFooter(){
    echo '</div>
  <br><br><footer>&copy 2023 Rogier Be</footer>';
  }

  protected function showHeadContent(){
    $this -> showTitle();
    $this -> showCSSLink();
  }

  protected function showBodyContent(){
    $this -> showHeader();
    $this -> showMenu();
    $this -> showContent();
    $this -> showFooter();

  }



}


?>