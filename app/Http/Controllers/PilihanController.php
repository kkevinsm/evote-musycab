<?php

namespace App\Http\Controllers;

use App\Models\Pemilih;
use App\Models\Pilihan;
use App\Models\User;
use Illuminate\Http\Request;

class PilihanController extends Controller
{
    public function index()
    {
        return  view('pilihan.index');
    }

    public function show($id)
    {
        $datas = Pemilih::where('tahun', $id)->get();

        return  view('pilihan.show', compact([
            'datas',
        ]));
    }

    public function pilihan($id, $user_id)
    {

        $data = Pemilih::where('id', $user_id)->first();
        $user = User::where('name', $data->nama)->first();

        $datas = Pilihan::where('dari', $user->id)->join('formaturs', 'pilihans.untuk', '=', 'formaturs.id')
        ->join('users', 'pilihans.dari', '=', 'users.id')
        ->select('pilihans.*', 'formaturs.nama as formatur_nama', 'users.name as user_name')
        ->get();

        return  view('pilihan.pilihan', compact([
            'datas',
        ]));
    }
}
