<?php

/**
 * File defining Models\ShoppingCart
 *
 * PHP Version 5.6
 *
 * @author    Vo Van Toan
 * @link      https://github.com/vantoanitus/tikihometest.git
 */

namespace Models;

use Models\Product;

class ShoppingCart 
{
    protected $cart_id;
    protected $user_id;
    protected $list_product;

    public function __construct($userId)
    {
        $this->list_product = array();
        $this->user_id      = $userId;
        $this->cart_id      = 1; // This is dummy cart_id
    }

    /**
     * Add a product to list product of user
     * @param string $id (product_id)
     * @param quantity $quantity
     * @return void
     */
    public function addListProduct($id, $quantity)
    {
      	$product = new \stdClass;

      	if(!isset($product))
      	{
      		return false;
      	}

      	$product->product_id = $id;
      	$product->quantity   = $quantity;

      	$this->list_product[$id] = $product;
      	return true;
    }

    /**
     * Remove a product from list product of user
     * @param string $id (product_id)
     * @param quantity $quantity 
     * @return void
     */
    public function removeProduct($id, $quantity)
    {
      	if($quantity < 1)
      	{
      		return false;
      	}

      	$product = $this->list_product[$id];

      	if(isset($product)){
      		$product->quantity -= $quantity;
      		return true;
      	}

      	return false;
    }

    /**
     * Remove total price in shop cart of user
     * @return float $totalPrice
     */
    public function getTotalPrice()
    {
      	if(sizeof($this->list_product) == 0)
      	{
      		return 0;
      	}

      	$totalPrice = 0;
      	foreach ($this->list_product as $key => $product) 
      	{
      	   $productInfo = Product::findById($product->product_id);	
           $totalPrice += $productInfo->getProductPrice() * $product->quantity;
        }

        return $totalPrice;
    }

    /**
     * View all current product in list product
     * @return void
     */
    public function viewShopCart()
    {
      	if(sizeof($this->list_product) == 0)
      	{
      		echo "Shop cart is empty!";
      	}
      		
      	foreach ($this->list_product as $key => $product) 
      	{
      	    $productInfo = Product::findById($product->product_id);	
            echo "#" . $key . " " . $productInfo->getProductName() . "(Quantity: " . $product->quantity . 
                 " ,Price: " . ($productInfo->getProductPrice() * $product->quantity) . "$)\n";
        }
    }

}

