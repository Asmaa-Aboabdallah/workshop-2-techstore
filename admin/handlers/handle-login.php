<?php

require_once("../../app.php");
use TeachStore\Classes\Validation\Validator;
use TeachStore\Classes\Models\Admin;


if($request->postHas('submit'))
{
    $email = $request->post('email');
    $password = $request->post('password');

    // validation

    $validator = new Validator;
    $validator->validate('email' , $email, ['Required', 'Email' , 'Max']);
    $validator->validate('password' , $password, ['Required', 'Str' , 'Max']);


    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        $request->aredirect("login.php");
    }else{
        $ad = new Admin;
        $isLogin = $ad->login($email , $password , $session);
        if($isLogin){
            $request->aredirect("index.php");
        }else{
            $session->set('errors', ['Credentials are not correct']);
            $request->aredirect("login.php");
        }
    }

}else{
    $request->aredirect("login.php");
}