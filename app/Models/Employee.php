<?php
namespace App\Models;
class Employee
{
    protected $employee;
    protected $employeeAge;
    protected $employeeName;
    //function to set employee name 
    public function setName($name)
    {
        $this->employee = $name;
    }

    //function to get employee name
    public function getName()
    {
        return $this->employee;
    }

    //funtion to set employee age
    public function setAge($age)
    {
        $this->employeeAge = $age;
    }

    //function get employee age
    public function getAge()
    {
        return $this->employeeAge;
    }

    //function to set employee name and age

    public function setNameAndAge($name,$age)
    {
        $this->employeeName = $name;
        $this->employeeAge = $age;
    }

    public function getNameAndAge()
    {
        return [$this->employeeName,$this->employeeAge];
        
    }
}
?>