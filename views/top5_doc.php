<?php

require_once "product_doc.php";

class Top5Doc extends ProductDoc{
  protected function showTitle(){
    echo '<title>Top 5</title>';
  }

  protected function showHeader(){
    echo '<h1 class="title">Top 5</h1>';
  }
}

?>