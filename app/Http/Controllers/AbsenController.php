<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    public function index()
    {
        $skema = DB::table('tb_skema')->get();

        return view('absen', compact('skema'));
    }

    public function store(Request $request)
    {
        $absen_id = DB::table('tb_absen')->orderBy('id', 'desc')->first()->id + 1;

        //signature

        $folderPath = public_path('upload/');
       
        $image_parts = explode(";base64,", $request->signed);
             
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
 
        $signature = uniqid() . '.'.$image_type;
           
        $file = $folderPath . $signature;
 
        file_put_contents($file, $image_base64);

        DB::table('tb_absen')->create([
            'nama' => $request->nama,
            'tanggal' => Carbon::now(),
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        DB::table('tb_signature')->create([
            'absen_id' => $absen_id,
            'skema_absen' => $request->skema,
            'tanda_tangan' => $signature
        ]);

        return back()->with('success', 'ok bro aman');
    }
}
