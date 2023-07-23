<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloController extends TestCase
{

    public function testHelo()
    {
        $this->get('/controller/hello/Gusti')
            ->assertSeeText("Hello World Gusti");
    }

    public function testController()
    {
        $this->get('/controller/hello/requestData', [
            'Accept' => "plain/text"
        ])->assertSeeText('controller/hello/requestData')
            ->assertSeeText('http://localhost/controller/hello/requestData')
            ->assertSeeText('GET')
            ->assertSeeText('lain/text');
    }
}
