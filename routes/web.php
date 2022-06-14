<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;



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
    return view('welcome');
});

Route::get('/manifest.json', function () {
    return [
        "identifier" => "sorting-array-app",
        "name" => "Sorting Array",
        "description" => "Sorting Array description",
        "logo" => "/app-logo.png",
        "baseUrl" => "https://21cb-5-58-50-180.eu.ngrok.io/",
        "authentication" => [
            "type" => "authorization_code",
            "clientId" => "zRH770u2ztd3WV7nXUEk",
        ],
        "events" => [
            "installed"=> "/install",
        ],
        "scopes" => [
            "project",
        ],
        "modules" => [
            "project-integrations" => [
                [
                    "key" => "your-module-key",
                    "name" => "Sorting Array",
                    "description" => "Sorting Array description",
                    "logo" => "/app-logo.png",
                    "url" => "/",
                    "environments" => [
                        "crowdin",
                    ],
                ],
            ],
        ],
    ];
});

Route::post('/install', function () {
    return ['success' => true];
});

Route::post('/uninstall', function () {
    return ['success' => true];
});
