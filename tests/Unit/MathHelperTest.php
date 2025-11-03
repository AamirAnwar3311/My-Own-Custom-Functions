<?php

namespace HelperFunctions\Tests\Unit;

use HelperFunctions\Helpers\MathHelper;
use PHPUnit\Framework\TestCase;

class MathHelperTest extends TestCase
{
    /**
     * Test calculate method for sum.
     */
    public function test_calculate_sum()
    {
        $result = MathHelper::calculate(5, 3, 'sum');
        $this->assertEquals(8, $result);
    }

    /**
     * Test calculate method for subtraction.
     */
    public function test_calculate_subtract()
    {
        $result = MathHelper::calculate(5, 3, 'subtract');
        $this->assertEquals(2, $result);
    }

    /**
     * Test calculate method for multiplication.
     */
    public function test_calculate_multiply()
    {
        $result = MathHelper::calculate(5, 3, 'multiply');
        $this->assertEquals(15, $result);
    }

    /**
     * Test calculate method for division.
     */
    public function test_calculate_divide()
    {
        $result = MathHelper::calculate(10, 2, 'divide');
        $this->assertEquals(5, $result);
    }

    /**
     * Test division by zero throws exception.
     */
    public function test_calculate_divide_by_zero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Division by zero is not allowed');
        
        MathHelper::calculate(10, 0, 'divide');
    }

    /**
     * Test invalid operation throws exception.
     */
    public function test_calculate_invalid_operation()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        MathHelper::calculate(10, 5, 'invalid');
    }

    /**
     * Test calculateCommission method.
     */
    public function test_calculate_commission()
    {
        $result = MathHelper::calculateCommission(1000, 15);
        $this->assertEquals(150.0, $result);
    }

    /**
     * Test formatNumber method.
     */
    public function test_format_number()
    {
        $result = MathHelper::formatNumber(1234567.89);
        $this->assertEquals('1,234,567.89', $result);
    }

    /**
     * Test percentage method.
     */
    public function test_percentage()
    {
        $result = MathHelper::percentage(1000, 25);
        $this->assertEquals(250.0, $result);
    }
}

