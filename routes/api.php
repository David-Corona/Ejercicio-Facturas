<?php

use App\Http\Controllers\FacturaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// FacturaController
Route::get("/web/facturacion/facturas-impagadas", [FacturaController::class, 'facturasImpagadas']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
