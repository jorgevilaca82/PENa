<?php

use App\Http\Controllers\ProcessoEletronico\DocumentoController as PEDocumentoController;
use App\Http\Controllers\ProcessoEletronicoController as PEController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('processo_eletronico', PEController::class)
        ->except(['destroy']);

    Route::resource('processo_eletronico.documentos', PEDocumentoController::class)
        ->except(['destroy'])->scoped(['documento' => 'protocolo']);
});

require __DIR__ . '/auth.php';
