<?php

namespace Tests\Unit;

use App\UnitTest\AccountantHelper;
use PHPUnit\Framework\TestCase;

class AccountantTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function it_can_find_profit()
    {
        $profit = AccountantHelper::findProfit(100);
        $this->assertEquals(10,$profit);
        $this->assertGreaterThanOrEqual(10,$profit);
    }
}
