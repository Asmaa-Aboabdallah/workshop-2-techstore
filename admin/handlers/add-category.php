<?php

require_once("../../app.php");
use TeachStore\Classes\Models\Cat;
use TeachStore\Classes\Validation\Validator;

if($request->postHas('submit'))
{
    $name = $request->post('name');
    
    // validation

    $validator = new Validator;
    $validator->validate('name' , $name, ['Required', 'Str' , 'Max']);
    
    

    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        $request->aredirect("add-category.php");
    }else{
       // db query
        $cat = new Cat;
        $cat->insert("name", "'$name'");
        $session->set('success' , 'Category Added Successfully');
        $request->aredirect("categories.php");
    }
}else{
    $request->aredirect("add-category.php");
}