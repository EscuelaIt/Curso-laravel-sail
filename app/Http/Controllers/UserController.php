<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function prueba() {
        return view('prueba')->with([
            'data' => 'un dato',
        ]);
    }

    public function index() {
        $users = User::all();
        //$users = User::where('name', 'Miguel Angel')->get();

        return view('users.list')->with([
            'users' => $users,
        ]);
    }

}
