<?php

namespace HelperFunctions\Tests\Unit;

use HelperFunctions\Helpers\DateHelper;
use PHPUnit\Framework\TestCase;

class DateHelperTest extends TestCase
{
    /**
     * Test formatDate method.
     */
    public function test_format_date()
    {
        $result = DateHelper::formatDate('2024-12-25', 'Y-m-d');
        $this->assertEquals('2024-12-25', $result);
    }

    /**
     * Test checkExpiry method for active.
     */
    public function test_check_expiry_active()
    {
        $today = date('Y-m-d');
        $future = date('Y-m-d', strtotime('+30 days'));
        
        $result = DateHelper::checkExpiry($today, $future);
        $this->assertEquals('active', $result);
    }

    /**
     * Test daysBetween method.
     */
    public function test_days_between()
    {
        $result = DateHelper::daysBetween('2024-01-01', '2024-01-31');
        $this->assertEquals(30, $result);
    }

    /**
     * Test isPast method.
     */
    public function test_is_past()
    {
        $pastDate = date('Y-m-d', strtotime('-1 year'));
        $this->assertTrue(DateHelper::isPast($pastDate));
    }

    /**
     * Test isFuture method.
     */
    public function test_is_future()
    {
        $futureDate = date('Y-m-d', strtotime('+1 year'));
        $this->assertTrue(DateHelper::isFuture($futureDate));
    }
}

