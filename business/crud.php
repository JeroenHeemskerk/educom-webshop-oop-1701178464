<?php

class Crud{
  private $username = "webshop_rogier";
  private $password = "webshoprogier"
  private $connectionString = "mysql:host=localhost;dbname=webshop_rogier";
  private $pdo = null;    
  
  private function connectDatabase()
  {
      $this -> pdo = new PDO("$this -> connectionString", $this -> username, $this -> password);
      $this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }    
  
  private function prepareAndBind($sql, $params)
  {

      $stmt = $pdo -> prepare("$sql");
      foreach ($params as $key => $value){
        $stmt -> bind_value($key, $value);
      }
      $stmt -> execute();
  }    
  
  public function createRow()
  {
      $this -> connectDatabase();
      $this -> prepareAndBind();
      //uniek wat er in de pdo geschreven moet worden
  }    
  
  public function readOneRow()
  {
      $this -> connectDatabase();
      $this -> prepareAndBind();
      return $stmt -> fetch (PDO::FETCH_ASSOC);
      //uniek wat er in de pdo geschreven moet worden
  }    
  
  public function readManyRows()
  {
      $this -> connectDatabase();
      $this -> prepareAndBind();
      //uniek wat er in de pdo geschreven moet worden
  }    
  
  public function updateRow()
  {
      $this -> connectDatabase();
      $this -> prepareAndBind();
      //uniek wat er in de pdo geschreven moet worden
  }    
  
  public function deleteRow();
  {
      $this -> connectDatabase();
      $this -> prepareAndBind();
      //uniek wat er in de pdo geschreven moet worden
  }
}
?>
