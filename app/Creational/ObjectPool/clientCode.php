<?php
use App\Creational\ObjectPool\EmployeePool;

$pool = new EmployeePool();

$employee1 = $pool->getEmployee();
$employee2 = $pool->getEmployee();

echo "Employee 1: " .$employee1->getInfo(). "\n";
echo "Employee 2: " .$employee2->getInfo(). "\n";
echo "List of occupied employees: " .$pool->getOccupiedEmployees(). "\n";
echo "List of free employees: " .$pool->getFreeEmployees(). "\n";



/**
 * Let’s try returning the second employee to his free state and see what new results we will get.
 */

$pool = new EmployeePool();

$employee1 = $pool->getEmployee();
$employee2 = $pool->getEmployee();
$pool->release($employee2);

echo "Employee 1: " .$employee1->getInfo(). "\n";
echo "Employee 2: " .$employee2->getInfo(). "\n";
echo "List of occupied employees: " .$pool->getOccupiedEmployees(). "\n";
echo "List of free employees: " .$pool->getFreeEmployees(). "\n";