<?php

namespace App\Imports;

use App\Models\Formatur;
use Maatwebsite\Excel\Concerns\ToModel;

class FormatursImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Formatur([
            'nama' => $row[0],
            'visi' => $row[1],
            'misi' => $row[2],
            'role' => $row[3],
            'image' => $row[4],
        ]);
    }
}
