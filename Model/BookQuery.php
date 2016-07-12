<?php

namespace Model;

class BookQuery
{
    public $title;
    public $operator;
    public $age;

    public function __construct($str = null)
    {
        if(!is_null($str)){
            $this->extractQuery($str);
        }
    }

    public function extractQuery($str)
    {
        $exploded = explode('|', $str);

        if(count($exploded) == 2){
            $this->title = $exploded[0];
            $agePart = str_replace('age', '', $exploded[1]);
            $this->operator = substr($agePart, 0, 1);
            $this->age = substr($agePart, 1);
        }
    }
}