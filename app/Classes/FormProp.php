<?php
namespace App\Classes;
class FormProp{
    public $sql;
    public $name;
    public $isRequired;
    public $inputType;
    function __construct($sql,$name,$isRequired,$inputType){
        $this->sql = $sql;
        $this->name = $name;
        $this->isRequired = $isRequired;
        $this->inputType = $inputType;
    }
}

