<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HelloController extends Controller
{

    public function hello(Request $request, string $name): string 
    {
        return "Hello World $name";
    }

    public function requestData(Request $request): string
    {
        return $request->path() . PHP_EOL .
        $request->url() . PHP_EOL .
        $request->fullUrl() . PHP_EOL .
        $request->method() . PHP_EOL .
        $request->header('Accept');

    }
}
