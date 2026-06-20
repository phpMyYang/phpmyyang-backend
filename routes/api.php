<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;

// Endpoint para sa Contact Form
Route::post('/contact', [ContactController::class, 'sendEmail']);
