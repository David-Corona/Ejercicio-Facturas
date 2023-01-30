<?php

namespace App\Console\Commands;

use App\Models\Factura;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class FacturasMensuales extends Command
{
    /**
     * Nombre y signature del comando
     *
     * @var string
     */
    protected $signature = 'mostrar:facturasImpagadas';

    /**
     * Descripción del comando
     *
     * @var string
     */
    protected $description = 'Muestra la cantidad y la suma total de las facturas impagadas en el último mes.';

    /**
     * Ejecución del comando:
     * Realiza la query mediante el método facturasImpagadas, y guarda el resultado en un fichero txt
     *
     * @return void
     */
    public function handle()
    {
        $facturas = Factura::facturasImpagadas();
        Storage::disk('local')->put('facturas.txt', $facturas);
    }
}
