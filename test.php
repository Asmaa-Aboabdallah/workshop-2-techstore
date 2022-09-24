<?php

require_once("app.php");
// echo PATH;
// echo URL;

// require_once("classes/Request.php");
// require("classes/Session.php");
// require_once("classes/Db.php");
// require_once("classes/Models/Product.php");
// require_once("classes/Models/Order.php");
// require_once("classes/validation/ValidationRule.php");
// require_once("classes/validation/Required.php");
// require_once("classes/validation/Numeric.php");
// require_once("classes/validation/Str.php");
// require_once("classes/validation/Email.php");
// require_once("classes/validation/Max.php");
// require_once("classes/validation/Validator.php");

// $request = new Request;
// $sess = new Session;
// // echo $request->get('name');

// $sess->set('name', 'Asmaa Fathy');
// echo $sess->get('name');
// echo $sess->has('name');

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";


// $sess->remove('name');
// var_dump($sess->has('name')) ;

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// $prod = new Product;
// $res = $prod->selectAll("id,name,price");
// echo "<pre>";
// print_r($res);
// echo "</pre>";


// $order = new Order;
// $res = $order->selectAll();
// echo "<pre>";
// print_r($res);
// echo "</pre>";


// $prod = new Product;
// $res = $prod->selectId(8);
// echo "<pre>";
// print_r($res);
// echo "</pre>";

// $prod = new Product;
// $res = $prod->selectId(11);
// echo "<pre>";
// var_dump($res); // NULL
// echo "</pre>";

// $prod = new Product;
// $res = $prod->selectId(1, "id,name");
// echo "<pre>";
// print_r($res);
// echo "</pre>";

// $prod = new Product;
// $res = $prod->selectWhere( "id > 5 AND price < 6000");
// echo "<pre>";
// print_r($res);
// echo "</pre>";

// $prod = new Product;
// $res = $prod->getCount();
// echo "<pre>";
// print_r($res);
// echo "</pre>";

// $order = new Order;
// $res = $order->getCount();
// echo "<pre>";
// print_r($res);
// echo "</pre>";

// $order = new Order;
// $res = $order->insert("name,phone", " 'Asmaa Fathy', '01013041651' ");
// echo "<pre>";
// print_r($res);
// echo "</pre>";

// $order = new Order;
// $res = $order->update("name = 'Ahmed Gad', email = 'ahmed@techstore.com'" , 1);
// echo "<pre>";
// print_r($res);
// echo "</pre>";


// $order = new Order;
// $res = $order->delete(1);
// echo "<pre>";
// print_r($res);
// echo "</pre>";




// $v = new Validator;
// $v->validate('age', 'Asmaa Fathy' , ['numeric']);

// echo "<pre>";
// print_r($v->getErrors());
// echo "</pre>";


// $v = new Validator;
// $v->validate('name', 15 , ['str']);

// echo "<pre>";
// print_r($v->getErrors());
// echo "</pre>";

// echo $request->get('name');

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// use TeachStore\Classes\Cart;

// $cart = new Cart;
// $cart->add(1 , ['name' , 'email' , 'price']);

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// use TeachStore\Classes\Cart;
// $cart = new Cart;
// print_r($cart->all());
//echo $cart-> total(); 

use TeachStore\Classes\Models\Admin;
$ad = new Admin;
$res = $ad->login('semofathy816@gmail.com', '123456', $session);
echo "<pre>";
var_dump($res);
echo "</pre>";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$res = $ad->logout($session);

echo "<pre>";
print_r($_SESSION);
echo "</pre>";


