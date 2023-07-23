<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $author = env('AUTHOR', 'Gusti');
        self::assertEquals('Gusti', $author);
    }
}
