<?php

use App\Http\Controllers\Api\V1\Admin\CertificateApiController;
use App\Http\Controllers\Api\V1\Admin\CompanyApiController;
use App\Http\Controllers\Api\V1\Admin\ProjectApiController;
use App\Http\Controllers\Api\V1\Admin\RigApiController;
use App\Http\Controllers\Api\AuthController;



Route::post('v1/login', [AuthController::class,'login']);
Route::get('logout', [AuthController::class,'logout']);

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Company
    Route::apiResource('companies', CompanyApiController::class);

    // Projects
    Route::apiResource('projects', ProjectApiController::class);

    // Rigs
    Route::apiResource('rigs', RigApiController::class);

    // Certificates
    Route::post('certificates/media', [CertificateApiController::class, 'storeMedia'])->name('certificates.store_media');
    Route::apiResource('certificates', CertificateApiController::class);

    //logout
    Route::get('logout', [AuthController::class,'logout']);
});
