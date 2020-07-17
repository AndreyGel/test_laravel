<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    public function testSearch()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Search');
    }
}
