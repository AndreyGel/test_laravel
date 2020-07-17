<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate()
    {
        $product = factory(Product::class)->create(['product_name' => 'test']);

        $this->assertNotEmpty($product);
        $this->assertEquals('test', $product->product_name);
        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('products', ['product_name' =>'test']);
    }

    public function testCreateFail()
    {
        $this->expectException(QueryException::class);

        $product = factory(Product::class)->create(['product_name' => null]);
    }

    public function testUpdate()
    {
        $product = factory(Product::class)->create();
        $product->fill([
            'id' => '12345',
            'image_url' => 'http://test.com',
            'product_name' => 'test',
            'categories' => 'new'
        ])->save();

        $this->assertEquals('12345', $product->id);
        $this->assertEquals('http://test.com', $product->image_url);
        $this->assertEquals('test', $product->product_name);
        $this->assertEquals('new', $product->categories);

    }
}
