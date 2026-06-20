<?php

use App\Http\Controllers\Api\ContactController;
use Illuminate\Support\Facades\Route;

// Endpoint para sa Contact Form
Route::post('/contact', [ContactController::class, 'sendEmail']);
