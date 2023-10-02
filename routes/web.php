<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('check.dato')->get('/prueba', function () {
    return view('prueba.template');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/usuarios', [UserController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/usuarios/notificar/{id}', [UserController::class, 'notify'])->middleware(['auth']);


Route::get('/store-text', function () {
    $content = "Trabajando con Minio.<br>Este es el contenido de mi archivo de texto.";
    $path = "data/miArchivo.txt";

    // Guardar en S3
    if(Storage::disk('s3')->put($path, $content)) {
      return "Archivo guardado exitosamente!";
    } else {
      return "No se ha podido guardar el Archivo!";
    }

});

Route::get('/get-text', function () {
    $path = "data/miArchivo.txt";
    
    $file = Storage::disk('s3')->get($path);
    echo $file;
    var_dump($file);
});