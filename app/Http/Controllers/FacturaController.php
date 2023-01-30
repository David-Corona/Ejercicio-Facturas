<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Exception;

class FacturaController extends Controller
{

    /**
     * El método facturasImpagadas genera la query que devuelve el número y total de las facturas impagadas.
     *
     * @return Response
     */
    public function facturasImpagadas(){
        try {
            $facturas = Factura::facturasImpagadas();
        } catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
        return response()->json(['status' => 'ok', 'message' =>  $facturas], 200);
    }
}
