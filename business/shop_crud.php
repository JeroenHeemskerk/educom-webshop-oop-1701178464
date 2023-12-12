<?php

  class ShopCrud{
    public $baseCrud;

    public function __construct($crud){
      $this -> baseCrud = $crud;
    }

    public function createOrder($userId){
      return $this -> baseCrud -> createRow('INSERT INTO orders (user_id) VALUES 
        (:userId)', array(':userId' => $userId));
    }

    public function createOrderLine($orderId, $productId, $number){
      return $this -> baseCrud -> createRow('INSERT INTO order_lines (order_id, product_id, number_ordered) VALUES 
        (:orderId, :productId, :number)', 
        array(':orderId' => strval($orderId), ':productId' => strval($productId), ':number' => strval($number)));
    }

    public function readProductById($id){
      return $this -> baseCrud -> readOneRow('SELECT * FROM products WHERE id = :id', array(':id' => $id));
    }

    public function getOrderLinesByProduct($id){
      return $this -> baseCrud -> readManyRows('SELECT * FROM order_lines WHERE order_id IN (SELECT id FROM orders 
      WHERE order_date > ADDDATE(CURDATE(), -5)) and product_id = :id', array(':id' => $id));
    }
  }


?>