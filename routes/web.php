<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosicaoController;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\JogadorController;

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

Route::resources([
    "jogador" => JogadorController::class
]);

Route::resources([
    "posicao" => PosicaoController::class
]);

Route::resources([
    "clube" => ClubeController::class
]);

Route::get('/', function () {
    return redirect("/jogador");
});
