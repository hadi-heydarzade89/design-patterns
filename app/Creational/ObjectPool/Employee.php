<?php

namespace App\Creational\ObjectPool;

class Employee
{
    private $id;

    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getInfo()
    {
        echo "ID = " . $this->id . "; Name = " . $this->name;
    }
}