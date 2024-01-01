<?php

use App\Http\Middleware\WebSocketAuthMiddleware;
use App\Http\Websockets\WebSocketHandler;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Support\Facades\Route;

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
//    return view('welcome');
    return jsonErrorResponse('Author: Cryptech Links', 403);
});

WebSocketsRouter::webSocket('/sockets/get-data', WebSocketHandler::class);

Route::get('/ws-test', function () {
    return view('websocket');
});
