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

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function(){
    Route::post('/auth/validate', [AuthController::class, 'validateToken']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

    //Mural de avisos
    Route::get('/walls', [WallController::class, 'getAll']);
    Route::post('/wall/{id}/like', [WallController::class, 'like']);

    //Documentos
    Route::get('/docs', [DocController::class, 'getAll']);

    //Livro de ocorrências
    Route::get('/warnings', [WallController::class, 'getMyWarnings']);
    Route::post('/warning', [WallController::class, 'setWarning']);
    Route::post('/warning/file', [WallController::class, 'addWarningFile']);

    //Boletos
    Route::get('/billets', [BilletController::class, 'getAll']);

    //Achados e perdidos
    Route::get('/foundandlost', [FoundAndLostController::class, 'getall']);
    Route::post('/foundandlost', [FoundAndLostController::class, 'insert']);
    Route::put('/foundandlost/{id}', [FoundAndLostController::class, 'update']);

    //Unidade
    Route::get('/unit/{id}', [UnitController::class, 'getInfo']);
    Route::post('/unit/{id}/addperson', [UnitController::class, 'addPerson']);
    Route::post('/unit/{id}/addvehicle', [UnitController::class, 'addVehicle']);
    Route::post('/unit/{id}/addpet', [UnitController::class, 'addPet']);
    Route::post('/unit/{id}/removeperson', [UnitController::class, 'removePerson']);
    Route::post('/unit/{id}/removevehicle', [UnitController::class, 'removeVehicle']);
    Route::post('/unit/{id}/removepet', [UnitController::class, 'removePet']);

    //Reservas
    Route::get('/reservations', [ReservationController::class, 'getReservations']);
    Route::post('/reservation/{id}', [ReservationController::class, 'setReservation']);

    Route::get('/reservation/{id}/disabledates', [ReservationController::class, 'getDisabledates']);
    Route::get('/reservation/{id}/times', [ReservationController::class, 'getTimes']);

    Route::get('/myreservations', [ReservationController::class, 'getMyReservations']);
    Route::delete('/myreservation/{id}', [ReservationController::class, 'delMyReservation']);
    
});