<?php

use App\Support\EmailValidator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Employeetest extends TestCase
{
    protected $employee;

    public function setUp(): void
    {
        $this->employee = new \App\Models\Employee;
    }

    public function testGetEmployeeName(): void
    {
        $this->employee->setName('kshanan');

        $this->assertEquals($this->employee->getName(),'kshanan');
    }

    public function testGetEmployeeAge(): void
    {
        $this->employee->setAge(23);

        $this->assertEquals($this->employee->getAge(),23);
    }

    
    public function testGetEmployeeNameAndAge(): void
    {
        
        $this->employee->setNameAndAge('kshanan',28);

        $this->assertEquals($this->employee->getNameAndAge(),['kshanan',28]);

        $this->assertArrayHasKey(1,$this->employee->getNameAndAge());

        $this->assertIsArray($this->employee->getNameAndAge());

        $this->assertCount(2,$this->employee->getNameAndAge());

    }

    public function testDivideByZero()
    {
        $this->expectException(DivisionByZeroError::class);
        $result = 10 / 0; // Throws DivisionByZeroError
        
        
    }

    
    public function testInvalidEmail()
    {

        // $this->markTestIncomplete('must be revisited.');
        $validator = new EmailValidator();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid email format');

        $validator->validate('invalid');
    }

    public function testFileContents()
    {
        $expectedContent = "Hello,world!";
        $filePath = 'App/Models/file.txt';

        file_put_contents($filePath, $expectedContent);

        $this->assertFileEquals($filePath,$filePath);
        $this->assertStringEqualsFile($filePath,$expectedContent);
        $this->assertDirectoryDoesNotExist('sum');
        $this->assertDirectoryIsWritable('App/Models');
        $this->assertFileIsWritable('App/Models');

    }

    protected function tearDown() : void
    {
        $this->employee = null;
    }
}

