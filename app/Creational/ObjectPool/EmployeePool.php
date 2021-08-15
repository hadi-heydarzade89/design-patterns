<?php

namespace App\Creational\ObjectPool;

class EmployeePool
{
    private $occupiedEmployees;
    private $freeEmployees;
    private $names = ['William', 'Chris', 'Elsa', 'Jane', 'Bob'];

    public function __construct()
    {
        $this->occupiedEmployees = [];
        $this->freeEmployees = [];
    }

    public function getEmployee()
    {
        if (count($this->freeEmployees) == 0) {
            $id = count($this->occupiedEmployees) + count($this->freeEmployees) + 1;
            $randomName = array_rand($this->names, 1);
            $employee = new Employee($id, $this->names[$randomName]);
        } else {
            $employee = array_pop($this->freeEmployees);
        }
        $this->occupiedEmployees[$employee->getId()] = $employee;
        return $employee;
    }

    public function release($employee)
    {
        $id = $employee->getId();

        if (isset($this->occupiedEmployees[$id])) {
            unset($this->occupiedEmployees[$id]);
            $this->freeEmployees[$id] = $employee;
        }
    }

    public function getOccupiedEmployees()
    {
        $employees = '(Empty)';

        if (count($this->occupiedEmployees) > 0) {
            foreach ($this->occupiedEmployees as $employee) {
                $employees = $employees . $employee->getName();
            }
        }

        return $employees;
    }

    public function getFreeEmployees()
    {
        $employees = '(Empty)';

        if (count($this->freeEmployees) > 0) {
            foreach ($this->freeEmployees as $employee) {
                $employees = $employees . $employee->getName();
            }
        }

        return $employees;
    }
}