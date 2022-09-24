<?php

require_once("../../app.php");
use TeachStore\Classes\Models\Product;
use TeachStore\Classes\File;
use TeachStore\Classes\Validation\Validator;

if($request->postHas('submit'))
{
    $name = $request->post('name');
    $cat_id = $request->post('cat_id');
    $price = $request->post('price');
    $pieces_no = $request->post('pieces-no');
    $desc = $request->post('desc');
    $img = $request->files('img');

    // validation

    $validator = new Validator;
    $validator->validate('name' , $name, ['Required', 'Str' , 'Max']);
    $validator->validate('category id' , $cat_id, ['Required', 'Numeric']);
    $validator->validate('price' , $price, ['Required',  'Numeric']);
    $validator->validate('pieces number' , $pieces_no, ['Required',  'Numeric']);
    $validator->validate('desc' , $desc, ['Required', 'Str', 'Max']);
    $validator->validate('image' , $img, ['RequiredFile', 'Image']);
    

    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        $request->aredirect("add-product.php");
    }else{
        // upload img
        $file = new File($img);
        $imgUploadName = $file->rename()->upload();

        // db query
        $pr = new Product;
        $pr->insert("name , `desc` , price , pieces_no , img , cat_id", 
            " '$name', '$desc' , '$price', '$pieces_no', '$imgUploadName', '$cat_id'");
        $session->set('success' , 'Product Added Successfully');
        $request->aredirect("products.php");
    }
}else{
    $request->aredirect("add-product.php");
}