<?php

namespace App\Http\Controllers;

use App\Exports\OperatorDataExport;
use Illuminate\Http\Request;

class OperatorDataReportsExportController extends Controller
{
    public function __invoke()
    {
        $from_date = request('from_date');
        $to_date = request('to_date');
        $cedula = request('cedula');

        return (new OperatorDataExport($from_date, $to_date, $cedula))->download('datosOperador.xlsx');

    }
}
