<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\http\Controllers\AuthController;
use app\http\Controllers\BilletController;
use app\http\Controllers\DocController;
use app\http\Controllers\FoundAndLostController;
use app\http\Controllers\ReservationController;
use app\http\Controllers\UnitController;
use app\http\Controllers\UserController;
use app\http\Controllers\WallController;
use app\http\Controllers\WarningController;


Route::get('/ping', function(){
    return ['pong' => true ];
});