<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PastelsController;
use App\Http\Controllers\PedidosController;

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

Route::group(array('prefix' => 'api'), function()
{

  Route::get('/', function () {
      return response()->json(['message' => 'Pedidos API', 'status' => 'Connected']);;
  });

  Route::resource('clientes', ClientesController::class);
  Route::resource('pasteis', PastelsController::class);
  Route::resource('pedidos', PedidosController::class);
});

Route::get('/', function () {
    return redirect('api');
});
