<?php 

use Illuminate\Support\Facades\Route;

Route::post(config('enjoywork_auth.routes.register'), 'TienEnjoywork\APIAuth\Http\Controllers\RegisterController');
Route::post(config('enjoywork_auth.routes.login'), 'TienEnjoywork\APIAuth\Http\Controllers\LoginController');
Route::post(config('enjoywork_auth.routes.password.email'), 'TienEnjoywork\APIAuth\Http\Controllers\ForgotPasswordController');
Route::post(config('enjoywork_auth.routes.password.reset'), 'TienEnjoywork\APIAuth\Http\Controllers\ResetPasswordController');