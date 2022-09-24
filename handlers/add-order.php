<?php

require_once("../app.php");
use TeachStore\Classes\Cart;
use TeachStore\Classes\Models\Order;
use TeachStore\Classes\Models\OrderDetail;
use TeachStore\Classes\Validation\Validator;

$cart = new Cart;

if($request->postHas('submit') AND $cart->countData() !== 0)
{
    $name = $request->post('name');
    $phone = $request->post('phone');
    $email = $request->post('email');
    $address = $request->post('address');

    // validation

    $validator = new Validator;
    $validator->validate('name' , $name, ['Required', 'Str' , 'Max']);
    if (! empty($email)){
        $validator->validate('email' , $email, ['Email' , 'Max']);
        // في حاله انه بعت الايميل تتحط قيمته في استرينج 
        $email = "'$email'";
    }else{
        // لو مبعتوش تتحط null without string quotes 
        $email = "Null";
    }

    $validator->validate('phone' , $phone, ['Required', 'Str' , 'Max']);
    if (! empty($address)){
        $validator->validate('address' , $address, ['Str' , 'Max']);
        $address = "'$address'";
    }else{
        $address = "Null";
    }



    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        $request->redirect("cart.php");
    }else{
        $order = new Order;
        $orderDetail = new OrderDetail;

        $orderId = $order->insertAndGetId("name,email,phone,address", " '$name', $email, '$phone' , $address ");
        
        foreach($cart->all() as $prodId => $prodData)
        {
            $qty = $prodData['qty'];
            $orderDetail->insert("order_id, product_id , quantity", " '$orderId' , '$prodId' , '$qty' ");

        }


        // يفضي الكارت بعد ما يطلب الاوردر
        $cart->empty();


        $request->redirect("products.php");

    }


}else{
    $request->redirect("products.php");
}