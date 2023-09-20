<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\HelloNotification;

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

    public function notify(Request $request, $id) {
        $user = User::find($id);

        if(! $user) {
            abort(404);
        }

        $user->notify(new HelloNotification("Esto es un mensaje arbitrario"));

        $request->session()->flash('feedback', 'Se ha enviado la notificacion');

        return redirect('/usuarios');

    }

}
