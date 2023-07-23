<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponseController()
    {
        $this->get('/response/hello')
            ->assertStatus(200)
            ->assertSeeText('Hello Response');
    }

    public function testResponseHeder()
    {
        $this->get('/response/header')
            ->assertStatus(200)
            ->assertSeeText('Gusti')->assertSeeText('Giustianto')
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeader('Author', 'Gusti Giyus')
            ->assertHeader('App', 'Belajar Laravel');
    }

    public function testResponseView()
    {
        $this->get('/response/type/view')
            ->assertSeeText('Gusti');
    }

    public function testResponseJson()
    {
        $this->get('/response/type/json')
            ->assertJson([
                'firstName' => "Gusti",
                'lasttName' => "Giustianto",
            ]);
    }

    public function testResponseFile()
    {
        $this->get('/response/type/file')
            ->assertHeader('Content-Type', 'image/png');
    }

    public function testResponseDownload()
    {
        $this->get('/response/type/download')
            ->assertDownload('gusti.png');
    }
}
