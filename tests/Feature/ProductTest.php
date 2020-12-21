<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{

    /**
     * A basic feature test example.
     *@test
     */
    public function user_can_list_products()
    {
        Product::create([
            'name' => 'Car',
            'price' => '100',
        ]);
        $response = $this->get('/products');

        $response->assertStatus(200)
            ->assertSee('Car')
            ->assertSee('100');
    }

    /** @test */
    public function user_can_list_higher_price_products()
    {
        Category::factory(1000)->create();
        Product::factory(1000)->create();
        Product::factory()->create([
            'price' => 999,
        ]);
        $response = $this->get('/products');
        $response->assertStatus(200)
            ->assertJson(['data' => [['price' => 999]]]);
    }

    public function test_a_product_can_belongs_to_a_category()
    {
        //arrange => thing for test it
        $product = Product::factory()->create();
        $category = Category::factory()->create();

        //assert 
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
            'category_id' => $category->id,
        ]);

        //action
        $product->category()->associate($category)->save();

        //assert
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'category_id' => $category->id,
        ]);
    }

    public function test_it_prevent_changing_the_product_category()
    {
        $product = Product::factory()->create();
        $category = Category::factory()->create();
        $category2 = Category::factory()->create();
        $product->setCategory($category);
        $this->expectException(\Exception::class);
        $product->setCategory($category2);
    }
}
