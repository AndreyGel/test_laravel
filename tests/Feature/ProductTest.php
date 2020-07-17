<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testProducts()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('Products');
    }
}
