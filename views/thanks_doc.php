<?php

require_once "basic_doc.php";

class ThanksDoc extends BasicDoc{
  protected function showTitle(){
    echo '<title>Bedankt!</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">Bedankt!</h1>';
  }

  protected function showContent(){
    echo '<h2 class="textstyle">Bedankt voor uw bericht!</h2>';
  }

}

?>