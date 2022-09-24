<?php

require_once("../../app.php");
use TeachStore\Classes\Models\Cat;
use TeachStore\Classes\Validation\Validator;

if($request->postHas('submit'))
{
    $id = $request->get('id');
    $name = $request->post('name');


    //validation

    $validator = new Validator;
    $validator->validate('name' , $name, ['Required', 'Str' , 'Max']);
   

    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        $request->aredirect("edit-category.php");
    }else{
        $cat = new Cat;
        $cat->update("name='$name'", $id); 
        $session->set('success' , 'Category Updated Successfully');
        $request->aredirect("categories.php");
    }
}else{
    $request->aredirect("edit-category.php");
}