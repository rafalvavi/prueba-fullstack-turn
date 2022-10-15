<?php

namespace App\Imports;

use App\Models\Colony;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ColonyImport implements ToModel, WithStartRow, WithBatchInserts, WithChunkReading
{
    public function startRow(): int
    {
        return 6;
    }

    public function model(array $row)
    {
        Colony::create([
                'CColonia' => $row[0],
                'CCodigoPostal' => $row[1],
                'CNombreAsentamiento' => $row[2]
            ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
    
    public function chunkSize(): int
    {
        return 1000;
    }
}
