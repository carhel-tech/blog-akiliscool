<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



// La route-ressource => Les routes "post.*"
Route::resource("posts", PostController::class);
