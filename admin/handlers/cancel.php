<?php
require("../../app.php");
use TeachStore\Classes\Models\Order;

if ($request->getHas('id')){
    $id = $request->get('id');

    
    $ord = new Order;
    $ord->update("status = 'canceled'", $id);

    $session->set('success' , 'Order Canceled');
    $request->aredirect("order.php?id=" . $id);
}