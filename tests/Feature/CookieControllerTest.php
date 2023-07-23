<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    public function testCookieController()
    {
        $this->get('/cookie/set')
            ->assertSeeText('Hello Cookie')
            ->assertCookie('User-Id', "Gusti")
            ->assertCookie('Is-Member', "true");
    }

    public function testGetCookieController()
    {
        $this->withCookie('User-Id', 'Gusti')
            ->withCookie('Is-Member', 'true')
            ->get('/cookie/get')
            ->assertJson([
                "userId" => 'Gusti',
                "isMember" => true
            ]);
    }
}
