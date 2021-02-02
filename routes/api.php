<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitsController;
use App\Models\Habits;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});

Route::get('habits', function() {
    //http://127.0.0.1:8000/api/habits
    return Habits::all();
});

Route::get('habits/{id}', function($id) {
    return Habits::find($id);
});

Route::post('/habits','App\Http\Controllers\HabitsController@createHabit');

/*
Route::put('habits/{id}', function(Request $request, $id) {
    $habit = Habits::findOrFail($id);
    $habit->update($request->all());

    return $habit;
});

Route::delete('habits/{id}', function($id) {
    Habits::find($id)->delete();

    return 204;
});*/