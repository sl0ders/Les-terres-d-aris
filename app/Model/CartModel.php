<?php


namespace App\Model;


class CartModel extends Model
{
    protected $table = 'Carts';

    public function countQuantity() {
        return $this->query("
        SELECT sum(carts.quantity)as totalcart  FROM carts
        ");
    }

    public function addCart($quantity, $product){
        return $this->query("
        INSERT INTO carts (carts.quantity, carts.product_id) VALUES ($quantity, $product)
        ");
    }


}