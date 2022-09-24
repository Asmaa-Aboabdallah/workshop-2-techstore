<?php

require_once("../../app.php");
use TeachStore\Classes\Validation\Validator;
use TeachStore\Classes\Models\Admin;


if($request->postHas('update'))
{
    $name = $request->post('name');
    $email = $request->post('email');
    $password = $request->post('password');
    $confirm_password = $request->post('confirm_password');

    // validation

    $validator = new Validator;
    $validator->validate('name' , $name, ['Required', 'Str' , 'Max']);
    $validator->validate('email' , $email, ['Required', 'Email' , 'Max']);

    if (! empty($password) and ! $password == $confirm_password){
        $validator->validate('password' , $password, ['Required', 'Str' , 'Max']);
    }

    echo true;


    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        $request->aredirect("profile.php");
    }else{
        $ad = new Admin;
        if (! empty($password)){
            $hashedPassword = password_hash($password ,PASSWORD_DEFAULT);
            $ad->update("name='$name', email='$email', `password`='$hashedPassword' ",  $session->get('adminId'));
        }else{
            $ad->update("name='$name', email='$email' ",  $session->get('adminId'));
        }
        $session->set('success', 'Profile Updated Successfully');
        // لما بعمل ابديت مبيبقاش فاكر الداتا فبوجه علي تسجيل الخروج
        $request->aredirect("handlers/handle-logout.php");   
    }

}else{
    $request->aredirect("login.php");
}