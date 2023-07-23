<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function craeteSession(Request $request): string
    {
        // Menyimpan Data SESSION
        $request->session()->put('userId', 'Gusti Giustianto');
        $request->session()->put('memeberId', 'true');
        return "Ok";
    }

    public function getSession(Request $request): string
    {
        // mednaptkan Data SESSION
        $userId = $request->session()->get('userId', 'Guess');
        $memberId = $request->session()->get('memeberId', 'false');
        return "User Id: $userId, is Member: $memberId";
    }
}
