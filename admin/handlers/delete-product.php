<?php

require_once("../../app.php");

use TeachStore\Classes\Models\Product;

if ($request->getHas('id')){
    $id = $request->get("id");


    $pr = new Product;
    $imgName = $pr->selectId($id , 'img')['img'];
    unlink(PATH . "uploads/$imgName");

    // echo "<pre>";
    // print_r($prod);
    // echo "</pre>";
    // die();

    $pr->delete($id);


    $session->set('success' , 'Product Deleted Successfully');
    $request->aredirect("products.php");
}