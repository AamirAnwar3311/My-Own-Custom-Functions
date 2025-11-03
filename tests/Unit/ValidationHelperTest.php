<?php

namespace HelperFunctions\Tests\Unit;

use HelperFunctions\Helpers\ValidationHelper;
use PHPUnit\Framework\TestCase;

class ValidationHelperTest extends TestCase
{
    /**
     * Test isValidEmail method.
     */
    public function test_is_valid_email()
    {
        $this->assertTrue(ValidationHelper::isValidEmail('john@example.com'));
        $this->assertFalse(ValidationHelper::isValidEmail('invalid-email'));
    }

    /**
     * Test isValidUrl method.
     */
    public function test_is_valid_url()
    {
        $this->assertTrue(ValidationHelper::isValidUrl('https://example.com'));
        $this->assertFalse(ValidationHelper::isValidUrl('not-a-url'));
    }

    /**
     * Test isValidIp method.
     */
    public function test_is_valid_ip()
    {
        $this->assertTrue(ValidationHelper::isValidIp('192.168.1.1'));
        $this->assertFalse(ValidationHelper::isValidIp('invalid-ip'));
    }

    /**
     * Test isValidDateFormat method.
     */
    public function test_is_valid_date_format()
    {
        $this->assertTrue(ValidationHelper::isValidDateFormat('2024-12-25', 'Y-m-d'));
        $this->assertFalse(ValidationHelper::isValidDateFormat('invalid-date', 'Y-m-d'));
    }

    /**
     * Test isValidRange method.
     */
    public function test_is_valid_range()
    {
        $this->assertTrue(ValidationHelper::isValidRange(50, 1, 100));
        $this->assertFalse(ValidationHelper::isValidRange(150, 1, 100));
    }

    /**
     * Test isValidLength method.
     */
    public function test_is_valid_length()
    {
        $this->assertTrue(ValidationHelper::isValidLength('hello', 3, 10));
        $this->assertFalse(ValidationHelper::isValidLength('hi', 3, 10));
    }

    /**
     * Test isAlphaOnly method.
     */
    public function test_is_alpha_only()
    {
        $this->assertTrue(ValidationHelper::isAlphaOnly('Hello World'));
        $this->assertFalse(ValidationHelper::isAlphaOnly('Hello123'));
    }

    /**
     * Test isNumeric method.
     */
    public function test_is_numeric()
    {
        $this->assertTrue(ValidationHelper::isNumeric('12345'));
        $this->assertFalse(ValidationHelper::isNumeric('12abc'));
    }
}

