<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProviderController;


Route::get('/user', [ProviderController::class, "authenticateAllProviders"]);
