<?php

/**
 * File defining index.php for test
 *
 * PHP Version 5.6
 *
 * @author    Vo Van Toan
 * @link      https://github.com/vantoanitus/tikihometest.git
 */

namespace TikiTest;

include('./Models/User.php'); 
include('./Models/Product.php'); 
include('./Models/ShoppingCart.php'); 

use Models\Product;
use Models\User;
use Models\ShoppingCart;


printMenu();

function printMenu() 
{	
	echo "************ Backend Deveoper HomeTest ******************\n";
	echo "1 - Test Case 1\n";
	echo "2 - Test Case 2\n";
	echo "************ Backend Deveoper HomeTest ******************\n";
	echo "Enter your choice from 1 to 2 :: ";

	$handle = fopen ("php://stdin","r");
	$line = fgets($handle);

	switch (trim($line)) {
		case '1':
			runTestCase1();
			break;

		case '2':
			runTestCase2();
			break;	
		
		default:
			echo "ABORTING!\n";
	    	exit;
	}
}

function runTestCase1()
{
	echo "************ Test case 1 ******************\n";
	echo "Description: Create a User 'John Doe' with email address 'john.doe@example.com', then add 2 'Apple' Products for $4.95 each and 1 'Orange' Product for $3.99. Check that the ShoppingCart total price is correct\n";

	$user = new User("John Doe", "john.doe@example.com"); // Step 1: Create a user

	echo "User " . $user->getUserName() . "is created!\n";

	$ShoppingCart = new ShoppingCart($user->getUserId());
	$ShoppingCart->addListProduct("1", 2); // Step 2: Add 2 'Apple' Products with id = '1'
	$ShoppingCart->addListProduct("2", 1); // Step 3: Add 1 'Orange' Product with id = '2'

	$totalPrice = $ShoppingCart->getTotalPrice(); // Step 4: Check total price of ShoppingCart

	echo "***** View shop cart *****\n";
	$ShoppingCart->viewShopCart();
	echo "Total price: " . $totalPrice . "$";

}

function runTestCase2()
{
	echo "************ Test case 1 ******************\n";
	echo "Description: Create a User 'John Doe' with email address 'john.doe@example.com', then add 3 'Apple' products for $4.95, then remove 1 'Apple' product. Check that the ShoppingCart total price is correct\n";


	$user = new User("John Doe", "john.doe@example.com"); // Step 1: Create a user

	echo "User " . $user->getUserName() . "is created!\n";

	$ShoppingCart = new ShoppingCart($user->getUserId());
	$ShoppingCart->addListProduct("1", 3); // Step 2: Add 3 'Apple' Products with id = '1'
	$ShoppingCart->removeProduct("1", 1); //  Step 3: Remove 1 'Apple' Product with id = '1'

	$totalPrice = $ShoppingCart->getTotalPrice(); // Step 4: Check total price of ShoppingCart

	echo "***** View shop cart *****\n";
	$ShoppingCart->viewShopCart();
	echo "Total price: " . $totalPrice . "$";
}

?>