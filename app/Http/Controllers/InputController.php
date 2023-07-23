<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function helloFirstName(Request $request): string 
    {
        $firstName = $request->input('name.first');
        return "Hello $firstName";
    }
    
    public function helloArray(Request $request): string 
    {
        $arrayName = $request->input('products.*.name');
        return $arrayName;
    }

    public function inputType(Request $request): string 
    {
        $name = $request->input('name');
        $married = $request->boolean('married');
        $birthDate = $request->date('birth_date', 'Y-m-d');
        return json_encode([
            'name' => $name,
            'married' => $married,
            'birthDate' => $birthDate->format('Y-m-d')
        ]);
    }

}
