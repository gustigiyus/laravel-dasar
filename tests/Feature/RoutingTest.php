<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGet() 
    {
        $this->get('/route_test')
            ->assertStatus(200)
            ->assertSeeText('Hello Gusti Giustianto');
    }

    public function testRedirect() 
    {
        $this->get('/youtube')
            ->assertRedirect('/route_test');
    }

    public function testFallback() 
    {
        $this->get('/tidakada')
            ->assertSeeText('404 by Gusti Giustainto');
    }
}
