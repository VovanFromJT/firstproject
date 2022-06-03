<?php

use App\Http\Controllers\SortingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::match(['get', 'post'], '/sort', [SortingController::class, 'render']);

Route::get('/download', function (Request $request) {
    return Storage::download('public/' . $request->kindSort . '.txt');
});
