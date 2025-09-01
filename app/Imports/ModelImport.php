<?php

namespace App\Imports;

use App\Models\Upload;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ModelImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Convert Excel numeric date to YYYY-MM-DD string
        $date = isset($row['date']) ? Date::excelToDateTimeObject($row['date'])->format('Y-m-d') : null;

        return new Upload([
            'device_name' => $row['device_name'] ?? null,
            'date'        => $date,
            'imei'        => $row['imei'] ?? null,
            'company'     => $row['company'] ?? null,
        ]);
    }
}
