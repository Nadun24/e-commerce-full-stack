<?php

use App\Http\Controllers\User\UserSignInController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user-sign-in', [UserSignInController::class, 'userSignIn']);
