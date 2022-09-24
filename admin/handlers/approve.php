<?php
require("../../app.php");
use TeachStore\Classes\Models\Order;

if ($request->getHas('id')){
    $id = $request->get('id');

    
    $ord = new Order;
    $ord->update("status = 'approved'", $id);

    $session->set('success' , 'Order Approved');
    $request->aredirect("order.php?id=".$id);
}
