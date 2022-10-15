<?php

namespace App\Imports;

use App\Models\State;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StateImport implements ToModel, WithStartRow 
{
    public function startRow(): int
    {
        return 6;
    }

    public function model(array $row)
    {
        State::updateOrCreate([
                'CEstado' => $row[0],
            ],[
                'CPais' => $row[1],
                'NombreEstado' => $row[2]
            ]
        );
    }
}
