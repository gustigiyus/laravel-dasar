<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{

    public function testConfig()
    {
       $firstName =  config('contoh.author.first');
       $lastname =  config('contoh.author.last');
       $email =  config('contoh.email');
       $country =  config('contoh.country');

       self::assertEquals('Gusti', $firstName);
       self::assertEquals('Giustianto', $lastname);
       self::assertEquals('gustiggt123@gmail.com', $email);
       self::assertEquals('Indonesia', $country);
    }
}
