<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

// Route khusus untuk storage dengan content-type yang benar
Route::get('/storage/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);
    
    if (!file_exists($fullPath)) {
        abort(404, 'File not found');
    }
    
    $mimeType = mime_content_type($fullPath);
    $fileSize = filesize($fullPath);
    
    return response()->file($fullPath, [
        'Content-Type' => $mimeType,
        'Content-Length' => $fileSize,
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET, OPTIONS',
        'Access-Control-Allow-Headers' => '*',
        'Cache-Control' => 'public, max-age=31536000',
    ]);
})->where('path', '.*');

// Handle OPTIONS untuk storage
Route::options('/storage/{path}', function () {
    return response('', 200, [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET, OPTIONS',
        'Access-Control-Allow-Headers' => '*',
    ]);
})->where('path', '.*');