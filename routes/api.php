<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;


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

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('vishal', function(){
        echo "vishal";
    });
    
    $api->post('showdata',[ApiController::class,'showdata']);

    $api->group([

        'middleware' => 'api',
        // 'namespace' => 'App\Http\Controllers',
    
    ], function ($api) {
    
        $api->post('login', [AuthController::class,'login']);
        $api->post('logout', [AuthController::class,'logout']);
        $api->post('refresh', [AuthController::class,'refresh']);
        $api->post('me', [AuthController::class,'me']);
    
    });
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
