<?php

use App\Http\Controllers\SaveDocumentController;
use App\Http\Controllers\SaveWatermarkController;
use App\Http\Controllers\ShowDocumentController;
use App\Http\Controllers\UploadFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', UploadFormController::class)->name('index');
Route::post('/save-document', SaveDocumentController::class)->name('save-document');
Route::get('/show-document/{document}', ShowDocumentController::class)
    ->name('show-document');
Route::post('/save-watermark', SaveWatermarkController::class)
    ->name('save-watermark');
