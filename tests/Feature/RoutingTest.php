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

    public function testRouterParameter() 
    {
        $this->get('/products/1')
            ->assertSeeText('Product 1');

        $this->get('/products/2')
            ->assertSeeText('Product 2');

        $this->get('/products/1/items/xxx')
            ->assertSeeText('Product 1, Item xxx');

        $this->get('/products/2/items/yyy')
            ->assertSeeText('Product 2, Item yyy');
    }

    public function testRouterParameterRegex() 
    {
        $this->get('/category/100')
            ->assertSeeText('Category 100');


        $this->get('/category/gusti')
            ->assertSeeText('404 by Gusti Giustainto');
    }

    public function testRouterParameterOptional() 
    {
        $this->get('/user/gusti')
            ->assertSeeText('User gusti');

        $this->get('/user/')
            ->assertSeeText('User 404');
    }
}
