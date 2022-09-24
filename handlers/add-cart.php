<?php

require_once("../app.php");
use TeachStore\Classes\Cart;

if($request->postHas('submit'))
{
    $qty = $request->post('qty');
    $id = $request->post('id');
    $name = $request->post('name');
    $price = $request->post('price');
    $img = $request->post('img');

    


    $prodData = [
        'qty'=> $qty,
        'name'=> $name,
        'price'=> $price,
        'img'=> $img
    ];

    // echo "<pre>";
    // print_r($prodData);
    // echo "</pre>";


    $cart = new Cart;
    $cart->add($id, $prodData);


    //echo $cart->countData();
    //echo $cart-> total(); 
    // echo $cart->has($id);
    //print_r($cart->all());
    // $cart->remove($id);
    // print_r($cart->all()) ;

    // echo "<pre>";
    // print_r($_SESSION['cart'][$id]);
    // echo "</pre>";

    $request->redirect("products.php");

}
