<?php

require_once("../../app.php");

use TeachStore\Classes\Models\Cat;

if ($request->getHas('id')){
    $id = $request->get("id");


    $cat = new Cat;
    $cat->delete($id);


    $session->set('success' , 'Category Deleted Successfully');
    $request->aredirect("categories.php");
}