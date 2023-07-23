<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    public function testSessionController()
    {
        $this->get('/session/create')
            ->assertSeeText('Ok')
            ->assertSessionHas('userId', 'Gusti Giustianto')
            ->assertSessionHas('memeberId', 'true');
    }

    public function testGetSessionController()
    {
        $this->withSession([
            "userId" => "Gusti Giustianto",
            "memeberId" => "true",
        ])->get('/session/get')
            ->assertSeeText('User Id: Gusti Giustianto, is Member: true');
    }


    public function testGetSessionFailedController()
    {
        $this->withSession([])->get('/session/get')
        ->assertSeeText('User Id: Guess, is Member: false');
    }
}
