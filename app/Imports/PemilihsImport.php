<?php

namespace App\Imports;

use App\Models\Pemilih;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class PemilihsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $username = rand(100000, 999999);
        $password = rand(100000, 999999);

        User::create([
            'name' => $row[0],
            'asal' => $row[1],
            'tahun' => $row[3],
            'role_id' => 2,
            'username' => $username,
            'pass' => $password,
            'password' => Hash::make($password),
            'status' => 1,
        ]);

        return new Pemilih([
            'nama' => $row[0],
            'nim' => $row[1],
            'nama_prodi' => $row[2],
            'tahun' => $row[3],
            'username' => $username,
            'pass' => $password,
            'role_id' => 2,
            'status' => 1,
        ]);
    }
}
