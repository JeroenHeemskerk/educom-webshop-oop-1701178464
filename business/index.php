<?php
  $dir = 'C:/xampp/htdocs/educom-webshop-database-1700217655/';
  include('getRequestedPage.php');
  include($dir.'presentation/showResponsePage.php');
  include($dir.'data/dataRead.php');
  include('processRequest.php');
  include('initiate.php');
  
  session_start();
  list($page, $inputs, $errs) = getrequestedPage();
  showResponsePage($page, $inputs, $errs);
  ?>
</body>
</html>