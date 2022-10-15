<?php

namespace App\Imports;

use App\Models\Town;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TownImport implements ToModel, WithStartRow 
{
    public function startRow(): int
    {
        return 6;
    }

    public function model(array $row)
    {
        Town::create([
            'CMunicipio' => $row[0],
            'CEstado' => $row[1],
            'Descripcion' => $row[2]
        ]);
    }
}
