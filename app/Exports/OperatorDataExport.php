<?php

namespace App\Exports;

use App\Models\Operator;
use App\Models\OperatorData;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class OperatorDataExport implements FromQuery ,WithHeadings ,WithColumnWidths ,WithStyles, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function __construct($from_date , $to_date, $cedula)
    {
        $this->from_date =  $from_date;
        $this->to_date =  $to_date;
        $this->cedula = $cedula;
     
    }

    public function query()
    {
        $operator = Operator::select('id')->where('cedula', $this->cedula)->first();

        return OperatorData::query()
        ->select(
        "fruit_type" ,
        "fruit_weight" , 
        "hours_worked" , 
        "date_collection" ,
        "observation" )
        ->whereDate('date_collection', '>=', $this->from_date)
        ->whereDate('date_collection', '<=', $this->to_date)
        ->where('operator_id', $operator->id );

    }

    public function headings(): array
    {
        return [
            'Tipo de Fruta Recolectada',
            'Peso de Fruta recolectada [kg]',
            'Cant de Horas Trabajadas',
            'Fecha de Recolección',
            'Observaciones',
        ];
    }

    public function map($row): array
    {
        return [
            $row->fruit_type,
            $row->fruit_weight,
            $row->hours_worked,
            Carbon::parse($row->date_collection)->format('Y-m-d'), // Formatear la fecha
            $row->observation,
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 55,            
            'C' => 55,            
            'D' => 55,
            'E' => 55            
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Aplicar estilo al rango de celdas A1:E1 (encabezados)
            'A1:E1' => [
                'font' => [
                    'bold' => true, // negrita
                    'size' => 14,   // tamaño de fuente
                ],
            ],
        ];
    }
}
