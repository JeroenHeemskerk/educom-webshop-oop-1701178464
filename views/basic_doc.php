<?php

require_once "html_doc.php";

class BasicDoc extends HtmlDoc{
  protected $model;
  
  public function __construct($model){
    $this -> model = $model;
  }

  protected function showTitle(){
    echo '<title>404</title>';
  }

  private function showCSSLink(){
    echo '<link rel="stylesheet" href="../css/stylesheet.css">';
  }

  protected function showHeader(){
    echo '<h1 class="title">Error 404:</h1>';
  }

  private function showMenuItem($link, $label){
    echo '<li><a href="index.php?page='. $link .'">'.$label.'</a></li>';
  }

  private function showMenu(){
    echo '<ul class = "menu">';
    foreach ($this -> model -> menu as $key => $value){
      $this -> showMenuItem($value -> pageName, $value -> buttonName);
    }
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