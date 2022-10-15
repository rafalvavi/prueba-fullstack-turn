<?php

namespace App\Imports;

use App\Models\PostalCode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PostalCodeImport implements ToModel, WithStartRow, WithBatchInserts, WithChunkReading 
{
    public function startRow(): int
    {
        return 5;
    }

    public function model(array $row)
    {
        PostalCode::create([
            'CCp' => $row[0],
            'CEstado' => $row[1],
            'CMunicipio' => $row[2],
            'CLocalidad' => isset($row[3]) ?? null
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
