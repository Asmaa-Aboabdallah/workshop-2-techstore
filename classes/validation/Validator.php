<?php

namespace TeachStore\Classes\Validation;

class Validator
{
    private $errors = [];
    public $obj;
    public function validate(string $name , $value , array $rules)
    {
        foreach($rules as $rule){
            $className = "TeachStore\\Classes\\Validation\\" . $rule;
            $this->obj = new $className; // create object باسم ال rule 
            // Solid principle issue 
            // if ($rule == 'required')
            // {
            //     $this->obj = new Required;
            // }elseif($rule == 'numeric'){
            //     $this->obj  = new Numeric;
            // }elseif($rule == 'max'){
            //     $this->obj  = new Max;
            // }elseif($rule == 'str'){
            //     $this->obj  = new Str;
            // }elseif($rule == 'email'){
            //     $this->obj  = new Email;
            // }
            $error = $this->obj->check($name , $value);
                if($error != false)
                {
                    $this->errors[] = $error;
                    break; // display one error
                }

        }
    }

    public function getErrors() : array
    {
        return $this->errors;
    }

    public function hasErrors() : bool
    {
       return ! empty($this->errors); // true => return false that it dosenot have errors 
                                      // false => return true that it have errors 

    }
}