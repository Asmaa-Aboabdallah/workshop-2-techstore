<?php

require_once("../../app.php");
use TeachStore\Classes\Validation\Validator;
use TeachStore\Classes\Models\Admin;


if($request->postHas('Add'))
{
    //print_r($_POST);
    $name = $request->post('name');
    $email = $request->post('email');
    $password = $request->post('password');
    $is_super = $request->post('is_super');

    // validation

    $validator = new Validator;
    $validator->validate('name' , $name, ['Required', 'Str' , 'Max']);
    $validator->validate('email' , $email, ['Required', 'Email' , 'Max']);
    $validator->validate('password' , $password, ['Required', 'Str' , 'Max']);




    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        $request->aredirect("add-admin.php");
    }else{
       if($is_super == "Yes"){
        $hashedPassword = password_hash($password , PASSWORD_DEFAULT);
        $ad = new Admin;
        $admin = $ad->insert("name, email , password , is_super", " '$name', '$email' , '$hashedPassword' , '$is_super'");

        $session->set('success' , 'Super Admin Added Successfully');
        $request->aredirect("admins.php");
       }else {
        $hashedPassword = password_hash($password , PASSWORD_DEFAULT);
        $ad = new Admin;
        $admin = $ad->insert("name, email , password", " '$name', '$email' , '$hashedPassword'");

        $session->set('success' , 'Admin Added Successfully');
        $request->aredirect("admins.php");
       }
    }

}else{
    $request->aredirect("add-admin.php");
}