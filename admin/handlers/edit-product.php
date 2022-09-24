<?php

require_once("../../app.php");
use TeachStore\Classes\Models\Product;
use TeachStore\Classes\File;
use TeachStore\Classes\Validation\Validator;

if($request->postHas('update'))
{
    $id = $request->get('id');
    $name = $request->post('name');
    $cat_id = $request->post('cat_id');
    $price = $request->post('price');
    $pieces_no = $request->post('pieces_no');
    $desc = $request->post('desc');
    $img = $request->files('img');


    //validation

    $validator = new Validator;
    $validator->validate('name' , $name, ['Required', 'Str' , 'Max']);
    $validator->validate('category id' , $cat_id, ['Required', 'Numeric']);
    $validator->validate('price' , $price, ['Required',  'Numeric']);
    $validator->validate('pieces number' , $pieces_no, ['Required',  'Numeric']);
    $validator->validate('desc' , $desc, ['Required', 'Str', 'Max']);
    // if he uploads image
    if ($img['error'] == 0 ){
        $validator->validate('image' , $img, ['Image']);
    }
   

    if($validator->hasErrors()){
        $session->set("errors", $validator->getErrors());
        $request->aredirect("edit-product.php");
    }else{
        $pr = new Product;
        $imgName = $pr->selectId($id, 'img')['img'];

        // if upload image 
        if ($img['error'] == 0 ){
            unlink(PATH . "uploads/$imgName");
            $file = new File($img);
            $imgName = $file->rename()->upload();
        }
        $pr->update("name='$name',`desc`= '$desc', price= '$price', pieces_no = '$pieces_no', 
        cat_id = '$cat_id' , img = '$imgName'", $id); 
        $session->set('success' , 'Product Updated Successfully');
        $request->aredirect("products.php");
    }
}else{
    $request->aredirect("edit-product.php");
}