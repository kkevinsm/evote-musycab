<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Pilihan;
use App\Models\Formatur;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\PemilihsImport;
use App\Models\Pemilih;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $pemilihs = User::where('role_id', 2)->get();
        $formaturs = Formatur::all();
        $sudahs = count(User::where('role_id', 2)->where('status', 0)->get());
        $belums = count(User::where('role_id', 2)->where('status', 1)->get());
        $pilihans = Pilihan::all();

        $suara_ipm_1 = count(Pilihan::where('untuk', '32')->get());
        $suara_ipm_2 = count(Pilihan::where('untuk', '33')->get());
        $suara_ipm_3 = count(Pilihan::where('untuk', '34')->get());
        $suara_ipm_4 = count(Pilihan::where('untuk', '35')->get());
        $suara_ipm_5 = count(Pilihan::where('untuk', '36')->get());

        $suara_ipm_6 = count(Pilihan::where('untuk', '37')->get());
        $suara_ipm_7 = count(Pilihan::where('untuk', '38')->get());
        $suara_ipm_8 = count(Pilihan::where('untuk', '39')->get());
        $suara_ipm_9 = count(Pilihan::where('untuk', '40')->get());
        $suara_ipm_10 = count(Pilihan::where('untuk', '41')->get());

        $suara_ipm_11 = count(Pilihan::where('untuk', '42')->get());
        $suara_ipm_12 = count(Pilihan::where('untuk', '12')->get());
        $suara_ipm_13 = count(Pilihan::where('untuk', '13')->get());
        $suara_ipm_14 = count(Pilihan::where('untuk', '14')->get());
        $suara_ipm_15 = count(Pilihan::where('untuk', '15')->get());

        $suara_ipm_16 = count(Pilihan::where('untuk', '16')->get());
        $suara_ipm_17 = count(Pilihan::where('untuk', '17')->get());
        $suara_ipm_18 = count(Pilihan::where('untuk', '18')->get());
        $suara_ipm_19 = count(Pilihan::where('untuk', '19')->get());
        $suara_ipm_20 = count(Pilihan::where('untuk', '20')->get());

        $suara_ipm_21 = count(Pilihan::where('untuk', '21')->get());
        $suara_ipm_22 = count(Pilihan::where('untuk', '22')->get());
        $suara_ipm_23 = count(Pilihan::where('untuk', '23')->get());
        $suara_ipm_24 = count(Pilihan::where('untuk', '24')->get());
        $suara_ipm_25 = count(Pilihan::where('untuk', '25')->get());
        
        return view('admin.index', compact([
            'pemilihs',
            'formaturs',
            'belums',
            'sudahs',
            'pilihans',
            'suara_ipm_1',
            'suara_ipm_2',
            'suara_ipm_3',
            'suara_ipm_4',
            'suara_ipm_5',
            'suara_ipm_6',
            'suara_ipm_7',
            'suara_ipm_8',
            'suara_ipm_9',
            'suara_ipm_10',
            'suara_ipm_11',
            'suara_ipm_12',
            'suara_ipm_13',
            'suara_ipm_14',
            'suara_ipm_15',
            'suara_ipm_16',
            'suara_ipm_17',
            'suara_ipm_18',
            'suara_ipm_19',
            'suara_ipm_20',
            'suara_ipm_21',
            'suara_ipm_22',
            'suara_ipm_23',
            'suara_ipm_24',
            'suara_ipm_25',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pemilih()
    {
        return view('admin.pemilih');
    }

    public function import()
    {
        $data = Pemilih::all();
        Excel::store(new PemilihsImport($data), 'output.pdf', 'public', null, [
            'excel' => [
                'pdf' => [
                    'paper_size' => 'A4',
                ],
            ],
        ]);

        // Excel::import(new PemilihsImport,request()->file('file'));

        return redirect()->back();
    }

    public function reset()
    {
        $pemilihs = Pilihan::all();
        $users = User::all();

        foreach($pemilihs as $pemilih){
            $pemilih->delete();
        }

        foreach($users as $user){
            $user->update(['status' => '1']);
        }

        return redirect()->back();
    }
}
