<?php

namespace HelperFunctions\Tests\Unit;

use HelperFunctions\Helpers\ApiHelper;
use PHPUnit\Framework\TestCase;

class ApiHelperTest extends TestCase
{
    /**
     * Test hitApi method with valid parameters.
     */
    public function test_hitApi_with_valid_parameters()
    {
        $this->expectNotToPerformAssertions();
        // Note: This is a placeholder test. Actual API calls should be mocked in real tests.
    }

    /**
     * Test hitApi method with invalid HTTP method.
     */
    public function test_hitApi_with_invalid_method()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        ApiHelper::hitApi('INVALID', 'https://example.com');
    }

    /**
     * Test get method.
     */
    public function test_get_method()
    {
        $this->expectNotToPerformAssertions();
        // Note: This is a placeholder test. Actual API calls should be mocked in real tests.
    }
}

