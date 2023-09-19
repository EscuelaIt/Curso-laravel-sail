<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function prueba() {
        return view('prueba')->with([
            'data' => 'un dato',
        ]);
    }
}
