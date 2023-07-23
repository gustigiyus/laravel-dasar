<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    public function testGetEnv() 
    {
        $name = env('NAMA_LENGKAP');
        self::assertEquals('Gusti Giustianto', $name);
    }

    public function testDefaultEnv()
    {

        if(App::environment(['testing', 'prod', 'dev'])) {
            // Lakukan kdoe program jika berada pada environmnet tertentu
            $author = env('AUTHOR', 'Gusti');
            self::assertEquals('Gusti', $author);
        }
    }
}
