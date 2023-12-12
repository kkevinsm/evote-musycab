<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Formatur;
use App\Models\Pilihan;
use App\Models\Pemilih;
use App\Models\User;

class GuestController extends Controller
{

    public function guest()
    {
        $user = Auth::user();
        $dpms = Formatur::where('role', 'Calon Ketua Dewan Perwakilan Mahasiswa')->get();
        $bems = Formatur::where('role', 'Calon Ketua Badan Eksekutif Mahasiswa')->get();
        $himajemens = Formatur::where('role', 'Calon Ketua HIMAJEMEN')->get();
        $himatansis = Formatur::where('role', 'Calon Ketua HIMATANSI')->get();
        $himabisniss = Formatur::where('role', 'Calon Ketua HIMABISNIS')->get();;

        $pemilih = Pemilih::where('nama', $user->name)->first();

        return view('guest.guest', compact([
            'dpms',
            'bems',
            'himajemens',
            'himatansis',
            'himabisniss',
            'user',
            'pemilih',
        ]));
    }

    public function ipm()
    {
        $datas = Formatur::all();
        return view('guest.ipm', compact([
            'datas'
        ]));
    }

    public function hw()
    {
        $datas = Formatur::where('role', 'hw')->get();
        return view('guest.hw', compact([
            'datas'
        ]));
    }

    public function ts()
    {
        $datas = Formatur::where('role', 'ts')->get();
        return view('guest.ts', compact([
            'datas'
        ]));
    }

    public function pilihipm(Request $request)
    {
        foreach ($request->category as $value){
            Pilihan::create([
                'dari' => Auth::user()->id,
                'untuk' => $value,
            ]);
        }        

        return redirect()->route('guest.hw')->with('status', 'Terimakasih telah memilih!');
    }

    public function pilihhw(Request $request)
    {
        foreach ($request->category as $value){
            Pilihan::create([
                'dari' => Auth::user()->id,
                'untuk' => $value,
            ]);
        }

        return redirect()->route('guest.ts')->with('status', 'Terimakasih telah memilih!');
    }

    public function pilihts(Request $request)
    {
        foreach ($request->category as $value){
            Pilihan::create([
                'dari' => Auth::user()->id,
                'untuk' => $value,
            ]);
        }

        User::where('id', Auth::user()->id)->update([
            'status' => 0,
        ]);

        return redirect()->route('terimakasih')->with('status', 'Terimakasih telah memilih!');
    }

    public function terimakasih()
    {
        return view('guest.terimakasih');
    }

    public function submit(Request $request)
    {
        foreach ($request->category as $value){
            Pilihan::create([
                'dari' => Auth::user()->id,
                'untuk' => $value,
            ]);
        }        

        User::where('id', Auth::user()->id)->update([
            'status' => 0,
        ]);

        Auth::logout();

        // Redirect to the login page or any other page after logout
        return redirect('/login');
    }

    // public function logout()
    // {
    //     $user = Auth::user();

    //     return $user;
    //     $user->status = 0;

    //     User::where('id', $user->id)->update([
    //         'status' => 0,
    //     ]);

    //     return view('logout');
    // }
}

