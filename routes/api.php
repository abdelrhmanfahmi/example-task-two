<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\OperatorController;
use App\Http\Controllers\Api\EntityController;
use App\Http\Controllers\Api\AttributeController;
use App\Http\Controllers\Api\AssignAttributeController;
use App\Http\Controllers\Api\EntityUserController;
use Illuminate\Support\Facades\Route;


Route::post('login' , [AuthController::class , 'login'])->name('login');

Route::group(['middleware' => 'auth:api'], function () {

    Route::group(["middleware" => "role:admin"], function() {
        Route::apiResource('operators', OperatorController::class);
        Route::apiResource('entities', EntityController::class);
        Route::apiResource('attributes', AttributeController::class);
        Route::post('/assign/attribute/entity' , [AssignAttributeController::class , 'assignAttributeToEntity']);
    });

    Route::group(["middleware" => "role:operator"], function() {
        Route::post('/store/values' , [EntityUserController::class , 'storeValues']);
        Route::get('/fetch/all/values' , [EntityUserController::class , 'fetchAllValuesForEntity']);
        Route::get('/fetch/specific/values/{entityId}' , [EntityUserController::class , 'fetchSpecificValuesForEntity']);
    });

    Route::post('logout' , [AuthController::class , 'logout'])->name('logout');
});
