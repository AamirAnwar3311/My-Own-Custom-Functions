<?php

namespace HelperFunctions\Tests\Unit;

use HelperFunctions\Helpers\StringHelper;
use PHPUnit\Framework\TestCase;

class StringHelperTest extends TestCase
{
    /**
     * Test slug method.
     */
    public function test_slug()
    {
        $result = StringHelper::slug('Hello World!');
        $this->assertEquals('hello-world', $result);
    }

    /**
     * Test generateOTP method.
     */
    public function test_generate_otp()
    {
        $result = StringHelper::generateOTP(6);
        $this->assertEquals(6, strlen($result));
        $this->assertTrue(ctype_digit($result));
    }

    /**
     * Test mask method.
     */
    public function test_mask()
    {
        $result = StringHelper::mask('1234567890', 2, 4);
        $this->assertEquals(10, strlen($result));
        $this->assertStringContainsString('12', $result);
        $this->assertStringContainsString('7890', $result);
    }

    /**
     * Test truncate method.
     */
    public function test_truncate()
    {
        $result = StringHelper::truncate('Hello World', 5);
        $this->assertEquals(9, strlen($result)); // "Hello..."
    }

    /**
     * Test isJson method.
     */
    public function test_is_json()
    {
        $this->assertTrue(StringHelper::isJson('{"name":"John"}'));
        $this->assertFalse(StringHelper::isJson('Invalid JSON'));
    }

    /**
     * Test camelToSnake method.
     */
    public function test_camel_to_snake()
    {
        $result = StringHelper::camelToSnake('camelCase');
        $this->assertEquals('camel_case', $result);
    }

    /**
     * Test snakeToCamel method.
     */
    public function test_snake_to_camel()
    {
        $result = StringHelper::snakeToCamel('snake_case');
        $this->assertEquals('SnakeCase', $result);
    }

    /**
     * Test getInitials method.
     */
    public function test_get_initials()
    {
        $result = StringHelper::getInitials('John Doe');
        $this->assertEquals('JD', $result);
    }
}

