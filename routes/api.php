<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

// /api/tasks CRUD
Route::apiResource('tasks', TaskController::class);
