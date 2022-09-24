<?php

require_once("../../app.php");

use TeachStore\Classes\Models\Admin;

if ($request->getHas('id')){
    $id = $request->get("id");


    $ad = new Admin;
    $ad->delete($id);


    $session->set('success' , 'Admin Deleted Successfully');
    $request->aredirect("admins.php");
}