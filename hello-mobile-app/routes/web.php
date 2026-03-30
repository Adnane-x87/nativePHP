<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "<h1 style='text-align:center;margin-top:100px;'>
            Hello World from Laravel 🚀</h1>";
});