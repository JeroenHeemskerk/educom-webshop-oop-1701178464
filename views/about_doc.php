<?php

require_once "basic_doc.php";

class AboutDoc extends BasicDoc{
  protected function showTitle(){
    echo '<title>About</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">About</h1>';
  }

  protected function showContent(){
    echo '<p class="textstyle">Ik ben Rogier. Ik kom uit Gouda en ik heb gestudeerd in Groningen.</p>
    <p class="textstyle">Ik heb twee zussen en een kat.<br>Mijn hobby\'s zijn:</p>
    <ul class="about"><li>Schaken</li> <li>Tennissen</li> <li>Piano spelen</li><li>Basgitaar spelen</li></ul>';
  }

}

?>