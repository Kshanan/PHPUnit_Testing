<?php

use App\Support\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testcheckIfDataPresent()
    {
        
        $collect = new Collection([
            
        ]);
        $obj = new Collection([1,2,3]);
        
        $this->assertNotSame($obj->getdata(),$collect->getData()); //checking if both object data is not similar
        $this->assertNotNull($collect->getdata());
        $this->assertInstanceOf(Collection::class,$obj);
    }

    public function testCalculateDiscountedPrice()
    {
        $originalPrice = 100;
        $customerType = 'VIP';
        $membershipDuration = 3;

        // Determine the discount based on the customer type and membership duration
        if ($customerType === 'VIP') {
            if ($membershipDuration >= 2) {
                $discount = 0.2; // 20% discount for VIP customers with membership duration of 2 or more years
            } else {
                $discount = 0.1; // 10% discount for VIP customers with less than 2 years of membership
            }
        } else {
            $discount = 0; // No discount for regular customers
        }

        // Calculate the discounted price
        $discountedPrice = $originalPrice - ($originalPrice * $discount);

        // Assert that the calculated discounted price matches the expected value
        $this->assertEquals(80, $discountedPrice);
    }


    public function testProcessData()
    {
        $data = [
            ['id' => 1, 'name' => 'John', 'age' => 25],
            ['id' => 2, 'name' => 'Jane', 'age' => 30],
            ['id' => 3, 'name' => 'Alice', 'age' => 20],
            ['id' => 4, 'name' => 'Bob', 'age' => 40],
            ['id' => 5, 'name' => 'Eve', 'age' => 35]
        ];

        // Process the data to filter out users below 30 years old and sort them by name
        $processedData = [];
        foreach ($data as $item) {
            if ($item['age'] >= 30) {
                $processedData[] = $item;
            }
        }
        // print_r($processedData);
        usort($processedData, function ($a, $b) {
            
            return strcmp($a['name'], $b['name']);
        });

        // print_r($processedData);
        // die();

        // Assert that the processed data matches the expected result
        $expectedResult = [
            ['id' => 4, 'name' => 'Bob', 'age' => 40],
            ['id' => 5, 'name' => 'Eve', 'age' => 35],
            ['id' => 2, 'name' => 'Jane', 'age' => 30]
        ];
        $this->assertEquals($expectedResult, $processedData);
    }

    public function testCalculateShippingCost()
    {
        $itemWeight = 2.5; // Weight of the item in kilograms
        $itemValue = 150; // Value of the item in dollars
        $shippingLocation = 'US'; // Shipping destination

        $baseRate = 10; // Base shipping rate
        $weightRate = 2; // Shipping rate per kilogram
        $valueRate = 0.02; // Shipping rate as a percentage of the item value

        // Calculate the shipping cost based on the weight, value, and destination
        $shippingCost = $baseRate + ($itemWeight * $weightRate) + ($itemValue * $valueRate);

        // Apply additional charges based on the shipping location
        if ($shippingLocation === 'US') {
            $shippingCost += 5; // Additional $5 for shipping within the US
        } elseif ($shippingLocation === 'Canada') {
            $shippingCost += 10; // Additional $10 for shipping to Canada
        } elseif ($shippingLocation === 'International') {
            $shippingCost += 20; // Additional $20 for international shipping
        }

       
        // Assert that the calculated shipping cost is within a range of values
        // $this->assertGreaterThanOrEqual(45, $shippingCost);
        $this->assertLessThanOrEqual(50, $shippingCost);
    }
}

