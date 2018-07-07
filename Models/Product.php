<?php

/**
 * File defining Models\Product
 *
 * PHP Version 5.6
 *
 * @author    Vo Van Toan
 * @link      https://github.com/vantoanitus/tikihometest.git
 */

namespace Models;

class Product 
{
	protected $product_id;
	protected $product_name;
	protected $product_price;

	/** This is database dummy for test */
	protected static $productDB = array(
        "1" => array(
            'product_id' 	=> '1',
            'product_name'  => 'Apple',
            'product_price' => '4.95'
        ),
        "2" => array(
            'product_id' 	=> '2',
            'product_name'  => 'Orange',
            'product_price' => '3.99'
        )
    );

    public function __construct($product)
    {
        $this->product_id    = $product["product_id"];
		$this->product_name  = $product["product_name"];
		$this->product_price = $product["product_price"];
    }

    /**
     * Find a product from db by product id
     * @param string $id (product_id)
     * @return Product $product
     */
    public static function findById($id)
    {
    	$product = self::$productDB[$id];

    	if(isset($product))
    	{
    		
    		return new Product($product);
    	}

    	return new Product();
    }

	public function getProductId()
    {
        return $this->product_id;
    }

    public function getProductName()
    {
        return $this->product_name;
    }

    public function getProductPrice()
    {
        return $this->product_price;
    }
	
}

