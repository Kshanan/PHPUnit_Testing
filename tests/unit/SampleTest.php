<?php

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    public function testTrueReturnstrue()
    {
        $output = false;
        if(1===1){
            $output = True;
        }
        $this->assertTrue($output);
    }

    
    public function testCheckIfHasKey()
    {
        $userArray = [
            'name' => 'kshanan',
            'age'  => 28
        ];

        $this->assertArrayHasKey('age',$userArray);
    }
}

