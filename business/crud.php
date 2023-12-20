<?php

class Crud{
  private $username = "webshop_rogier";
  private $password = "webshoprogier";
  private $connectionString = "mysql:host=localhost;dbname=rogiers_webshop";
  private $pdo = null;
  public $stmt;    
  
  public function connectDatabase()
  {
      if (!isset($this -> pdo)){
        $this -> pdo = new PDO($this -> connectionString, $this -> username, $this -> password);
        $this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }  
  }    
  
  public function prepareAndBind($sql, $params)
  {
      $this -> stmt = $this -> pdo -> prepare("$sql");
      foreach ($params as $key => $value){
        $this -> stmt -> bindValue($key, $value);
      }
      $this -> stmt -> execute();
  }    
  
  public function createRow($sql, $params)
  {
      $this -> connectDatabase();
      $this -> prepareAndBind($sql, $params);
      return $this -> pdo -> lastInsertId();
      //uniek wat er in de pdo geschreven moet worden
  }    

  public function readOneRow($sql, $params)
  {
      $this -> connectDatabase();
      $this -> prepareAndBind($sql, $params);
      return $this -> stmt -> fetch (PDO::FETCH_OBJ);
      //uniek wat er in de pdo geschreven moet worden
  }    
  
  public function readManyRows($sql, $params)
  {
      $this -> connectDatabase();
      $this -> prepareAndBind($sql, $params);
      return $this -> stmt -> fetchAll (PDO::FETCH_OBJ);
      //uniek wat er in de pdo geschreven moet worden
  }    
  
  public function updateRow($sql, $params)
  {
      $this -> connectDatabase();
      $this -> prepareAndBind($sql, $params);
      //uniek wat er in de pdo geschreven moet worden
  }    
  
  public function deleteRow($sql, $params)
  {
      $this -> connectDatabase();
      $this -> prepareAndBind($sql, $params);
      //uniek wat er in de pdo geschreven moet worden
  }
}
?>
