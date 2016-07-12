<?php

namespace Model\Entity;

use Model\Entity;

class Book extends Entity
{
    public $name;
    public $date;

    public function __construct($id, $name, $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
    }
}