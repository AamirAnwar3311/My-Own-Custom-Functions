<?php

namespace HelperFunctions\Tests\Unit;

use HelperFunctions\Helpers\ArrayHelper;
use PHPUnit\Framework\TestCase;

class ArrayHelperTest extends TestCase
{
    /**
     * Test isAssociative method.
     */
    public function test_is_associative()
    {
        $this->assertTrue(ArrayHelper::isAssociative(['name' => 'John']));
        $this->assertFalse(ArrayHelper::isAssociative([1, 2, 3]));
    }

    /**
     * Test get method.
     */
    public function test_get()
    {
        $array = ['name' => 'John'];
        $this->assertEquals('John', ArrayHelper::get($array, 'name'));
        $this->assertEquals('Default', ArrayHelper::get($array, 'missing', 'Default'));
    }

    /**
     * Test pluck method.
     */
    public function test_pluck()
    {
        $array = [
            ['name' => 'John', 'age' => 30],
            ['name' => 'Jane', 'age' => 25],
        ];
        
        $result = ArrayHelper::pluck($array, 'name');
        $this->assertEquals(['John', 'Jane'], $result);
    }

    /**
     * Test unique method.
     */
    public function test_unique()
    {
        $result = ArrayHelper::unique([1, 2, 2, 3, 3, 4]);
        $this->assertEquals([1, 2, 3, 4], $result);
    }

    /**
     * Test chunk method.
     */
    public function test_chunk()
    {
        $result = ArrayHelper::chunk([1, 2, 3, 4, 5], 2);
        $this->assertEquals([[1, 2], [3, 4], [5]], $result);
    }

    /**
     * Test first and last methods.
     */
    public function test_first_and_last()
    {
        $array = [1, 2, 3, 4, 5];
        $this->assertEquals(1, ArrayHelper::first($array));
        $this->assertEquals(5, ArrayHelper::last($array));
    }
}

