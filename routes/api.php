<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
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

    $api->group([

        'prefix' => 'v1'
    
    ], function ($api) {
        $api->get('vishal', function(){
            echo "vishal";
        });
        
        $api->post('login', [AuthController::class,'login']);

        $api->group(['middleware'=>'auth:api'],function($api){

            $api->post('showdata',[Api\V1\ApiController::class,'showdata']);
            
            $api->post('logout', [AuthController::class,'logout']);
            $api->post('refresh', [AuthController::class,'refresh']);
            $api->post('me', [AuthController::class,'me']);
        });
    
    });


    
});

$api->version('v2', function ($api) {
    $api->group([
        'prefix'=>'v2'
    ],function($api){

        $api->get('vishal', function(){
            echo "parth";
        });

        $api->post('showdata',[Api\V2\ApiController::class,'showdata']);
    
    });




});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
