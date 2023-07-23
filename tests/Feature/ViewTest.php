<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    
    public function testView()
    {
        $this->get('/hello')
            ->assertSeeText('Gusti Giustianto');

        $this->get('/hello-again')
            ->assertSeeText('Gusti Giustianto');
    }

    public function testViewNested()
    {
        $this->get('/hello-world')
            ->assertSeeText('Gusti Giustianto');
    }

    public function testTemplate()
    {
        $this->view('hello', [
            'name' => 'Gusti Giustianto',
            'title' => 'Route View'
        ])->assertSeeText('Gusti');


        $this->view('hello.world', [
            'name' => 'Gusti Giustianto',
            'title' => 'Route View'
        ])->assertSeeText('Gusti');
    }
}
 