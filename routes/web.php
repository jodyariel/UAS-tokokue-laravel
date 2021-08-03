<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakesController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TransController;
use App\Http\Controllers\GroupsController;
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

Route::get('', [CakesController::class, 'index']);
Route::get('/cakes/welcome',[CakesController::class, 'welcome']);
//Route::get('/drinks', [DrinksController::class, 'index']);
//Route::get('/drinks/create', [DrinksController::class, 'create']);
//Route::post('/drinks', [DrinksController::class, 'store']);
//Route::get('/drinks/{id}', [DrinksController::class, 'show']);
//Route::get('/drinks/{id}/edit', [DrinksController::class, 'edit']);
//Route::put('/drinks/{id}', [DrinksController::class, 'update']);
//Route::delete('/drinks/{id}', [DrinksController::class, 'destroy']);

Route::resources([
    'cakes' => CakesController::class,
    'data' => DataController::class,
    'trans' => TransController::class,
    'groups' => GroupsController::class,
]);
Route::get('/cakes/addmember/{cake}', [CakesController::class, 'addmember']);
Route::put('/cakes/addmember/{cake}', [CakesController::class, 'updateaddmember']);
Route::put('/cakes/deleteaddmember/{cake}', [CakesController::class, 'deleteaddmember']);

Route::get('/groups/addmember/{group}', [GroupsController::class, 'addmember']);
Route::put('/groups/addmember/{group}', [GroupsController::class, 'updateaddmember']);
Route::put('/groups/deleteaddmember/{group}', [GroupsController::class, 'deleteaddmember']);