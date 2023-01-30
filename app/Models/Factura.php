<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;

class Factura extends Model
{
    use HasFactory;

    protected $table = "facturas";
    protected $guarded = ["id"];

    protected $fillable = [
        "fecha_factura", "total_factura", "pagada"
    ];

    public static function facturasImpagadas()
    {
        try {
            $fecha_hoy = Carbon::now()->format('Y-m-d');
            $fecha_menos30dias = Carbon::now()->subDays(30)->format('Y-m-d');

            $facturas=Factura::select(DB::raw('count(*) as numeroFacturas, SUM(total_factura) AS importeTotal, current_date AS fechaHasta, (current_date-30) as fechaDesde'))
            ->where('pagada', false)
            ->whereBetween('fecha_factura', [$fecha_menos30dias, $fecha_hoy])
            ->get();
        } catch(Exception $e){
            return $e->getMessage();
        }
        return $facturas;
    }
}
