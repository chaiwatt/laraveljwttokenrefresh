<?php

use Illuminate\Support\Facades\Route;


Route::view("/{app?}",'welcome')->where('app','.*');
