<?php

use App\Http\Controllers\Api\KaryawanController;
use Illuminate\Support\Facades\Route;

Route::apiResource('karyawan', KaryawanController::class);
