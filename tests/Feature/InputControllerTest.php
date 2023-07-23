<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInputNested()
    {
        $this->post('/input/hello/first', [
            "name" => [
                "first" => "Gusti",
                "last" => "Giustianto",
            ]
        ])->assertSeeText("Hello Gusti");
    }

    public function testhelloArray()
    {
        $this->post('/input/hello/array', [
            "products" => [
                [
                    "name" => "Samsung",
                    "price" => 4500,
                ],
                [
                    "name" => "Apple",
                    "price" => 4500,
                ]
            ]
        ])->assertSeeText("Samsung")->assertSeeText("Apple");
    }

    public function testinputType()
    {
        $this->post('/input/type', [
            "name" => "Gusti",
            "married" => "true",
            "birthDate" => "2000-25-04",
        ])->assertSeeText("Gusti")->assertSeeText("true")->assertSeeText("2000-25-04");
    }
}
