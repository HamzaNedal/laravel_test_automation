<?php

namespace Tests\Unit;

use App\UnitTest\AccountantHelper;
use App\UnitTest\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    protected $cart;
    public function setUp(): void
    {
        $cart = new Cart();

        $item = array(
            'id' => 456,
            'name' => 'Sample Item',
            'price' => 67.99,
            'quantity' => 4,
            'attributes' => array()
        );

        $cart->insert($item);
        $this->cart = $cart;
    }
    /** @test */
    public function we_can_add_an_item_to_the_cart()
    {
        $this->assertCount(1, $this->cart->getItems());
    }
    /** @test */
    public function we_can_count_items()
    {
        $this->assertEquals(1, $this->cart->count());
    }
    /** @test */
    public function we_can_calculate_the_total_amount()
    {
        $this->assertGreaterThanOrEqual(100, $this->cart->total());
    }
}
